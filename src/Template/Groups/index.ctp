<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>

<div class="container" >
    <div class="title">
        <h3 style="margin-left:15px"><?= __('Classes') ?></h3>
        <?= $this->Html->link(__('Ajouter un groupe'), ['action' => 'add'], ['style' => 'margin-left:15px']) ?>

        <hr>
        
    </div>

    <div class="row">
        <?php foreach($groups as $group): ?>
            <?php if($group->label != "admin"): ?>
                <div class="card">
                    <?= $this->Html->link(h($group->label), ['controller' => 'Groups', 'action' => 'view', $group->id], ['class'=>'card-a']) ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>

    </div>
    

</div>
