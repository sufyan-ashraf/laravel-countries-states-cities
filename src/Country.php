<?php

namespace Sufyan\LaravelCountriesStatesCities;

class Country extends Main
{
    public function __construct()
    {
        parent::__construct('country');
    }

    public function getByIdWithStates($id)
    {
        $country = $this->data[$this->type]->first(function ($item) use ($id) {
            return $item['id'] == $id;
        });
        if (!$country) return;
        $states = $this->data['state']->filter(function ($item) use ($id) {
            return $item['country_id'] == $id;
        });
        return [...$country, 'states' => $states];
    }
}
