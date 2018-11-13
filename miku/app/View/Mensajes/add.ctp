<div class="mensajes form">
<?php echo $this->Form->create('Mensaje'); ?>
	<fieldset>
		<legend><?php echo __('Add Mensaje'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('mensaje');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mensajes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
