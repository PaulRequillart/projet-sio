<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups index large-9 medium-8 columns content">
    <h3><?= __('Classes') ?></h3>

    <ul>
        <?php foreach ($groups as $group): ?>
                <li><?= $this->Html->link(h($group->label), ['controller' => 'Groups', 'action' => 'view', $group->id]) ?></li>
        <?php endforeach; ?>
    </ul>

</div>
