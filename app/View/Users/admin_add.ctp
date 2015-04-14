<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('avatar');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('group', array('type' => 'select', 'empty' => '---'.__('Select Group').'---', 'options' => Configure::read('S.User.group')));
		echo $this->Form->input('gender', array('type' => 'select', 'empty' => '---'.__('Select Gender').'---', 'options' => Configure::read('S.User.gender')));
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
