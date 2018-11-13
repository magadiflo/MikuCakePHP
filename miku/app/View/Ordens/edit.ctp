<div class="ordens form">
<?php echo $this->Form->create('Orden'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orden'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('total');
		echo $this->Form->input('estado');
		echo $this->Form->input('comentario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Orden.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Orden.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
