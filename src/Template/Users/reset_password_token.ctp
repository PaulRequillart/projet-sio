<h1>Change Your Password</h1>
<?= $this->Form->create() ?>
    <?= $this->Form->hidden('User.reset_password_token'); ?>
	<?= $this->Form->input('User.new_passwd',  array('type' => 'password', 'label' => 'Password', 'between' => '<br />', 'type' => 'password') ); ?>
	<?= $this->Form->input('User.confirm_passwd',  array('type' => 'password', 'label' => 'Confirm Password', 'between' => '<br />', 'type' => 'password') ); ?>
	<?= $this->Form->submit('Change Password', array('class' => 'submit', 'id' => 'submit')); ?>
<?= $this->Form->end(); ?>