#

## Create Starter

```
laravel new --jet --teams --api --pest --dark --database sqlite --stack livewire --verification app
```

## Installation

### 1. via Composer

Require PowerGrid via [Composer](https://getcomposer.org/), run:

```bash
composer require power-components/livewire-powergrid
```

### 2. Publish Config files

Publish PowerGrid configuration file. Run the following command:

```bash
php artisan vendor:publish --tag=livewire-powergrid-config
```

The configuration file will be available at: `config/livewire-powergrid.php`.

### 3. Publish files (OPTIONAL)

::: warning
Skip this step if you don't need to customize views (not recommended) or language files.
::: 

To publish Views, run:

```bash
php artisan vendor:publish --tag=livewire-powergrid-views
```

To publish Language files, run:

```bash
php artisan vendor:publish --tag=livewire-powergrid-lang
```
