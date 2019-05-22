<?php
/**
 * @var $panel \Studiow\Form\Elements\Panel
 */
?>
<div class="form-panel">
    <?php if($title = $panel->getTitle() ?? false): ?>
    <h3><?= $title; ?></h3>
    <?php if ($desc = $panel->getDescription() ?? false): ?>
    <p class="description"><?= $desc; ?></p>
    <?php endif; ?>
    <?php endif; ?>
    <main>
        <?php foreach ($panel->fields() as $field): ?>
            <?= $field->render(); ?>
        <?php endforeach; ?>
    </main>
</div>