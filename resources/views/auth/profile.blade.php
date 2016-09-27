@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
            <li><a data-toggle="tab" href="#menu1">Edit profile</a></li>
            <li><a data-toggle="tab" href="#menu2">Show your page</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Profile</h3>
                <img src="{{asset('..'.$user->avatar)}}" style="width:150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                Користувач: {{ $user->first_name.' '.$user->last_name }}<br>
                email: {{ $user->email }}<br>
                Створення:<br> {{ $user->created_at }}<br>
                Останній захід: {{ $user->last_login }}
            </div>
            <div id="menu1" class="tab-pane fade">
                @include('auth.edit')

            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Show Specialists</h3>
                @include('specialist.specialist')
                <div class="col-md-1 text-left">
                    <a href="{{ route('specialists.edit', $specialists->id) }}" class="btn btn-primary">Edit Task</a>
                </div>

                <div class="col-md-1 text-right">

                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['specialists.destroy', $specialists->id]
                    ]) !!}
                    {!! Form::submit('Delete ', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop


