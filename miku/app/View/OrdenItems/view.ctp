<div class="ordenItems view">
<h2><?php echo __('Orden Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orden'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordenItem['Orden']['id'], array('controller' => 'ordens', 'action' => 'view', $ordenItem['Orden']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Platillo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordenItem['Platillo']['id'], array('controller' => 'platillos', 'action' => 'view', $ordenItem['Platillo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['subtotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentario'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['comentario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ordenItem['OrdenItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orden Item'), array('action' => 'edit', $ordenItem['OrdenItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orden Item'), array('action' => 'delete', $ordenItem['OrdenItem']['id']), array(), __('Are you sure you want to delete # %s?', $ordenItem['OrdenItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
