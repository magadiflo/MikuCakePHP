<div class="container">
	<div class="page-header">
		<h2><?php echo __('Usuarios'); ?></h2>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('lastname'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('mobile'); ?></th>
					<th><?php echo $this->Paginator->sort('username'); ?></th>
					<!-- <th>< ?php echo $this->Paginator->sort('password'); ?></th> -->
					<th><?php echo $this->Paginator->sort('role'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['mobile']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
					<!-- <td>< ?php echo h($user['User']['password']); ?>&nbsp;</td> -->
					<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__(''), 
								array('action' => 'view', $user['User']['id']), 
								array('class'=>'btn btn-sm btn-default fa fa-eye')); ?>
						<?php echo $this->Html->link(__(''), 
								array('action' => 'edit', $user['User']['id']),
								array('class'=>'btn btn-sm btn-primary fa fa-edit')); ?>
						<?php echo $this->Form->postLink(__(''), 
						array('action' => 'delete', $user['User']['id']), 
						array('class'=>'btn btn-sm btn-danger fa fa-trash'),
						__('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<p>
		<?php echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	
	</p>
	<nav>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	</nav>

	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<?php echo __('Acciones'); ?> <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
			<li class="divider"></li>
			<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
			<li class="divider"></li>
			<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Mensaje'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
			<li class="divider"></li>
			<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>