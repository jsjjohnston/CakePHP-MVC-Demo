<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yeast $yeast
 */
?>
<div class="yeast view large-9 medium-8 columns content">
    <h3><?= h($yeast->yeast_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Yeast Name') ?></th>
            <td><?= h($yeast->yeast_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($yeast->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($yeast->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attenuation Min') ?></th>
            <td><?= $this->Number->format($yeast->attenuation_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attenuation Max') ?></th>
            <td><?= $this->Number->format($yeast->attenuation_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temperature Min') ?></th>
            <td><?= $this->Number->format($yeast->temperature_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temperature Max') ?></th>
            <td><?= $this->Number->format($yeast->temperature_max) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recipes') ?></h4>
        <?php if (!empty($yeast->recipe)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Recipe Name') ?></th>
                <th scope="col"><?= __('Batch Size') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($yeast->recipe as $recipe): ?>
            <tr>
                <td><?= h($recipe->id) ?></td>
                <td><?= h($recipe->recipe_name) ?></td>
                <td><?= h($recipe->batch_size) ?></td>
                <td><?= h($recipe->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recipe', 'action' => 'view', $recipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recipe', 'action' => 'edit', $recipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipe', 'action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
