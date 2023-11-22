<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Noticias
 *
 * @property int $noticias_id
 * @property string $titulo
 * @property string $fecha
 * @property string $descripcion
 * @property string|null $imagen
 * @property string|null $descripcion_imagen
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Noticias> $noticias
 * @property-read int|null $noticias_count
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereDescripcionImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereNoticiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereTitulo($value)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Articulo> $articulos
 * @property-read int|null $articulos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticias whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Articulo> $articulos
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Articulo> $articulos
 * @mixin \Eloquent
 */
class Noticias extends Model
{
    protected $primaryKey = "noticias_id";

    protected $fillable = ['noticias_id', 'titulo', 'fecha', 'descripcion', 'imagen', 'descripcion_imagen'];

    public static function validationRules(): array
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'titulo.required' => 'Titulo de la noticia',
            'descripcion.required' => 'Descripcion de la noticia',
            'fecha.required' => 'Seleccionar fecha',

        ];
    }

    public function getArticulosIds(): array
    {
        return $this->articulos->pluck('articulos_id')->all();
    }

    public function articulos(): BelongsToMany
    {
        return $this->belongsToMany(
            Articulo::class,
            'noticias_x_articulos',
            'noticias_id',
            'articulos_id',
            'noticias_id',
            'articulos_id',
        );
    }
}
