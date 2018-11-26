<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-platillos',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>
<div id="contenedor-platillos">
	<div class="progress oculto" id="procesando">
		<div class="progress-bar progress-bar-striped active" role="progressbar" 
			aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	    	<span class="sr-only">100% Complete</span>
	  	</div>
	</div>
	<div class="container">
		<main class="platos-menu" role="main">
			<div class="row">
				<div class="col-lg-12">
					<h2 id="entrada-especial">Platillos "Miku"</h2>
				</div>
				<!-- <div class="col-lg-12 page-header">
					<h2><?php echo __('Platillos "Miku"'); ?></h2>
				</div> -->

					<?php foreach($platillos as $platillo): ?>
						<div class='col-sm-6 col-md-6 col-lg-4'>
							<figure>
								<?php  
									echo $this->Html->link($this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . '/' . 'vga_' . $platillo['Platillo']['foto'],
									 array('alt'=>'imagen de catálogo', 'class'=>'img-responsive')),
									'/platillos/view/'. $platillo['Platillo']['id'], array('escape' => false, 'class'=>'img-thumbnail'));
								?>
								<span class="precio">
									S/ <?php echo $platillo['Platillo']['precio']; ?>
								</span>
								<figcaption>
									<?php echo $this->Html->link($platillo['Platillo']['nombre'], 
									array('action'=>'view', $platillo['Platillo']['id']), 
									array('class' => 'btn btn-default') ); ?>
								</figcaption>
								<?php echo $this->Html->link($platillo['Categoria']['categoria'], 
									array('controller'=>'categorias', 'action'=>'view', $platillo['Categoria']['id']), 
									array('class' => 'btn btn-warning') ); ?>
							</figure>
						</div>
					<?php endforeach; ?>
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
		</main>
	</div>
</div>