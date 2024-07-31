# laravel-countries-states-cities

A simple PHP/Laravel package using json files to populate the data for countries, states and cities.

## Insights

Total Regions : 6
Total Sub Regions : 22
Total Countries : 250
Total States/Regions/Municipalities : 5,081
Total Cities/Towns/Districts : 150,540

## How to install

```bash
    composer require sufyan/laravel-countries-states-cities
```

## How to use

```php
    // Latest version - v1.0.0
    use sufyan\LaravelCountriesStatesCities\City;
    use sufyan\LaravelCountriesStatesCities\Country;
    use sufyan\LaravelCountriesStatesCities\State;

    // Available methods for Country
    $country = new Country();
    $country->getList();
    $country->search("167");
    $country->getById(167);
    $country->getByIdWithStates(167);
    $country->getByIdWithCities(167);

    // Available methods for State
    $state = new State();
    $state->getList();
    $state->getById($id);
    $state->search("punjab");
    $state->search(['country' => 167]);
    $state->search(['search' => "punjab"]);
    $state->search(['search' => "punjab", 'country' => 167]); //country is optional
    $state->getByIdWithCities($id);

    // Available methods for City
    $city = new City();
    $city->getList();
    $city->getById(85572);
    $city->search("lahore");
    $city->search(['country' => 167]);
    $city->search(['state' => 3176]);
    $city->search(['search' => "lahore", 'country' => 167, 'state' => 3176]); //country, state is ptional

```
