<?php

namespace App\Models;

use Database\Factories\BasketFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $user_id
 * @property string|null $session_id
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Product $product
 * @method static BasketFactory factory($count = null, $state = [])
 * @method static Builder<static>|Basket newModelQuery()
 * @method static Builder<static>|Basket newQuery()
 * @method static Builder<static>|Basket query()
 * @method static Builder<static>|Basket whereCreatedAt($value)
 * @method static Builder<static>|Basket whereId($value)
 * @method static Builder<static>|Basket whereProductId($value)
 * @method static Builder<static>|Basket whereQuantity($value)
 * @method static Builder<static>|Basket whereSessionId($value)
 * @method static Builder<static>|Basket whereUpdatedAt($value)
 * @method static Builder<static>|Basket whereUserId($value)
 * @mixin Eloquent
 */
class Basket extends Model
{
    /** @use HasFactory<BasketFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        'session_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
