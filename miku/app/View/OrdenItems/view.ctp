<?php
    $this->Paginator->options(array(
        'update' => '#contenedor-ordens',
        'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer'=>false)),
        'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer'=>false))
	));
	
	//debug($total_orden);
	
?>
<div class="container">
    <div id="contenedor-ordens">
        <div class="page-header">
            <h2><strong>Cliente: </strong></h2>
            <hr>
                <div class="titulo-cliente">
                    <?php echo $ordenitems[0]['Orden']['User']['name'] . ' ' . 
                        $ordenitems[0]['Orden']['User']['lastname']; ?>
                </div>
            <hr>

            <h3 class="monto-cliente-total">
                <strong>Total: S/ 
                <?php echo $total_orden[0]['Orden']['total']; ?>
                </strong>
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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <?php if($current_user['role'] == 'admin'): ?>
                            <th><?php echo $this->Paginator->sort('Id orden'); ?></th>
                            <?php endif; ?>
                            <th><?php echo $this->Paginator->sort('Platillo'); ?></th>
                            <th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
                            <th><?php echo $this->Paginator->sort('Subtotal (S/)'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ordenitems as $ordenitem): ?>
                            <tr class="tam-fuente">
                                <?php if($current_user['role'] == 'admin'): ?>
                                <td><?php echo h($ordenitem['Orden']['id']); ?></td>
                                <?php endif; ?>
                                <td><?php echo h($ordenitem['Platillo']['nombre']); ?></td>
                                <td><?php echo h($ordenitem['OrdenItem']['cantidad']);?></td>
                                <td><?php echo h($ordenitem['OrdenItem']['subtotal']);?></td>
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