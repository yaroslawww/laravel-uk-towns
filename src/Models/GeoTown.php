<?php

namespace UKTowns\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoTown extends Model
{
    use HasFactory, HasCoordinates;

    protected $guarded = [];

    public function getTable(): string
    {
        return config('uk-towns.table_name');
    }

    protected static function newFactory(): GeoTownFactory
    {
        return GeoTownFactory::new();
    }

    public function name(): Attribute
    {
        return Attribute::get(fn() => implode(', ', array_filter([
            $this->place_name,
            $this->county,
            $this->region,
        ])));
    }
}
