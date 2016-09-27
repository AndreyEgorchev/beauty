<?php if(! isset($value)) $value = null ?>
<div class="{!! $errors->has($name) ? 'has-error' : null !!}">
    <label class="sr-only" for="{!! $name !!}">Email address</label>
    {!! Form::text($name, $value, array('placeholder' => $placeholder,'class'=>"form-control" )) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>