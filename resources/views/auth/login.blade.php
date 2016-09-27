@extends('layouts.app')

@section('content')
	<div class="container">
		{!! Form::open([ 'class'=>"form-signin"]) !!}

		<h2 class="form-signin-heading">Please sign in</h2>
		@include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email' ])
		@include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		@include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
		{!! Form::close() !!}


	</div>
@stop