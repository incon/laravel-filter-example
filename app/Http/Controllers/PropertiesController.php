<?php

namespace App\Http\Controllers;

use App\Properties;
use App\Rules\PriceValidationRule;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Return filter properties
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function index(Request $request)
    {
        $filter = $request->validate([
            'name' => 'nullable|string',
            'price_min' => [
                'nullable',
                'integer',
                new PriceValidationRule
            ],
            'price_max' => [
                'nullable',
                'integer',
                new PriceValidationRule
            ],
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'storeys' => 'nullable|integer',
            'garages' => 'nullable|integer'
        ]);

        return Properties::filter($filter);
    }
}
