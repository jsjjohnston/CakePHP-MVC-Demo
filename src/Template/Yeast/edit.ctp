<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yeast $yeast
 */
?>
<div class="yeast form large-9 medium-8 columns content">
    <?= $this->Form->create($yeast) ?>
    <fieldset>
        <legend><?= __('Edit Yeast') ?></legend>
        <?php
            echo $this->Form->control('yeast_name');
            echo $this->Form->control('type');
            echo $this->Form->control('attenuation_min');
            echo $this->Form->control('attenuation_max');
            echo $this->Form->control('temperature_min');
            echo $this->Form->control('temperature_max');
            echo $this->Form->control('recipe._ids', ['options' => $recipe]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
