<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="recipe view large-9 medium-8 columns content">
    <h3><?= h($recipe->recipe_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Recipe Name') ?></th>
            <td><?= h($recipe->recipe_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $recipe->has('user') ? $this->Html->link($recipe->user->user_name, ['controller' => 'Users', 'action' => 'view', $recipe->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recipe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Size') ?></th>
            <td><?= $this->Number->format($recipe->batch_size) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Hops') ?></h4>
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
    </div>
    <div class="related">
        <h4><?= __('Related Malt') ?></h4>
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
    </div>
    <div class="related">
        <h4><?= __('Style') ?></h4>
        <?php if (!empty($recipe->style)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Style Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
            </tr>
            <?php foreach ($recipe->style as $style): ?>
            <tr>
                <td><?= h($style->name) ?></td>
                <td><?= h($style->type) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Yeast') ?></h4>
        <?php if (!empty($recipe->yeast)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Yeast Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Attenuation Min') ?></th>
                <th scope="col"><?= __('Attenuation Max') ?></th>
                <th scope="col"><?= __('Temperature Min') ?></th>
                <th scope="col"><?= __('Temperature Max') ?></th>
            </tr>
            <?php foreach ($recipe->yeast as $yeast): ?>
            <tr>
                <td><?= h($yeast->yeast_name) ?></td>
                <td><?= h($yeast->type) ?></td>
                <td><?= h($yeast->attenuation_min) ?></td>
                <td><?= h($yeast->attenuation_max) ?></td>
                <td><?= h($yeast->temperature_min) ?></td>
                <td><?= h($yeast->temperature_max) ?></td>
              </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
