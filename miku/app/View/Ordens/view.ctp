<div class="ordens view">
<h2><?php echo __('Orden'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orden['User']['name'], array('controller' => 'users', 'action' => 'view', $orden['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentario'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['comentario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orden['Orden']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orden'), array('action' => 'edit', $orden['Orden']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orden'), array('action' => 'delete', $orden['Orden']['id']), array(), __('Are you sure you want to delete # %s?', $orden['Orden']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orden Items'); ?></h3>
	<?php if (!empty($orden['OrdenItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Orden Id'); ?></th>
		<th><?php echo __('Platillo Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orden['OrdenItem'] as $ordenItem): ?>
		<tr>
			<td><?php echo $ordenItem['id']; ?></td>
			<td><?php echo $ordenItem['orden_id']; ?></td>
			<td><?php echo $ordenItem['platillo_id']; ?></td>
			<td><?php echo $ordenItem['cantidad']; ?></td>
			<td><?php echo $ordenItem['subtotal']; ?></td>
			<td><?php echo $ordenItem['comentario']; ?></td>
			<td><?php echo $ordenItem['created']; ?></td>
			<td><?php echo $ordenItem['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orden_items', 'action' => 'view', $ordenItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orden_items', 'action' => 'edit', $ordenItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orden_items', 'action' => 'delete', $ordenItem['id']), array(), __('Are you sure you want to delete # %s?', $ordenItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
