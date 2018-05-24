<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe[]|\Cake\Collection\CollectionInterface $recipe
 */
?>
<div class="recipe index large-9 medium-8 columns content">
    <h3><?= __('View All Recipes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('recipe_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_size') ?></th>
                
                <?php
                    if(!empty($user) && $user['role'] == 'Admin' ) {
                        echo '<th scope="col" class="actions">';
                        echo 'Actions';
                        echo '</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipe as $recipe): ?>
            <tr>
                <td><?= $recipe->has('recipe_name') ? $this->Html->link($recipe->recipe_name, ['controller' => 'Recipe', 'action' => 'view', $recipe->id]) : '' ?></td>
                <td><?= $recipe->has('user') ? $this->Html->link($recipe->user->user_name, ['controller' => 'Users', 'action' => 'view', $recipe->user->id]) : '' ?></td>
                <td><?= $this->Number->format($recipe->batch_size) ?></td>
                
                <?= !empty($user) && $user['role'] == 'Admin' ? '<td class="actions">' : '' ?>
                    <?= !empty($user) && $user['role'] == 'Admin' ? $this->Html->link(__('Edit'), ['action' => 'edit', $recipe->id]) : '' ?>
                    <?= !empty($user) && $user['role'] == 'Admin' ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) : '' ?>
                <?= !empty($user) && $user['role'] == 'Admin' ? '</td>' : '' ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
