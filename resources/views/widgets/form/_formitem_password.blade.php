<?php if(! isset($value)) $value = null ?>
<div class="{!! $errors->has($name) ? 'has-error' : null !!}">
    {{--<label for="{!! $name !!}">{{ $title }}</label>--}}
    {{--{!! Form::password($name, $value, array('placeholder' => $placeholder,'class'=>"form-control" )) !!}--}}
    {!! Form::password($name, array('placeholder' => $placeholder,'class'=>"form-control" )) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>