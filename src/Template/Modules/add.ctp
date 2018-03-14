<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module $module
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Marks'), ['controller' => 'Marks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mark'), ['controller' => 'Marks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modules form large-9 medium-8 columns content">
    <?= $this->Form->create($module) ?>
    <fieldset>
        <legend><?= __('Add Module') ?></legend>
        <?php
            echo $this->Form->control('label');
            echo $this->Form->control('group_id', ['options' => $groups, 'label' => 'Classe']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
