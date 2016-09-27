<?php
use App\Speciality;

use SleepingOwl\Admin\Model\ModelConfiguration;


Admin::model('App\Speciality')->title('Speciality')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('specialty_name')->label('first_name'),
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::text('specialty_name', 'Specialty name')->required(),
    ]);
    return $form;
});
