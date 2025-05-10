<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property string $email
 * @property string $password
 * @property bool $administrator
 * @property bool $active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    /**
     * @use HasFactory<UserFactory>
     */
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'administrator',
        'active',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'administrator' => 'boolean',
            'active' => 'boolean',
        ];
    }
}
