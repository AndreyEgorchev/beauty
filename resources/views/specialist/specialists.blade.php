@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                {!! Form::open() !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <img src="{{asset('../img/search.png')}}">
                        </span>
                </div>
                <div id="filter2">
                    <a href="#">По населеному пункту</a>
                </div>
                <div id="filter22" class="city_second">
                    <p>
                        <select size="1" name="region" class="city_filter" required>
                            <option value="0" selected>--Виберіть Область--</option>
                            @foreach($region as $key )
                                <option value="{{ $key->id }}">
                                    {{ $key->region_ua }}
                                </option>
                            @endforeach
                        </select>
                    <div class="first">
                        <span class="area_first">

                        </span>
                    </div>
                </div>
                <div id="filter3">
                    <a href="#">По спеціальності</a>
                </div>
                <div id="filter33" class="city_second">
                    <select size="1" name="region" class="filter3" required>
                        <option value="0">--Виберіть спеціальність--</option>
                        @foreach($speciality as $key )
                            <option value="{{ $key->id }}">
                                {{ $key->specialty_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-sm-9">
                @foreach($specialists as $specialist )
                    <dt class="list-determination_definition">{{ $specialist->first_name }}</dt>
                    <dt class="list-determination_definition">{{ $specialist->last_name }}</dt>
                    <dt class="list-determination_definition">{{ $specialist->phone_number }}</dt>
                    <dt class="list-determination_definition">{{ $specialist->email }}</dt>
                    <dt class="list-determination_definition">
                    @foreach($specialist->cityfull as $city )
                        {{ $city->city_ua }}
                    @endforeach
                    </dt>
                    <dt class="list-determination_definition">
                        @foreach($specialist->specialityfull as $speciality )

                            {{ $speciality->specialty_name }}
                        @endforeach
                    </dt>
                    <p>
                        <a href="{{ route('specialists.show', $specialist->id) }}" class="btn btn-info">Переглянути профіль</a>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection