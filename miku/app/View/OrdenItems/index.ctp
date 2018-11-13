<div class="ordenItems index">
	<h2><?php echo __('Orden Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('orden_id'); ?></th>
			<th><?php echo $this->Paginator->sort('platillo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal'); ?></th>
			<th><?php echo $this->Paginator->sort('comentario'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ordenItems as $ordenItem): ?>
	<tr>
		<td><?php echo h($ordenItem['OrdenItem']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordenItem['Orden']['id'], array('controller' => 'ordens', 'action' => 'view', $ordenItem['Orden']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ordenItem['Platillo']['id'], array('controller' => 'platillos', 'action' => 'view', $ordenItem['Platillo']['id'])); ?>
		</td>
		<td><?php echo h($ordenItem['OrdenItem']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($ordenItem['OrdenItem']['subtotal']); ?>&nbsp;</td>
		<td><?php echo h($ordenItem['OrdenItem']['comentario']); ?>&nbsp;</td>
		<td><?php echo h($ordenItem['OrdenItem']['created']); ?>&nbsp;</td>
		<td><?php echo h($ordenItem['OrdenItem']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ordenItem['OrdenItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ordenItem['OrdenItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ordenItem['OrdenItem']['id']), array(), __('Are you sure you want to delete # %s?', $ordenItem['OrdenItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Orden Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
