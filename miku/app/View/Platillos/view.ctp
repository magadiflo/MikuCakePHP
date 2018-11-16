<h1><?php echo $platillo['Platillo']['nombre']; ?></h1>
<div class="row">
	<div class="col col-sm-7">
			<?php echo $this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . 
											'/' . 'vga_' .$platillo['Platillo']['foto'], 
										 array('class' => 'img-thumbnail img-responsive')); ?>
	</div>
	<div class="col col-sm-5">
		<strong><?php echo $platillo['Platillo']['nombre']; ?></strong>
		<br><br>
		S/ <span id="productprice"><?php echo $platillo['Platillo']['precio']; ?></span>
		<br><br>
		<?php echo $this->Form->button('Agregar a pedido', array('class'=>'btn btn-primary btn-lg')); ?>
		<br><br>
		<strong>Descripción: </strong>
		<?php echo $platillo['Platillo']['descripcion']; ?>
		<br><br>
		<strong>Estado: </strong>
		<?php echo ($platillo['Platillo']['estado'] == 1) ? 'Habilitado' : 'Deshabilitado'; ?>
		<br><br>
		<strong>Creado: </strong>
		<?php echo $platillo['Platillo']['created']; ?>
		<br><br>
		<strong>Modificado: </strong>
		<?php echo $platillo['Platillo']['modified']; ?>
		<br><br>
		<strong>Categoría: </strong>
		<?php echo $this->Html->link($platillo['Categoria']['categoria'],
								array('controller'=>'categorias', 'action'=>'view', 
										$platillo['Categoria']['id']));?>
		<br><br>
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<?php echo __('Actions'); ?> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('Edit Platillo'), array('action' => 'edit', $platillo['Platillo']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Platillo'), array('action' => 'delete', $platillo['Platillo']['id']), array(), __('¿Seguro que desea eliminar el platillo [%s]?', $platillo['Platillo']['nombre'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Platillos'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Platillo'), array('action' => 'add')); ?> </li>
				<li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
				<li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
				<li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Orden Items'), array('controller' => 'orden_items', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Orden Item'), array('controller' => 'orden_items', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>




<div class="related">
	<h3><?php echo __('Relacionado con Item Previos'); ?></h3>
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
	<h3><?php echo __('Relacionado con Orden Items'); ?></h3>
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
