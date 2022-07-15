<?php

return [
    'required' => 'Поле «:attribute» обязательно для заполнения',
    'required_without' => 'Поле «:attribute» обязательно для заполнения, если не указан «:values»',
    'regex' => 'Некорректный формат у поля «:attribute»',
    'string' => 'Поле «:attribute» должно состоять из букв',
    'distinct' => 'Поле «:attribute» не должно дублироваться с другими полями',
    'numeric' => 'Поле «:attribute» не должно быть больше, чем :max',

    'max' => [
        'string' => 'Поле «:attribute» должно быть не больше :max символов',
        'array' => 'Кол-во полей :attribute должно быть не больше :max',
    ],

    'attributes' => [
        'title' => 'Название',
        'price' => 'Цена',
        'photos' => 'Фотография',
        'photos.0' => 'Первая фотография',
        'photos.1' => 'Вторая фотография',
        'photos.2' => 'Третья фотография',
        'description' => 'Описание',

    ],

];
