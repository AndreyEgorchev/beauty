<?php


Admin::model('App\Meta_tags')->title('Meta_tags')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name_meta')->label('Тег'),
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::text('name_meta', 'Тег')->required(),
    ]);
    return $form;
});
