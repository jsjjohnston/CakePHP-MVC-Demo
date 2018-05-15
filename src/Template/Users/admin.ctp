<div class="recipe index large-9 medium-8 columns content">
    <h3><?= h('Admin Page') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('User Management') ?></th>
                <th scope="col"><?= __('Recipe Management') ?></th>
                <th scope="col"><?= __('Yeast Management') ?></th>
                <th scope="col"><?= __('Malt Management') ?></th>
                <th scope="col"><?= __('Hops Management') ?></th>
                <th scope="col"><?= __('Style Management') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?= $this->Html->link(__('Add User'), ['action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage Users'), ['action' => 'index']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Add Recipe'), ['controller'=>'recipe','action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage Recipes'), ['controller'=>'recipe','action' => 'index']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Add Yeast'), ['controller'=>'yeast','action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage Yeast'), ['controller'=>'yeast','action' => 'index']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Add Malt'), ['controller'=>'malt','action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage Malt'), ['controller'=>'malt','action' => 'index']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Add Hops'), ['controller'=>'hops','action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage Hops'), ['controller'=>'hops','action' => 'index']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Add style'), ['controller'=>'style','action' => 'add']) ?>
                    <br>
                    <?= $this->Html->link(__('Manage style'), ['controller'=>'style','action' => 'index']) ?>
                </td>
            </tr>         
        </tbody>
    </table>

</div>