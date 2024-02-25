<?php

namespace sufyan\LaravelCountriesStatesCities;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Main
{
    protected $data = [];
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
        $this->data['country'] = collect(File::json(__DIR__ . '/../data/countries.json'));
        $this->data['state'] = collect(File::json(__DIR__ . '/../data/states.json'));
        $this->data['city'] = collect(File::json(__DIR__ . '/../data/cities-min.json'));
    }

    public function getList()
    {
        return $this->data[$this->type];
    }

    public function getById($id)
    {
        return $this->data[$this->type]->first(function ($item) use ($id) {
            return $item['id'] == $id;
        });
    }

    public function search($search)
    {
        return $this->data[$this->type]->filter(function ($item) use ($search) {
            return Str::lower($item['name']) == Str::lower($search);
        });
    }

    public function getByIdWithCities($id)
    {
        $result = $this->data[$this->type]->first(function ($item) use ($id) {
            return $item['id'] == $id;
        });
        if (!$result) return;
        $cities = $this->data['city']->filter(function ($item) use ($id) {
            return $item["{$this->type}_id"] == $id;
        });
        return [...$result, 'cities' => $cities];
    }
}
