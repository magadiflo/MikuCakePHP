<?php
    $this->Paginator->options(array(
        'update' => '#contenedor-ordens',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer'=>false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer'=>false))
    ));
?>
<?php if(empty($ordens)): ?>
    <h2>No existen órdenes disponibles</h2>
<?php else: ?>

  	<div id="contenedor-ordens">
        <div class="page-header">
            <h2><?php echo __('Órdenes'); ?></h2>
        </div>
        <div class="col-md-12">
            <div class="progress oculto" id="procesando">
                <div class="progress-bar progress-bar-striped active" 
                    role="progressbar" aria-valuenow="100" aria-valuemin="0" 
                    aria-valuemax="100" style="width:100%">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>		
						<th><?php echo $this->Paginator->sort('id'); ?></th>		
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('total'); ?></th>
						<th><?php echo $this->Paginator->sort('estado'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ordens as $orden): ?>
						<tr>
							<td><?php echo h($orden['Orden']['id']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($orden['User']['name'], array('controller' => 'users', 'action' => 'view', $orden['User']['id'])); ?>
							</td>
							<td><?php echo h($orden['Orden']['total']); ?>&nbsp;</td>
							<td><?php echo h($orden['Orden']['estado']); ?>&nbsp;</td>
							<td><?php echo $this->Time->format('d-m-Y [h:i A]', $orden['Orden']['created']);?></td>
                            <td><?php echo $this->Time->format('d-m-Y [h:i A]', $orden['Orden']['modified']);?></td>
							<td class="actions">
                                <?php
                                    echo $this->Html->link('Ver pedidos', 
                                        array('controller'=>'orden_items', 'action'=>'view', $orden['Orden']['id']), 
                                            array('class'=>'btn btn-sm btn-info'));
                                ?>
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

<?php endif; ?>