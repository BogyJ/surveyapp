<?php
    return [
        \App\Core\Route::get('|^user/register/?$|', 'Main', 'getRegister'),
        \App\Core\Route::post('|^user/register/?$|', 'Main', 'postRegister'),

        \App\Core\Route::get('|^user/login/?$|', 'Main', 'getLogin'),
        \App\Core\Route::post('|^user/login/?$|', 'Main', 'postLogin'),
        \App\Core\Route::get('|^user/logout/?$|', 'Main', 'getLogout'),

        \App\Core\Route::get('|^user/survey/show/?$|', 'Form', 'showForm'),
        \App\Core\Route::post('|^user/survey/create/?$|', 'Form', 'createForm'),


        \App\Core\Route::get('|^user/survey/question/?$|', 'Question', 'showQuestionForm'),
        \App\Core\Route::post('|^user/survey/question/create/?$|', 'Question', 'createQuestion'),

        \App\Core\Route::get('|^user/profile/?$|', 'User', 'index'),

        \App\Core\Route::any('|^.*/?$|', 'Main', 'home')
    ];
