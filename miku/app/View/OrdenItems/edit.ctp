<div class="ordenItems form">
<?php echo $this->Form->create('OrdenItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orden Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('orden_id');
		echo $this->Form->input('platillo_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('subtotal');
		echo $this->Form->input('comentario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrdenItem.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrdenItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
