# Livewire Select

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mitratek/livewire-select.svg?style=for-the-badge)](https://packagist.org/packages/mitratek/livewire-select)
[![Total Downloads](https://img.shields.io/packagist/dt/mitratek/livewire-select.svg?style=for-the-badge)](https://packagist.org/packages/mitratek/livewire-select)
[![GitHub license](https://img.shields.io/github/license/mitratek/livewire-select?style=for-the-badge)](https://github.com/mitratek/livewire-select/blob/master/LICENSE)


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

- use trait ```LivewireSelect``` in your livewire component:
```php
<?php

namespace App\Http\Livewire\CreateUser

use Livewire\Component;
use Mitratek\LivewireSelect\LivewireSelect;

class CreateUser extends Component
{
    use LivewireSelect;

    // set properties to get selected value from LivewireSelect
    public $country_id;
}

```

- Use the ```livewire-select``` component in your blade view, and pass in a parameters:
```html

<livewire:select-input name='country_id' model='\App\Models\Country' search='["name", "region"]' show='{id} - {name}' value='id' placeholder='Choose country' />

```

Or you can pass collection data into select-input like below:

```html

<livewire:select-input name='country_id' collection='{!! $countries !!}' search='["name", "region"]' show='{id} - {name}' value='id' placeholder='Choose country' />

```

### Properties
| Property | Arguments | Result | Example |
|----|----|------------------------------------------------------------------------------------------------------------------------------------------------|----|
|**name**|*String - required* property name| Define the property name                                                                                   | ```name='country_id'```|
|**model** or **collection** |*String - required* full model name or *Collection - required* full collection| Define the source of data that will be select, you must choose one between **model** or **collection**                                                                               | ```model='App\Models\Country'``` or ```collection='{!! $countries !!}'```|
|**search**|*Array - required* search column| Define the column in model that want to be searched                                                                                  | ```search='["name", "region"]'```|
|**show**|*String - required* show column| Define the column in model that want to be show in select option                                                                                  | ```show='{id} - {name}'```|
|**value**|*String - required* set value| Define the column name as a value data that will be selected                                                                                  | ```value='id'```|
|**placeholder**|*String - optional* placeholder name| Define the placeholder for select input                                                                                   | ```placeholder='Select Country'```|
|**min**|*String - optional* minimum character| Define minimum character                                                                                   | ```min='5'```|
|**parent**|*String - optional* parent of select| Define parent of current select box, this option will make current select depend with the other                                                                                   | ```parent='planet_id'```|