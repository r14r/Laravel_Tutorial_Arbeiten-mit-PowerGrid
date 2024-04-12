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


## Create PowerGrid Table

```
❯ npm i flatpickr --save
```

````
❯ composer require openspout/openspout
````




### Collection

❯ php artisan powergrid:create
  Enter a name for your new PowerGrid Component:                    UserCollectionTable
  Select your preferred Data source:                                Collection 

 ⚡ UserCollectionTable was successfully created at [app/Livewire/UserCollectionTable.php].

 💡 include the UserCollectionTable component using the tag: <livewire:user-collection-table/>

### Query Builder

❯ php artisan powergrid:create

  Enter a name for your new PowerGrid Component:                    UserQueryBuilderTable
  Select your preferred Data source:                                Query Builder
  Enter or Select a DB Table:                                       users
  Auto-import Data Source fields from [users] table:                Yes
  
 ⚡ UserQueryBuilderTable was successfully created at [app/Livewire/UserQueryBuilderTable.php].

 💡 include the UserQueryBuilderTable component using the tag: <livewire:user-query-builder-table/>

❯ php artisan powergrid:create

 Enter a name for your new PowerGrid Component:                     UserEloquentBuilderTable
 Select your preferred Data source:                                 Eloquent Builder
 Select a Model or enter its Name/FQN class:                        App\Models\User
 Auto-import Data Source fields from $fillable in [User] Model:     Yes
 