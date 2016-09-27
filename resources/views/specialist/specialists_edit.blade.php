@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel-body">
            <h1>
                Edit
            </h1>
            {!! Form::model($task, ['method' => 'PATCH','route' => ['specialists.update', $task->id],'files' => true]) !!}

            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-md-6">
                        {!! Form::label('first_name') !!}
                        {!! Form::text('first_name', Request::old('first_name'),['class'=>'form-control']) !!}
                        @if( $errors->has('first_name'))
                            @foreach( $errors->get('first_name') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-6">
                        {!! Form::label('last_name') !!}
                        {!! Form::text('last_name', Request::old('last_name'),['class'=>'form-control']) !!}
                        @if( $errors->has('last_name'))
                            @foreach( $errors->get('last_name') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">

                <div class="col-md-12">
                    <div class="col-md-4 form-control-static">

                        <select size="1" name="specialty_name_1" class="special_select_1" required>
                            {{--<option value="{{$task->speciality[0]->id}}" selected>{{$task->speciality[0]->specialty_name}}</option>--}}
                            @foreach($task->allspeciality as $key )
                                <option value="{{ $key->id }}"
                                @if ($task->speciality[0]->id == $key->id)
                                    {{'selected'}}
                                        @endif >
                                    {{ $key->specialty_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    {{----------------------------------------------------------------------------------------------------------------------------------}}

                    <div class="col-md-4 form-control-static">

                        <select size="1" name="specialty_name_2" class="special_select_2" required>
                            @foreach($task->allspeciality as $key )
                                <option value="{{ $key->id }}"
                                @if ($task->speciality[1]->id == $key->id)
                                    {{'selected'}}
                                        @endif >
                                    {{ $key->specialty_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-----------------------------------------------------------------------------------------------------------------------------------}}
                    <div class="col-md-4 form-control-static">
                        <select size="1" name="specialty_name_3" class="special_select_3" required>
                            @foreach($task->allspeciality as $key )
                                <option value="{{ $key->id }}"
                                @if ($task->speciality[2]->id == $key->id)
                                    {{'selected'}}
                                        @endif >
                                    {{ $key->specialty_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-md-6">
                        {!! Form::label('phone_number') !!}
                        {!! Form::text('phone_number', Request::old('phone_number'),['class'=>'form-control']) !!}
                        @if( $errors->has('phone_number'))
                            @foreach( $errors->get('phone_number') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('email') !!}
                        {!! Form::text('email', Request::old('email'),['class'=>'form-control']) !!}
                        @if( $errors->has('email'))
                            @foreach( $errors->get('email') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-md-4">
                        {!! Form::label('link_vk') !!}
                        {!! Form::text('link_vk', Request::old('link_vk'),['class'=>'form-control']) !!}
                        @if( $errors->has('link_vk'))
                            @foreach( $errors->get('link_vk') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-4">
                        {!! Form::label('link_fb') !!}
                        {!! Form::text('link_fb', Request::old('link_fb'),['class'=>'form-control']) !!}
                        @if( $errors->has('link_fb'))
                            @foreach( $errors->get('link_fb') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('link_instagram') !!}
                        {!! Form::text('link_instagram', Request::old('link_instagram'),['class'=>'form-control']) !!}
                        @if( $errors->has('link_instagram'))
                            @foreach( $errors->get('link_instagram') as $error)
                                <p class='alert alert-danger'>
                                    {{$error}}
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-md-4 form-control-static">
                        <p>

                            <select size="1" name="region_1" class="regionId_first" required>

                                @foreach($task->allregion as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->region[0] == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->region_ua }}
                                    </option>
                                @endforeach
                            </select>

                        <div class="first">
                        <span class="area_first">

                            <select size="1" name="city_first" class="regionId_first" required>
                                @foreach($task->cityuser[0] as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->city[0]->id == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->city_ua }}
                                    </option>
                                @endforeach
                            </select>
                        </span>
                        </div>


                    </div>
                    {{-------------------------------------------------------------------------------------------------------------------------}}
                    <div class="col-md-4 form-control-static">
                        <p>

                            <select size="1" name="region_2" class="regionId_second" required>
                                @foreach($task->allregion as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->region[1] == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->region_ua }}
                                    </option>
                                @endforeach
                            </select>

                        <div class="second">
                        <span class="area_second">
                            <select size="1" name="city_second" class="regionId_first" required>
                                @foreach($task->cityuser[1] as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->city[1]->id == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->city_ua }}
                                    </option>
                                @endforeach
                            </select>
                        </span>
                        </div>
                    </div>

                    {{-----------------------------------------------------------------------------------------------------------------------------}}
                    <div class="col-md-4 form-control-static">
                        <p>
                            <select size="1" name="region_3" class="regionId_third" required>
                                @foreach($task->allregion as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->region[2] == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->region_ua }}
                                    </option>
                                @endforeach
                            </select>

                        <div class="third">
                        <span class="area_third">
                            <select size="1" name="city_third" class="regionId_first" required>

                                @foreach($task->cityuser[2] as $key )
                                    <option value="{{ $key->id }}"
                                    @if ($task->city[2]->id == $key->id)
                                        {{'selected'}}
                                            @endif >
                                        {{ $key->city_ua }}
                                    </option>
                                @endforeach
                            </select>
                        </span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description') !!}
                {!! Form::textarea('description', null,['class'=>'form-control']) !!}
                @if( $errors->has('description'))
                    @foreach( $errors->get('description') as $error)
                        <p class='alert alert-danger'>
                            {{$error}}
                        </p>
                    @endforeach
                @endif
            </div>
            <div id="page">
                <div id="gallery">
                    <div id="panel">
                        <img id="largeImage" src="{{asset('../images/uploads/'.$task->images[0]->originalName)}}"
                             height="500px" style="max-width:577px; width: 100%;"/>
                        {{--<div id="description">1st image description</div>--}}
                    </div>
                    <div id="thumbs">
                        @foreach ($task->images as $key)
                            <img src="{{asset('../images/uploads/'.$key->originalName)}}" height="64"
                                 alt="1st image description"/>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::file('attachments[]', array('multiple'=>true)) !!}
            </div>
            <div class="form-group">
                @include('widgets.form._formitem_btn_submit', ['title' => 'Редагування'])
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection