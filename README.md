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
composer require mitrate/livewire-select
```

## Basic Usage

- Use the ```livewire-select``` component in your blade view, and pass in a parameters:
```html
...

<livewire:select-input :model="'\App\Models\Country'" :dataId="'country_id'" :placeholder="'Select country'" :wire:key="'select_country'" />

...
```