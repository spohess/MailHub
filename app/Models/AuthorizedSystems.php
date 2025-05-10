<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property int $administrator_id
 * @property string $name
 * @property string|null $description
 * @property string $token
 * @property string|null $ip_address
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class AuthorizedSystems extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorizedSystemsFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'uuid',
        'administrator_id',
        'name',
        'description',
        'token',
        'ip_address',
        'active',
    ];

    public function administrator()
}
