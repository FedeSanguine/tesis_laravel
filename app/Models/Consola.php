<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Consola
 *
 * @property int $consolas_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Consola newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consola newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Consola query()
 * @method static \Illuminate\Database\Eloquent\Builder|Consola whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consola whereConsolaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consola whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consola whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Consola whereConsolasId($value)
 * @mixin \Eloquent
 */
class Consola extends Model
{
    protected $primaryKey = "consolas_id";
}
