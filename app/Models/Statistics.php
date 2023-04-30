<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'confirmed',
        'recovered',
        'deaths',
        'created_at',
        'updated_at',
    ];

    public function scopeFilterAndSort(Builder $query, string|null $search, string|null $sort, string|null $sortByCases, string|null $sortByDeaths, string|null $sortByRecovered): Builder
    {
        $lang = app()->getLocale();

        $query->when($search ?? false, function ($query) use ($search, $lang) {
            $query->whereRaw("LOWER(REPLACE(JSON_EXTRACT(name, '$." .  $lang . "'), '\"', '')) LIKE ?", [strtolower($search) . '%']);
        });

        if ($sort === 'ascending') {
            $query->orderByRaw("REPLACE(JSON_EXTRACT(name, '$." .  $lang . "'), '\"', '') COLLATE utf8mb4_bin ASC");
        } elseif ($sort === 'descending') {
            $query->orderByRaw("REPLACE(JSON_EXTRACT(name, '$." .  $lang . "'), '\"', '') COLLATE utf8mb4_bin DESC");
        }

        $query->when($sortByCases, function ($query) use ($sortByCases) {
            $query->orderBy('confirmed', $sortByCases === 'ascending' ? 'asc' : 'desc');
        })
            ->when($sortByDeaths, function ($query) use ($sortByDeaths) {
                $query->orderBy('deaths', $sortByDeaths === 'ascending' ? 'asc' : 'desc');
            })
            ->when($sortByRecovered, function ($query) use ($sortByRecovered) {
                $query->orderBy('recovered', $sortByRecovered === 'ascending' ? 'asc' : 'desc');
            });

        return $query;
    }

}
