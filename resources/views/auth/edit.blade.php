


{!! Form::model($user, ['method' => 'PATCH','route' => ['profile.update', $user->id],'class'=>"form-signin",'files' => true]) !!}

<div class="form-group">
    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Email','class'=> "form-control" ])
</div>
<div class="form-group">
    {!! Form::text('first_name', Request::old('first_name'),['class'=>'form-control', 'placeholder' => 'Імя']) !!}
</div>
<div class="form-group">
    {!! Form::text('last_name', Request::old('last_name'),['class'=>'form-control', 'placeholder' => 'Прізвище']) !!}
</div>
<div class="form-group">
    {!! Form::text('phone', Request::old('phone'),['class'=>'form-control', 'placeholder' => 'Телефон']) !!}
</div>
<div class="form-group">
    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
</div>
<div class="form-group">
    @include('widgets.form._formitem_password', ['name' => 'password_confirmation', 'title' => 'Подтверждение пароля', 'placeholder' => 'Подтверждение пароля' ])
</div>
<div class="form-group">
    {!! Form::file('avatar', array('multiple'=>true)) !!}
</div>
<div class="form-group">
    @include('widgets.form._formitem_btn_submit', ['title' => 'Редагування'])
</div>
{!! Form::close() !!}
