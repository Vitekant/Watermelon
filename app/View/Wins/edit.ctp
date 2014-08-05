<div class="wins form">
<?php echo $this->Form->create('Win'); ?>
	<fieldset>
		<legend><?php echo __('Edit Win'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('winer_id');
		echo $this->Form->input('looser_id');
		echo $this->Form->input('count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Win.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Win.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Wins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Melons'), array('controller' => 'melons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Melon'), array('controller' => 'melons', 'action' => 'add')); ?> </li>
	</ul>
</div>
