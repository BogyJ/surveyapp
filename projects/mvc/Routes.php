<?php
    return [
        \App\Core\Route::get('|^product/([0-9]+)/?$|', 'Product', 'show'),

        \App\Core\Route::any('|^.*$|', 'Main', 'home')
    ];
