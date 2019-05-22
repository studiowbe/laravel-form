<?php
use Collective\Html\FormFacade as Form;
use Collective\Html\HtmlFacade as Html;
?>
@component('form::field.wrapper', ['id'=>$control_id, 'wrapper_attr'=>$wrapper_attr])
    {{ Form::label($control_id, $label, $label_attr) }}
    {{ Form::select($control_id, $options, $value, $control_attr) }}
@endcomponent
