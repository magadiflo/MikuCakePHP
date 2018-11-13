<div class="platillos view">
<h2><?php echo __('Platillo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($platillo['Categoria']['categoria'], array('controller' => 'categorias', 'action' => 'view', $platillo['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['foto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto Dir'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['foto_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($platillo['Platillo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Platillo'), array('action' => 'edit', $platillo['Platillo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Platillo'), array('action' => 'delete', $platillo['Platillo']['id']), array(), __('Are you sure you want to delete # %s?', $platillo['Platillo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Item Previos'); ?></h3>
	<?php if (!empty($platillo['ItemPrevio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Platillo Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($platillo['ItemPrevio'] as $itemPrevio): ?>
		<tr>
			<td><?php echo $itemPrevio['id']; ?></td>
			<td><?php echo $itemPrevio['user_id']; ?></td>
			<td><?php echo $itemPrevio['platillo_id']; ?></td>
			<td><?php echo $itemPrevio['cantidad']; ?></td>
			<td><?php echo $itemPrevio['subtotal']; ?></td>
			<td><?php echo $itemPrevio['comentario']; ?></td>
			<td><?php echo $itemPrevio['created']; ?></td>
			<td><?php echo $itemPrevio['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'item_previos', 'action' => 'view', $itemPrevio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'item_previos', 'action' => 'edit', $itemPrevio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'item_previos', 'action' => 'delete', $itemPrevio['id']), array(), __('Are you sure you want to delete # %s?', $itemPrevio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orden Items'); ?></h3>
	<?php if (!empty($platillo['OrdenItem'])): ?>
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
	<?php foreach ($platillo['OrdenItem'] as $ordenItem): ?>
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
