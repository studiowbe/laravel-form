<?php
use Collective\Html\FormFacade as Form;
use Collective\Html\HtmlFacade as Html;
?>
@component('form::field.wrapper', ['id'=>$control_id, 'wrapper_attr'=>$wrapper_attr])
    {{ Form::label($control_id, $label, $label_attr) }}
    {{ Form::password($control_id, $control_attr) }}
@endcomponent
