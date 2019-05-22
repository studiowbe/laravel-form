<?php
/**
 * @var $form \Studiow\Form\Form
 */
?>

{!! $form->open() !!}
<main>
    @foreach ($form->fields() as $field)
        {!!  $field->render() !!}
    @endforeach
</main>
<footer>
    <div class="buttons">
        @foreach ($form->buttons() as $button)
            {!!  $button->render() !!}
        @endforeach
    </div>
</footer>
{!! $form->close() !!}
