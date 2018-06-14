<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Ajouter un eleve') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            //echo $this->Form->control('username', ['label'=>'Email']);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role', [
                'options' => ['eleve' => 'Eleve']]);
            echo $this->Form->control('group_id', ['options' => $groups, 'label' => 'Classe']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
