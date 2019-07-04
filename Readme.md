# Fjord

## Installation

Install this package using the following command:

```bash
php artisan fjord:install
```

First, migrate the Laravel's default tables running:

```bash
php artisan migrate
```

You can easily create a new admin-user by running:

```bash
php artisan fjord:admin
```

It's all setup now, visit http://yourapp.tld/admin

## Use the CRUD-System

Generate a fresh CRUDable Model using:

```bash
php artisan fjord:crud
```

Edit the generated migration to your liking and migrate:

```bash
php artisan migrate
```

Add all fillable columns to the new Model.

Add a navigation-entry to the config file `config/fjord-navigation.php`.

```php
<?php
return [
    [
        'title' => 'Posts',
        'link' => 'posts',
        'icon' =>'<i class="far fa-newspaper"></i>'
    ]
];
```

Add the crud fields to the config file `config/fjord-crud.php`.

```php
<?php

return [
    'posts' =>[
        [
            'type' => 'input',
            'id' => 'title',
            'title' => 'Title',
            'placeholder' => 'Title',
            'hint' => 'The title neeeds to be filled',
            'width' => 8
        ],
        [
            'type' => 'wysiwyg',
            'id' => 'text',
            'title' => 'Text',
            'placeholder' => 'Link',
            'hint' => 'Lorem',
            'width' => 8
        ],
        [
            'type' => 'image',
            'id' => 'image',
            'title' => 'Image',
            'hint' => 'Upload your images',
            'width' => 12,
            'maxFiles' => 3,
            'model' => 'Post'
        ]
    ]
];
```
