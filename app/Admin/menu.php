<?php


Admin::menu()->label('Пользователи')->icon('fa-users')->items(function () {
    Admin::menu('App\Permit')->label('Права')->icon('fa-key');
    Admin::menu('App\Role')->label('Роли')->icon('fa-graduation-cap');
    Admin::menu('App\User')->label('Юзеры')->icon('fa-user');
});
Admin::menu()->label('Спеціалісти')->icon('fa-users')->items(function () {
    Admin::menu('App\Meta_tags')->label('Мета теги')->icon('fa-user');
    Admin::menu('App\Specialist')->label('Спеціалісти')->icon('fa-user');
    Admin::menu('App\Speciality')->label('Спеціальності')->icon('fa-user');
});
//Admin::menu('App\Article')->icon('fa-user');
