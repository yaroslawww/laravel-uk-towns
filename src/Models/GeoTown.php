<?php

namespace UKTowns\Models;

use Illuminate\Database\Eloquent\Builder;
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
        return Attribute::get(fn () => implode(', ', array_filter([
            $this->place_name,
            $this->county,
            $this->region,
        ])));
    }

    public static function countryOptions(): array
    {
        $column    = 'country';
        $countries = static::query()
                           ->groupBy($column)
                           ->orderBy($column)
                           ->select($column)
                           ->get();

        return $countries->map(fn ($region) => [
            'label' => $region->$column,
            'value' => $region->$column,
        ])->toArray();
    }

    public static function regionOptions(?string $country = null): array
    {
        $column  = 'region';
        $regions = static::query()
                         ->when($country, fn (Builder $q) => $q->where('country', $country))
                         ->groupBy($column)
                         ->orderBy($column)
                         ->select($column)
                         ->get();

        return $regions->map(fn ($region) => [
            'label' => $region->$column,
            'value' => $region->$column,
        ])->toArray();
    }

    public static function countyOptions(?string $region = null): array
    {
        $column = 'county';
        $items  = static::query()
                       ->when($region, fn (Builder $q) => $q->where('region', $region))
                       ->groupBy($column)
                       ->orderBy($column)
                       ->select($column)
                       ->get();

        return $items->map(fn ($region) => [
            'label' => $region->$column,
            'value' => $region->$column,
        ])->toArray();
    }

    public static function townOptions(string $county): array
    {
        $column = 'place_name';
        $items  = static::query()
                       ->where('county', $county)
                       ->groupBy($column)
                       ->orderBy($column)
                       ->select($column)
                       ->get();

        return $items->map(fn ($region) => [
            'label' => $region->$column,
            'value' => $region->$column,
        ])->toArray();
    }
}
