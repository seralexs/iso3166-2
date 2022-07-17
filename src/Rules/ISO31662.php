<?php
declare(strict_types=1);

namespace Seralexs\Rules;

use Seralexs\CountryProvider;

final class ISO31662
{
    private mixed $countryCode;
    private CountryProvider $countriesProvider;

    public function __construct(mixed $countryCode)
    {
        $this->countryCode = $countryCode;

        $this->countriesProvider = new CountryProvider();
    }

    public function passes(string $attribute, mixed $value): bool
    {
        $countries = $this->countriesProvider->getCountries();

        if (!is_string($this->countryCode) || !isset($countries[$this->countryCode])) {
            return false;
        }

        $states = $countries[$this->countryCode];

        return is_string($value) && is_array($states) && in_array($value, $states);
    }
}