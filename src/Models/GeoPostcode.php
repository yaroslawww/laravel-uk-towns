<?php

namespace UKTowns\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoPostcode extends Model
{
    use HasFactory, HasCoordinates;

    protected $primaryKey = 'postcode';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public function getTable(): string
    {
        return config('uk-towns.tables.postcodes');
    }

    protected static function newFactory(): GeoPostcodeFactory
    {
        return GeoPostcodeFactory::new();
    }
}
