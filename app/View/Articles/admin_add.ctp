<div class="articles form">
<?php echo $this->Form->create('Article',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Article'); ?></legend>
	<?php
		echo $this->Form->input('category_id', array('empty' => '---'.__('Select category').'---', 'type' => 'select', 'options' => $categories));
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('content',array('type'=>'textarea','class'=>'mceAdvance'));
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
	</ul>
</div>
