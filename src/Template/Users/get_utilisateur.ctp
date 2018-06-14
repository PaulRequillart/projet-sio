<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Votre adresse email') ?></legend>
        <?php
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>