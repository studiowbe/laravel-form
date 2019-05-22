<?php

/**
 * @var $errors \Illuminate\Support\MessageBag
 * @var $id string
 */

$wrapper_attr = $wrapper_attr ?? [];
$wrapper_attr['class'] = trim('form-control ' . $wrapper_attr['class'] ?? '');

if ($errors->has($id)) {
    $wrapper_attr['class'] .= ' has-error';
}

$error_key = str_replace(['[', ']'], ['.', ''], $id);
?>
<div{!!  Html::attributes($wrapper_attr) !!}>
    {{ $slot }}
    @error($error_key)
    <div class="error">{{ $message }}</div>
    @enderror
</div>
