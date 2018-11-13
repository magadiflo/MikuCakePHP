<div class="itemPrevios form">
<?php echo $this->Form->create('ItemPrevio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Item Previo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ItemPrevio.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ItemPrevio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
