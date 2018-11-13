<div class="itemPrevios view">
<h2><?php echo __('Item Previo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemPrevio['User']['name'], array('controller' => 'users', 'action' => 'view', $itemPrevio['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Platillo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemPrevio['Platillo']['id'], array('controller' => 'platillos', 'action' => 'view', $itemPrevio['Platillo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['subtotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentario'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['comentario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($itemPrevio['ItemPrevio']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item Previo'), array('action' => 'edit', $itemPrevio['ItemPrevio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item Previo'), array('action' => 'delete', $itemPrevio['ItemPrevio']['id']), array(), __('Are you sure you want to delete # %s?', $itemPrevio['ItemPrevio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Previo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
