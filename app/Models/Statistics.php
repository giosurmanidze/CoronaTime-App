<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function scopeFilterAndSort($query, $search, $language, $sort, $sortByCases, $sortByDeaths, $sortByReceovered) 
    {
        $query->when($search ?? false, function ($query) use ($search, $language) {
            $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$." . $language . "'))) LIKE ?", [strtolower($search) . '%']);
        });


        if ($sort === 'ascending') {
            $query->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$." . $language . "')) COLLATE utf8mb4_bin ASC");
        } elseif ($sort === 'descending') {
            $query->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$." . $language . "')) COLLATE utf8mb4_bin DESC");
        }

        $query->when($sortByCases, function ($query) use ($sortByCases) {
            $query->orderBy('confirmed', $sortByCases === 'ascending' ? 'asc' : 'desc');
        })
        ->when($sortByDeaths, function ($query) use ($sortByDeaths) {
            $query->orderBy('deaths', $sortByDeaths === 'ascending' ? 'asc' : 'desc');
        })
        ->when($sortByReceovered, function ($query) use ($sortByReceovered) {
            $query->orderBy('recovered', $sortByReceovered === 'ascending' ? 'asc' : 'desc');
        });

        return $query;
    }
}
