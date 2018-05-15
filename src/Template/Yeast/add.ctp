<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yeast $yeast
 */
?>
<div class="yeast form large-9 medium-8 columns content">
    <h3><?= h('Add Yeast') ?></h3>
    <?= $this->Form->create($yeast) ?>
    <fieldset>
        <legend><?= __('New Yeast') ?></legend>
        <?php
            echo $this->Form->control('yeast_name');
            echo $this->Form->control('type', ['options' => ['Lager' => 'Lager', 'Ale' => 'Ale']]);
            echo $this->Form->control('attenuation_min');
            echo $this->Form->control('attenuation_max');
            echo $this->Form->control('temperature_min');
            echo $this->Form->control('temperature_max');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
