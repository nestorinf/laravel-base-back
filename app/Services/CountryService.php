<?php

namespace App\Services;

use App\Models\Country;

class CountryService
{
    public $country;
    public function __construct(Country $country)
    {
        $this->country = $country;
    }
    public static function getCountries()
    {
        return Country::get();
    }
}
