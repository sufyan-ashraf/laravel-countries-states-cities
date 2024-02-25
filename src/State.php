<?php

namespace sufyan\LaravelCountriesStatesCities;

use Illuminate\Support\Str;

class State extends Main
{

    public function __construct()
    {
        parent::__construct('state');
    }

    public function search($request = null)
    {
        $search = null;
        $country = null;

        if (gettype($request) !== "array") {
            $search = $request;
        } else {
            $search = $request['search'] ?? null;
            $country = $request['country'] ?? null;
        }
        return $this->data[$this->type]->filter(function ($item) use ($search, $country) {
            return ($country ? $item['country_id'] == $country : true) && ($search ? Str::lower($item['name']) == Str::lower($search) : true);
        });
    }
}
