<?php
    $this->Paginator->options(array(
        'update' => '#contenedor-ordens',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer'=>false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer'=>false))
	));
	
	//debug($total_orden);
	
?>
<div id="contenedor-ordens">
	<div class="page-header">
		<h2><strong>Cliente: </strong>
			<?php echo $ordenitems[0]['Orden']['User']['name'] . ' ' . 
			$ordenitems[0]['Orden']['User']['lastname']; ?>
		</h2>
		<h3>
			Total: S/ 
			<?php echo $total_orden[0]['Orden']['total']; ?>
		</h3>
	</div>
	<div class="col-md-12">
		<div class="progress oculto" id="procesando">
            <div class="progress-bar progress-bar-striped active" 
                role="progressbar" aria-valuenow="100" aria-valuemin="0" 
                 aria-valuemax="100" style="width:100%">
                <span class="sr-only">100% Complete</span>
            </div>
        </div>
		<table class="table table-striped">
            <thead>
                <tr>
					<th><?php echo $this->Paginator->sort('Id orden'); ?></th>
                    <th><?php echo $this->Paginator->sort('Platillo'); ?></th>
                    <th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
                    <th><?php echo $this->Paginator->sort('Subtotal (S/)'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ordenitems as $ordenitem): ?>
                    <tr>
						<td><?php echo h($ordenitem['Orden']['id']); ?></td>
                        <td><?php echo h($ordenitem['Platillo']['nombre']); ?></td>
                        <td><?php echo h($ordenitem['OrdenItem']['cantidad']);?></td>
                        <td><?php echo h($ordenitem['OrdenItem']['subtotal']);?></td>
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
