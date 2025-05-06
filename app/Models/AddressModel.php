<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AddressModel
 *
 * @namespace App\Models
 *
 * @author Tomas Valent
 *
 * @property string $id
 * @property positive-int $userId
 * @property string $street
 * @property string $city
 * @property string $zip
 * @property string $country
 * @property string $countryCode
 * @property string $email
 * @property string $phone
 * @property string $createdAt
 * @property string $updatedAt
 * @property UserModel $user
 */
class AddressModel extends Model
{
    /** @use HasFactory<\Database\Factories\AddressModelFactory> */
    use HasFactory;

    /** @var string */
    public const ID = "id";

    /** @var string */
    public const USER_ID = "user_id";

    /** @var string */
    public const STREET = "street";

    /** @var string */
    public const CITY = "city";

    /** @var string */
    public const ZIP = "zip";

    /** @var string */
    public const COUNTRY = "country";

    /** @var string */
    public const COUNTRY_CODE = "country_code";

    /** @var string */
    public const EMAIL = "email";

    /** @var string */
    public const PHONE = "phone";

    /** @var string */
    public const CREATED_AT = "created_at";

    /** @var string */
    public const UPDATED_AT = "updated_at";

    /** @var list<string> $fillable */
    protected $fillable = [
        self::USER_ID,
        self::STREET,
        self::CITY,
        self::ZIP,
        self::COUNTRY,
        self::COUNTRY_CODE,
        self::EMAIL,
        self::PHONE,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /** @var string $table */
    protected $table = "addresses";

    /**
     * @return BelongsTo<UserModel, AddressModel>
     */
    public function user(): BelongsTo
    {
        /** @phpstan-ignore return.type */
        return $this->belongsTo(UserModel::class, UserModel::ID, AddressModel::ID);
    }
}
