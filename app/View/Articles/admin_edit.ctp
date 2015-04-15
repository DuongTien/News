<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id',array('type' => 'select','empty' => '---'.__('Select category').'---', 'options' => $categories));
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('content',array('type' => 'textarea', 'class' => 'mceAdvance'));
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Article.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Article.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
	</ul>
</div>
