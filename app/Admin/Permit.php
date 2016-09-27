<?php


Admin::model('App\Permit')->title('Права')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('name'),
        Column::string('slug')->label('slug'),
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::text('name', ' name')->required(),
        FormItem::text('slug', ' slug')->required(),
    ]);
    return $form;
});




