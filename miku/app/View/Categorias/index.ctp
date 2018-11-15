<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-categorias',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>
<div id="contenedor-categorias">
	<div class="page-header">
		<h2><?php echo __('Categorias'); ?></h2>
	</div>

	<div class="col-md-12">
		<div class="progress oculto" id="procesando">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
				<span class="sr-only">100% Complete</span>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('categoria'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categorias as $categoria): ?>
				<tr>
					<td><?php echo h($categoria['Categoria']['categoria']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__(''), 
							array('action' => 'view', $categoria['Categoria']['id']), 
							array('class'=>'btn btn-sm btn-default fa fa-eye')); ?>
						<?php echo $this->Html->link(__(''), 
							array('action' => 'edit', $categoria['Categoria']['id']), 
							array('class'=>'btn btn-sm btn-primary fa fa-edit')); ?>
						<?php echo $this->Form->postLink(__(''), 
							array('action' => 'delete', $categoria['Categoria']['id']), 
							array('class'=>'btn btn-sm btn-danger fa fa-trash'),
							__('¿Seguro que desea eliminar la categoría [%s]?', $categoria['Categoria']['categoria'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
		?>	
	</p>

	<ul class="pagination">
		<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
		<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
		<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
	</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div>