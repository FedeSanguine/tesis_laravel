<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Noticias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{
    public function indexNoticias()
    {
        $noticias = Noticias::with(['articulos'])->get();


        return view('admin.admin-noticias', [
            'noticias' => $noticias,
        ]);
    }

    public function index()
    {
        $noticias = Noticias::with(['articulos'])->get();

        return view('noticias.index', [
            'noticias' => $noticias,
        ]);
    }


    public function vista(int $id)
    {

        $noticias = Noticias::findOrFail($id);
        return view('noticias.vista', [
            'noticias' => $noticias,
        ]);
    }

    public function nuevoFormulario()
    {
        return view('noticias.nueva-noticia', [
            'articulos' => Articulo::orderBy('nombre')->get(),
        ]);
    }

    public function nuevoProceso(Request $request)
    {
        try {
            $data = $request->except(['_token']);

            $request->validate(Noticias::validationRules(), Noticias::validationMessages());

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->actualizarImagen($request);
            }

            DB::transaction(function () use ($data) {
                $noticias = Noticias::create($data);
                $noticias->articulos()->attach($data['articulos_id'] ?? []);
            });

            return redirect()
                ->route('admin.admin-noticias')
                ->with('feedback.message', 'La noticia <b>' . e($data['titulo']) . '</b> se agrego con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('noticias.nuevoFormulario')
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de agregar la noticia. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
                ->with('feedback.type', 'danger');
        }
    }

    public function editarOk(int $id)
    {
        return view('noticias.editar-noticias', [
            'noticias' => Noticias::findOrFail($id),
            'articulos' => Articulo::orderBy('nombre')->get(),
        ]);
    }

    public function procesoEditar(int $id, Request $request)
    {
        try {

            $noticias = Noticias::findOrFail($id);

            $request->validate(Noticias::validationRules(), Noticias::validationMessages());

            $data = $request->except(['_token']);
            $imagenAnterior = null;

            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->actualizarImagen($request);
                $imagenAnterior = $noticias->imagen;
            }

            DB::transaction(function () use ($noticias, $data) {
                $noticias->update($data);
                $noticias->articulos()->sync($data['articulos_id'] ?? []);
            });

            $this->borrarImagen($imagenAnterior);

            return redirect()
                ->route('admin.admin-noticias')
                ->with('feedback.message', 'La noticia <b>' . e($noticias->titulo) . '</b> se editó con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('noticias.editarOk')
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de editar la noticia. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
                ->with('feedback.type', 'danger');
        }
    }

    public function eliminarOK(int $id)
    {
        return view('noticias.eliminar-noticias', [
            'noticias' => Noticias::findOrFail($id),
        ]);
    }

    public function procesoEliminar(int $id)
    {
        try {

            $noticias = Noticias::findOrFail($id);

            DB::transaction(function () use ($noticias) {
                $noticias->articulos()->detach();
                $noticias->delete();
            });

            $this->borrarImagen($noticias->imagen);

            return redirect()
                ->route('admin.admin-noticias')
                ->with('feedback.message', 'El articulo <b>' . e($noticias->titulo) . '</b> se eliminó con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->route('noticias.eliminarOk', ['id' => $id])
                ->with('feedback.message', 'Ocurrió un error al tratar de eliminar la noticia. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
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
