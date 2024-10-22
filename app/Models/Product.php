<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use DateTimeInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Product $product
 * @method static ProductFactory factory($count = null, $state = [])
 * @method static Builder<static>|Product newModelQuery()
 * @method static Builder<static>|Product newQuery()
 * @method static Builder<static>|Product query()
 * @method static Builder<static>|Product whereCreatedAt($value)
 * @method static Builder<static>|Product whereId($value)
 * @method static Builder<static>|Product wherePrice($value)
 * @method static Builder<static>|Product whereTitle($value)
 * @method static Builder<static>|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }
}
