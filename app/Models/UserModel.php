<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class UserModel
 *
 * @namespace App\Models
 *
 * @author Tomas Valent
 *
 * @property string $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property string $createdAt
 * @property string $updatedAt
 * @property \Illuminate\Support\Collection<int, \App\Models\AddressModel> $addresses
 */
class UserModel extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserModelFactory> */
    use HasFactory, Notifiable;

    /** @var string */
    public const ID = "id";

    /** @var string */
    public const NAME = "name";

    /** @var string */
    public const PASSWORD = "password";

    /** @var string */
    public const EMAIL = "email";

    /** @var string */
    public const CREATED_AT = "created_at";

    /** @var string */
    public const UPDATED_AT = "updated_at";

    /** @var string[] $fillable */
    protected $fillable = [
        self::NAME,
        self::PASSWORD,
        self::EMAIL,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /** @var string $table */
    protected $table = 'users';

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(AddressModel::class, self::ID, AddressModel::USER_ID);
    }
}
