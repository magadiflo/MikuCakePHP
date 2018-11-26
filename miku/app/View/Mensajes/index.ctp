<?php
    $this->Paginator->options(array(
        'update' => '#contenedor-mensajes',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer'=>false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer'=>false))
    ));
?>
<?php if(empty($mensajes)): ?>
	<h2>No existen mensajes</h2>
<?php else: ?>
<div class="container">
	<div id="contenedor-mensajes">
		<div class="page-header">
			<h2><?php echo __('Mensajes'); ?></h2>
		</div>
		<div class="col-md-12">
			<div class="progress oculto" id="procesando">
				<div class="progress-bar progress-bar-striped active" 
					role="progressbar" aria-valuenow="100" aria-valuemin="0" 
					aria-valuemax="100" style="width:100%">
					<span class="sr-only">100% Complete</span>
				</div>
			</div>
			<div class="table-responsive">
				<table  class="table table-striped table-hover">
					<thead>
						<tr>
							<?php if($current_user['role'] == 'admin'): ?>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<?php endif; ?>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('estado'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($mensajes as $mensaje): ?>
							<tr class="tam-fuente">
								<?php if($current_user['role'] == 'admin'): ?>
								<td><?php echo h($mensaje['Mensaje']['id']); ?>&nbsp;</td>
								<?php endif; ?>
								<td>
									<?php echo $this->Html->link($mensaje['User']['name'], array('controller' => 'users', 'action' => 'view', $mensaje['User']['id'])); ?>
								</td>
								<td><?php echo ($mensaje['Mensaje']['estado'] == 1) ? 
								'<span class="label label-warning">Por confirmar</span>' : 
								'<span class="label label-success">Confirmado</span>'; ?> &nbsp;</td>
								<td><?php echo h($mensaje['Mensaje']['created']); ?>&nbsp;</td>
								<td><?php echo h($mensaje['Mensaje']['modified']); ?>&nbsp;</td>
								<td class="actions">
									<?php echo $this->Html->link(__(''), array('action' => 'view', $mensaje['Mensaje']['id']), array('class' => 'btn btn-sm btn-default fa fa-eye')); ?>
									<?php 
										if($current_user['role'] == 'admin'){
											echo $this->Form->postLink(__(''),
											array('action' => 'delete', $mensaje['Mensaje']['id']), 
											array('class' => 'btn btn-sm btn-danger fa fa-trash'),
											__('¿%s, Seguro que quieres eliminar el mensaje ?', 
											$mensaje['User']['name'])); 
										}
									?>
								</td>		
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<p>
			<!-- < ?php
				echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>	 -->
		</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
		<?php echo $this->Js->writeBuffer(); ?>
	</div>
</div>
<?php endif; ?>