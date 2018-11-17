<div class="well">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($user['User']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		<?php echo __('Actions'); ?> <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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

<div class="related">
	<h3><?php echo __('Relacionado con Item Previos'); ?></h3>
	<?php if (!empty($user['ItemPrevio'])): ?>
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
	<?php foreach ($user['ItemPrevio'] as $itemPrevio): ?>
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
	<h3><?php echo __('Mensajes del usuario'); ?></h3>
	<?php if (!empty($user['Mensaje'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Mensaje'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Mensaje'] as $mensaje): ?>
		<tr>
			<td><?php echo $mensaje['id']; ?></td>
			<td><?php echo $mensaje['user_id']; ?></td>
			<td><?php echo $mensaje['mensaje']; ?></td>
			<td><?php echo $mensaje['estado']; ?></td>
			<td><?php echo $mensaje['created']; ?></td>
			<td><?php echo $mensaje['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'mensajes', 'action' => 'view', $mensaje['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'mensajes', 'action' => 'edit', $mensaje['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'mensajes', 'action' => 'delete', $mensaje['id']), array(), __('Are you sure you want to delete # %s?', $mensaje['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mensaje'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Órdenes del usuario'); ?></h3>
	<?php if (!empty($user['Orden'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Orden'] as $orden): ?>
		<tr>
			<td><?php echo $orden['id']; ?></td>
			<td><?php echo $orden['user_id']; ?></td>
			<td><?php echo $orden['total']; ?></td>
			<td><?php echo $orden['estado']; ?></td>
			<td><?php echo $orden['comentario']; ?></td>
			<td><?php echo $orden['created']; ?></td>
			<td><?php echo $orden['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ordens', 'action' => 'view', $orden['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ordens', 'action' => 'edit', $orden['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ordens', 'action' => 'delete', $orden['id']), array(), __('Are you sure you want to delete # %s?', $orden['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
