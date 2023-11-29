<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



/**
 * App\Models\Articulo
 *
 * @property int $articulos_id
 * @property string $nombre
 * @property string $genero
 * @property int $precio
 * @property string $descripcion
 * @property string|null $imagen
 * @property string|null $descripcion_imagen
 *  * @property-read \Illuminate\Database\Eloquent\Collection<int, Articulo> $articulos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereArticulosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereDescripcionImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereUpdatedAt($value)
 * @property int $generos_id
 * @property string $formato
 * @property-read \App\Models\Genero $generos
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereFormato($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereGenerosId($value)
 * @property int $consolas_id
 * @property-read \App\Models\Consola $consolas
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereConsolasId($value)
 * @mixin \Eloquent
 */
class Articulo extends Model
{
    protected $primaryKey = "articulos_id";

    protected $fillable = ['generos_id', 'consolas_id', 'nombre','refugio', 'title', 'formato', 'precio', 'price', 'descripcion', 'imagen', 'descripcion_imagen'];

    public static function validationRules(): array
    {
        return [
            'nombre' => 'required',
            'formato' => 'required',
            'generos_id' => 'required|numeric|exists:generos',
            'consolas_id' => 'required|numeric|exists:consolas',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'nombre.required' => 'Nombre del articulo',
            'formato.required' => 'formato (Digital, Fisico)',
            'generos_id.required' => 'Genero del articulo',
            'generos_id.numeric' => 'El articulo debe ser un numero entero',
            'generos_id.exists' => 'El genero provisto no existe en la base de datos',
            'consolas_id.required' => 'Consola del articulo',
            'consolas_id.numeric' => 'La consola debe ser un numero entero',
            'consolas_id.exists' => 'La consola provista no existe en la base de datos',
        ];
    }


    public function generos(): BelongsTo
    {
        return $this->belongsTo(Genero::class, 'generos_id', 'generos_id');
    }

    public function consolas(): BelongsTo
    {
        return $this->belongsTo(Consola::class, 'consolas_id', 'consolas_id');
    }

}
