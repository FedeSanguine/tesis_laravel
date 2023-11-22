<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Genero;
use App\Models\Consola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ArticulosController extends Controller
{
    public function indexArticulos()
    {
        $articulos = Articulo::with(['generos', 'consolas'])->get();

        return view('admin.admin-articulos', [
            'articulos' => $articulos,
        ]);
    }

    public function index()
    {
        $articulos = Articulo::with(['generos', 'consolas'])->get();
        $user = User::with(['articulos'])->get();

        return view('articulos.index', [
            'articulos' => $articulos,
            'user' => $user,

        ]);
    }


    public function vista(int $id)
    {

        $articulo = Articulo::findOrFail($id);
        return view('articulos.vista', [
            'articulo' => $articulo,
        ]);
    }

    public function nuevoFormulario()
    {
        return view('articulos.nuevo-articulo', [
            'generos' => Genero::all(),
            'consolas' => Consola::all(),
        ]);
    }

    public function nuevoProceso(Request $request)
    {
        

            $data = $request->except(['_token']);

            $request->validate(Articulo::validationRules(), Articulo::validationMessages());

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->actualizarImagen($request);
            }
        try {
            DB::transaction(function () use ($data) {
                Articulo::create($data);
            });

            return redirect()
                ->route('admin.admin-articulos')
                ->with('feedback.message', 'El articulo <b>' . e($data['nombre']) . '</b> se agrego con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('articulos.nuevoProceso')
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de crear el articulo. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
                ->with('feedback.type', 'danger');
        }
    }

    public function editarOk(int $id)
    {
        return view('articulos.editar-articulo', [
            'articulo' => Articulo::findOrFail($id),
            'generos' => Genero::all(),
            'consolas' => Consola::all(),
        ]);
    }

    public function procesoEditar(int $id, Request $request)
    {
      

            $articulo = Articulo::findOrFail($id);

            $request->validate(Articulo::validationRules(), Articulo::validationMessages());

            $data = $request->except(['_token']);
            $imagenAnterior = null;

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->actualizarImagen($request);
                $imagenAnterior = $articulo->imagen;
            }
        try {
            DB::transaction(function () use ($articulo, $data) {
                $articulo->update($data);
            });

            $this->borrarImagen($imagenAnterior);

            return redirect()
                ->route('admin.admin-articulos')
                ->with('feedback.message', 'El articulo <b>' . e($articulo->nombre) . '</b> se editó con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('articulos.editarOk', ['id' => $id])
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de editar el articulo. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
                ->with('feedback.type', 'danger');
        }
    }


    public function eliminarOK(int $id)
    {
        return view('articulos.eliminar-articulo', [
            'articulo' => Articulo::findOrFail($id),
        ]);
    }

    public function procesoEliminar(int $id)
    {
        try {

            $articulo = Articulo::findOrFail($id);

            DB::transaction(function () use ($articulo) {
                $articulo->delete();
            });



            $this->borrarImagen($articulo->imagen);

            return redirect()
                ->route('admin.admin-articulos')
                ->with('feedback.message', 'El articulo <b>' . e($articulo->nombre) . '</b> se eliminó con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('articulos.eliminarOk', ['id' => $id])
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de eliminar el articulo. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
                ->with('feedback.type', 'danger');
        }
    }

    protected function actualizarImagen(Request $request): string
    {
        $imagen = $request->file('imagen');

        $nombreImagen = date('YmdHis_') . Str::slug($request->input('title')) . "." . $imagen->guessExtension();

        $imagen->storeAs('imgs', $nombreImagen);

        return $nombreImagen;
    }

    protected function borrarImagen(?string $file): void
    {
        if ($file !== null && Storage::has('imgs/' . $file)) {
            Storage::delete('imgs/' . $file);
        }
    }

}
