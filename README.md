# ISO 3166-2 subdivisions (e.g., provinces or states)
ISO 3166-2 validation rule for Laravel framework.

## Installation
Use the package manager composer to install library.
```bash
composer require seralexs/iso3166-2
```

## Usage

Validate if state code correct and belongs to a country.
```php
use Seralexs\Rules\ISO31662;

$request->validate([
    'state' => ['required', new ISO31662($countryCode)],
]);
```