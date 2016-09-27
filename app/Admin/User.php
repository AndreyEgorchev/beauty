<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\User')->title('Users')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::image('avatar'),
		Column::string('email')->label('Email'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('first_name', 'First name')->required(),
		FormItem::text('last_name', 'Last name')->required(),
		FormItem::text('email', 'Email')->required()->unique(),
		FormItem::text('phone', 'phone')->required()->unique(),
		FormItem::text('email', 'Email')->required()->unique(),
		FormItem::password('password', 'password')->required()->unique(),
		FormItem::image('avatar', 'Avatar')
	]);
	return $form;
});