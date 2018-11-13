<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('mobile');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mensaje'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
	</ul>
</div>
