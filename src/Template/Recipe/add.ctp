<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<script>
    function addMalt() {
        console.log("Add Malt");
        var txt2 = "<?=$this->Form->select('malt._ids', $malt)?>";  // Create text with jQuery
        $("#malt").append(txt2);
    }

    function addHops() {
        console.log("Add Hops");
        var txt2 = $("<h3></h3>").text("Sexty.");  // Create text with jQuery
        $("#hops").append(txt2);
    }
</script>

<div class="users form large-9 medium-8 columns content">
    <h3><?= h('Add a recipe') ?></h3>
    <?= $this->Form->create($recipe) ?>
        <fieldset>
            <legend><?= __('Create A New Recipe:') ?></legend>
            <?php
                echo $this->Form->control('recipe_name');
                echo $this->Form->control('batch_size');
                echo $this->Form->select('style._ids', $style);

            ?>
            <div class="related">
            <h4 id='malt'><?= __('Malt') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Malt Name') ?></th>
                </tr>
                <tr>
                    <td><?= $this->Form->select('malt.0.id', $malt,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('malt.1.id', $malt,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('malt.2.id', $malt,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('malt.3.id', $malt,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('malt.4.id', $malt,  ['empty' => '--NONE--']) ?></td> 
                </tr>
            </table>
            </div>

            <div class="related">
            <h4 id='hops'><?= __('Hops') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Hop Name') ?></th>
                </tr>
                <tr>
                    <td><?= $this->Form->select('hops.0.id', $hops,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('hops.1.id', $hops,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('hops.2.id', $hops,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('hops.3.id', $hops,  ['empty' => '--NONE--']) ?></td> 
                </tr>
                <tr>
                    <td><?= $this->Form->select('hops.4.id', $hops,  ['empty' => '--NONE--']) ?></td> 
                </tr>
            </table>
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
</div>
