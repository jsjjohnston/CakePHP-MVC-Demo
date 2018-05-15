<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Create A New Recipe:') ?></legend>
        <?php
            echo $this->Form->control('recipe_name');
            echo $this->Form->control('batch_size');
            echo $this->Form->select('style._ids', $style);
            
        ?>
        <div class="related">
        <h4><?= __('Malt') ?></h4>
        <?php if (!empty($recipe->malt)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Malt Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Specific Gravity') ?></th>
            </tr>
            <?php foreach ($recipe->malt as $malt): ?>
            <tr>
                <td><?= h($malt->malt_name) ?></td>
                <td><?= h($malt->type) ?></td>
                <td><?= h($malt->specific_gravity) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php echo $this->Form->button('Add Malt'); ?>
        </div>

        <div class="related">
        <h4><?= __('Hops') ?></h4>
        <?php if (!empty($recipe->hops)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Hop Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Alpha Acid') ?></th>
            </tr>
            <?php foreach ($recipe->hops as $hops): ?>
            <tr>
                <td><?= h($hops->hop_name) ?></td>
                <td><?= h($hops->type) ?></td>
                <td><?= h($hops->alpha_acid) ?></td>
             </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php echo $this->Form->button('Add Hops'); ?>
    </div>
    <div class="related">
        <h4><?= __('Yeast') ?></h4>

        <?php 
            echo $this->Form->select('yeast._ids', $yeast);
        ?>
    </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
