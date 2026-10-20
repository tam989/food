<?php

use Illuminate\Support\Facades\Route;

// 1. Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. О проекте (передаем ФИО и группу массивом)
Route::get('/about', function () {
    return view('about', [
        'fio' => 'Иванов Иван Иванович', // Замените на свои данные
        'group' => 'ПИ-201'               // Замените на свою группу
    ]);
})->name('about');

// 3. Контакты (передаем данные организации массивом)
Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'г. Москва, ул. Пушкина, д. 10',
        'phone' => '+7 (999) 123-45-67',
        'email' => 'info@food-delivery.ru'
    ]);
})->name('contacts');

// 4. Приветствие (возвращает строку напрямую, без шаблона)
Route::get('/hello/{name}', function (string $name) {
    return "Здравствуйте, {$name}! Добро пожаловать в Доставка еды.";
});

// 5. Просмотр блюда (только цифры в ID)
Route::get('/dishes/{id}', function (string $id) {
    return view('dishes-show', ['id' => $id]);
})->name('dishes.show')->whereNumber('id');