<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Malt $malt
 */
?>
<div class="malt form large-9 medium-8 columns content">
    <h3><?= h('Add Malt') ?></h3>
    <?= $this->Form->create($malt) ?>
    <fieldset>
        <legend><?= __('New Malt') ?></legend>
        <?php
            echo $this->Form->control('malt_name');
            echo $this->Form->control('type', ['options'=> ['Grain'=>'Grain', 'Extract'=>'Extract']]);
            echo $this->Form->control('specific_gravity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add')) ?>
    <?= $this->Form->end() ?>
</div>
