<div class="categorias view">
<h2><?php echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['categoria']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Platillos'); ?></h3>
	<?php if (!empty($categoria['Platillo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Foto Dir'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Platillo'] as $platillo): ?>
		<tr>
			<td><?php echo $platillo['id']; ?></td>
			<td><?php echo $platillo['categoria_id']; ?></td>
			<td><?php echo $platillo['nombre']; ?></td>
			<td><?php echo $platillo['descripcion']; ?></td>
			<td><?php echo $platillo['precio']; ?></td>
			<td><?php echo $platillo['foto']; ?></td>
			<td><?php echo $platillo['foto_dir']; ?></td>
			<td><?php echo $platillo['estado']; ?></td>
			<td><?php echo $platillo['created']; ?></td>
			<td><?php echo $platillo['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'platillos', 'action' => 'view', $platillo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'platillos', 'action' => 'edit', $platillo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'platillos', 'action' => 'delete', $platillo['id']), array(), __('Are you sure you want to delete # %s?', $platillo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
