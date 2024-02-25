<?php

namespace Sufyan\LaravelCountriesStatesCities;

use Illuminate\Support\Str;

class City extends Main
{
    public function __construct()
    {
        parent::__construct('city');
    }


    public function search($request = null)
    {
        $search = null;
        $state = null;
        $country = null;

        if (gettype($request) !== "array") {
            $search = $request;
        } else {
            $search = $request['search'] ?? null;
            $state = $request['state'] ?? null;
            $country = $request['country'] ?? null;
        }
        return $this->data[$this->type]->filter(function ($item) use ($search, $country, $state) {
            return ($country ? $item['country_id'] == $country : true)
                && ($state ? $item['state_id'] == $state : true) &&
                ($search ? Str::lower($item['name']) == Str::lower($search) : true);
        });
    }
}
