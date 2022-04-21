# Livewire Select

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mitratek/livewire-select.svg?style=flat-square)](https://packagist.org/packages/mediconesystems/livewire-datatables)

Livewire component for searchable select inputs

## Requirements
- [Laravel 8 or 9](https://laravel.com/docs/9.x)
- [Livewire](https://laravel-livewire.com/)
- [Tailwind](https://tailwindcss.com/)
- [Alpine JS](https://github.com/alpinejs/alpine)

## Installation

You can install the package via composer:

```bash
composer require mitratek/livewire-select
```

## Basic Usage

- Extend class ```LivewireSelectComponent``` in your livewire component:
```php
<?php

namespace App\Http\Livewire\CreateUser

use Mitratek\LivewireSelect\LivewireSelectComponent;

class CreateUser extends LivewireSelectComponent
{
    // set properties to get selected value from LivewireSelect
    public $country_id;
}

```

- Use the ```livewire-select``` component in your blade view, and pass in a parameters:
```html

<livewire:select-input :model="'\App\Models\Country'" :dataId="'country_id'" :placeholder="'Select country'" :wire:key="'select_country'" />

```

### Properties
| Property | Arguments | Result | Example |
|----|----|------------------------------------------------------------------------------------------------------------------------------------------------|----|
|**model**|*String* full model name| Define the base model for the table                                                                                   | ```:model="'App\Models\Country'"```|
|**dataId**|*String* property name| Define the property name                                                                                   | ```:dataId="'country_id'"```|
|**placeholder**|*String* placeholder name| Define the placeholder for select input                                                                                   | ```:placeholder="'Select Country'"```|
|**wire:key**|*String* unique id| Define unique id for select input (each select input within the page must have different unique id)                                                                                   | ```:wire:key="'select_country'"```|