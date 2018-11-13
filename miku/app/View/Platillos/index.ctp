<div class="platillos index">
	<h2><?php echo __('Platillos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th><?php echo $this->Paginator->sort('foto'); ?></th>
			<th><?php echo $this->Paginator->sort('foto_dir'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($platillos as $platillo): ?>
	<tr>
		<td><?php echo h($platillo['Platillo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($platillo['Categoria']['categoria'], array('controller' => 'categorias', 'action' => 'view', $platillo['Categoria']['id'])); ?>
		</td>
		<td><?php echo h($platillo['Platillo']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['precio']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['foto']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['foto_dir']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['estado']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['created']); ?>&nbsp;</td>
		<td><?php echo h($platillo['Platillo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $platillo['Platillo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $platillo['Platillo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $platillo['Platillo']['id']), array(), __('Are you sure you want to delete # %s?', $platillo['Platillo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Platillo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
