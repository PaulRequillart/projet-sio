<h1>Enter Your Username</h1>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
	<?php echo $this->Form->control('User.username') ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>