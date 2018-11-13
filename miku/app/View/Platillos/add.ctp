<div class="platillos form">
<?php echo $this->Form->create('Platillo'); ?>
	<fieldset>
		<legend><?php echo __('Add Platillo'); ?></legend>
	<?php
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('precio');
		echo $this->Form->input('foto');
		echo $this->Form->input('foto_dir');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Platillos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
