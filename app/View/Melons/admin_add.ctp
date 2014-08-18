<div class="melons form">
<?php echo $this->Form->create('Melon'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Melon'); ?></legend>
	<?php
		echo $this->Form->input('path');
		echo $this->Form->input('approved');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Melons'), array('action' => 'index')); ?></li>
	</ul>
</div>
