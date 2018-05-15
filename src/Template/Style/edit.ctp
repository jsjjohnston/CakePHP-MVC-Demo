<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Style $style
 */
?>
<div class="style form large-9 medium-8 columns content">
    <?= $this->Form->create($style) ?>
    <fieldset>
        <legend><?= __('Edit Style') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
