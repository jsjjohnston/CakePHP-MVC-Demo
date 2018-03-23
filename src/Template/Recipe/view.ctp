<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipe'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hops'), ['controller' => 'Hops', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hop'), ['controller' => 'Hops', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Malt'), ['controller' => 'Malt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Malt'), ['controller' => 'Malt', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Style'), ['controller' => 'Style', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Style'), ['controller' => 'Style', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Yeast'), ['controller' => 'Yeast', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Yeast'), ['controller' => 'Yeast', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipe view large-9 medium-8 columns content">
    <h3><?= h($recipe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Recipe Name') ?></th>
            <td><?= h($recipe->recipe_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $recipe->has('user') ? $this->Html->link($recipe->user->id, ['controller' => 'Users', 'action' => 'view', $recipe->user->id]) : '' ?></td>
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
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Hop Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Alpha Acid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->hops as $hops): ?>
            <tr>
                <td><?= h($hops->id) ?></td>
                <td><?= h($hops->hop_name) ?></td>
                <td><?= h($hops->type) ?></td>
                <td><?= h($hops->alpha_acid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hops', 'action' => 'view', $hops->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hops', 'action' => 'edit', $hops->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hops', 'action' => 'delete', $hops->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hops->id)]) ?>
                </td>
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
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Malt Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Specific Gravity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->malt as $malt): ?>
            <tr>
                <td><?= h($malt->id) ?></td>
                <td><?= h($malt->malt_name) ?></td>
                <td><?= h($malt->type) ?></td>
                <td><?= h($malt->specific_gravity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Malt', 'action' => 'view', $malt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Malt', 'action' => 'edit', $malt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Malt', 'action' => 'delete', $malt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $malt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Style') ?></h4>
        <?php if (!empty($recipe->style)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Yeast Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->style as $style): ?>
            <tr>
                <td><?= h($style->id) ?></td>
                <td><?= h($style->yeast_name) ?></td>
                <td><?= h($style->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Style', 'action' => 'view', $style->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Style', 'action' => 'edit', $style->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Style', 'action' => 'delete', $style->id], ['confirm' => __('Are you sure you want to delete # {0}?', $style->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Yeast') ?></h4>
        <?php if (!empty($recipe->yeast)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Yeast Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Attenuation Min') ?></th>
                <th scope="col"><?= __('Attenuation Max') ?></th>
                <th scope="col"><?= __('Temperature Min') ?></th>
                <th scope="col"><?= __('Temperature Max') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->yeast as $yeast): ?>
            <tr>
                <td><?= h($yeast->id) ?></td>
                <td><?= h($yeast->yeast_name) ?></td>
                <td><?= h($yeast->type) ?></td>
                <td><?= h($yeast->attenuation_min) ?></td>
                <td><?= h($yeast->attenuation_max) ?></td>
                <td><?= h($yeast->temperature_min) ?></td>
                <td><?= h($yeast->temperature_max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Yeast', 'action' => 'view', $yeast->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Yeast', 'action' => 'edit', $yeast->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Yeast', 'action' => 'delete', $yeast->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yeast->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
