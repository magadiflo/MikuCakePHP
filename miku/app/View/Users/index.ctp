<?php
    $this->Paginator->options(array(
        'update' => '#contenedor-users',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer'=>false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer'=>false))
    ));
?>
<div class="container" id="contenedor-users">
	<div class="page-header">
		<h2><?php echo __('Usuarios'); ?></h2>
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
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('lastname'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th><?php echo $this->Paginator->sort('mobile'); ?></th>
						<th><?php echo $this->Paginator->sort('username'); ?></th>
						<th><?php echo $this->Paginator->sort('role'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr class="tam-fuente">
						<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['mobile']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__(''), 
									array('action' => 'view', $user['User']['id']), 
									array('class'=>'btn btn-sm btn-default fa fa-eye')); ?>
							<?php if($current_user['role'] == 'admin'):?>
								<?php if($user['User']['id'] != 1): ?>
									<?php echo $this->Form->postLink(__(''), 
									array('action' => 'delete', $user['User']['id']), 
									array('class'=>'btn btn-sm btn-danger fa fa-trash'),
									__('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
								<?php endif; ?>
							<?php endif; ?>
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