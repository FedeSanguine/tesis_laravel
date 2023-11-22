<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property string|null $rol
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Articulo> $articulos
 * @property-read int|null $articulos_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRol($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Articulo> $articulos
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @mixin \Eloquent
 */
class User extends BaseUser
{

    use Notifiable;

    protected $primaryKey = "user_id";

    protected $fillable = ['email', 'password', 'password_confirmation'];

    protected $hidden = ["email", "password", "rol_id", "password_confirmation", "remember_token"];

    public static function validationRules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'email.required' => 'Ingrese un email valido',
            'email.email' => 'Debe ingresar un email',
            'password.required' => 'Ingrese una contraseña valida',
            'password_confirmation.required' => 'Ingrese una contraseña valida',
            'password.confirmed' => 'Las contraseñas no son iguales',

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
            'usuarios_x_articulos',
            'user_id',
            'articulos_id',
            'user_id',
            'articulos_id',
        );
    }
}
