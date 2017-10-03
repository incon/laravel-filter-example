<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    /**
     * Filter properties based on search filter inputs
     * @param $filter
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function filter($filter)
    {
        // Remove empty entries
        $filter = collect($filter)->filter(function ($field) {
            return !is_null($field);
        });

        // Build where conditions
        $where = [];
        if ($wheres = $filter->only([
            'bedrooms',
            'bathrooms',
            'storeys',
            'garages',
        ])) {
            $where = $wheres->toArray();
        }

        if ($filter->get('name')) {
            $where[] = ['name', 'like', '%' . $filter->get('name') . '%'];
        }

        if ($filter->get('price_min')) {
            $where[] = ['price', '>=', $filter->get('price_min')];
        }

        if ($filter->get('price_max')) {
            $where[] = ['price', '<=', $filter->get('price_max')];
        }

        // Return based on filter
        if (count($where) > 0) {
            return Properties::where($where)->get();
        }

        // No filters applied return all
        return Properties::all();
    }
}
