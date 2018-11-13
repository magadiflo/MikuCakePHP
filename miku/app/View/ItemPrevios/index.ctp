<div class="itemPrevios index">
	<h2><?php echo __('Item Previos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
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
	<?php foreach ($itemPrevios as $itemPrevio): ?>
	<tr>
		<td><?php echo h($itemPrevio['ItemPrevio']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemPrevio['User']['name'], array('controller' => 'users', 'action' => 'view', $itemPrevio['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemPrevio['Platillo']['id'], array('controller' => 'platillos', 'action' => 'view', $itemPrevio['Platillo']['id'])); ?>
		</td>
		<td><?php echo h($itemPrevio['ItemPrevio']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($itemPrevio['ItemPrevio']['subtotal']); ?>&nbsp;</td>
		<td><?php echo h($itemPrevio['ItemPrevio']['comentario']); ?>&nbsp;</td>
		<td><?php echo h($itemPrevio['ItemPrevio']['created']); ?>&nbsp;</td>
		<td><?php echo h($itemPrevio['ItemPrevio']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $itemPrevio['ItemPrevio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemPrevio['ItemPrevio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $itemPrevio['ItemPrevio']['id']), array(), __('Are you sure you want to delete # %s?', $itemPrevio['ItemPrevio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Item Previo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
