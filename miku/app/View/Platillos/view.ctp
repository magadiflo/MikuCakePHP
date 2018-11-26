<?php echo $this->Html->script(array('addtocart.js') ,array('inline'=> false)); ?>
<div class="container">
	<main class="lista-pedido" role="main">
		<section>
			<h1><?php echo $platillo['Platillo']['nombre']; ?></h1>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<?php  
							echo $this->Html->link($this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . '/' . 'vga_' . $platillo['Platillo']['foto'],
							 array('alt'=>'imagen de catálogo', 'class'=>'img-responsive')),
							'/platillos/view/'. $platillo['Platillo']['id'], array('escape' => false, 'class'=>'img-thumbnail platillo-hover'));
						?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="row">
							<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
								<?php echo $this->Form->button('', 
										array('class'=>'fa fa-plus btn btn-primary btn-lg addtocart', 'id'=>$platillo['Platillo']['id'])); ?>
							</div>
							<div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 precio-platillo">
								<p>
								<span class="fa fa-tag"></span> <?php echo $platillo['Platillo']['precio']; ?>
								</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 descripcion-platillo">
								<?php echo $platillo['Platillo']['descripcion']; ?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 estado-platillo">
								<?php echo ($platillo['Platillo']['estado'] == 1) ? 'Habilitado' : 'Deshabilitado'; ?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p>
									<span class="fa fa-calendar"></span> <strong>Creado: </strong>
									<?php echo $platillo['Platillo']['created']; ?>
								</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p>
									<span class="fa fa-calendar-check-o"></span> <strong>Modificado: </strong>
									<?php echo $platillo['Platillo']['modified']; ?>
								</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<span><strong>Categoría: </strong></span> <br>
								<p class="categoria-platillo">
									<?php echo $this->Html->link($platillo['Categoria']['categoria'],
									array('controller'=>'categorias', 'action'=>'view', 
											$platillo['Categoria']['id']));?>
								</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<?php echo __('Acciones'); ?> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><?php echo $this->Html->link(__('Editar platillo'), array('action' => 'edit', $platillo['Platillo']['id'])); ?> </li>
										<li><?php echo $this->Form->postLink(__('Eliminar platillo'), array('action' => 'delete', $platillo['Platillo']['id']), array(), __('¿Seguro que desea eliminar el platillo [%s]?', $platillo['Platillo']['nombre'])); ?> </li>
										<li><?php echo $this->Html->link(__('Listar platillo'), array('action' => 'index')); ?> </li>
										<li><?php echo $this->Html->link(__('Nuevo platillo'), array('action' => 'add')); ?> </li>
										<li class="divider"></li>
										<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row fila-final">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php echo $this->Html->link(
                                $this->Html->tag('i', '', array('class' => 'fa fa-arrow-circle-left')).$this->Html->tag('span', ' Ver mis platillos'),
                                array('controller'=>'item_previos', 'action' => 'view'),
                                array('escape'=>false)
                            );?>
                    </div>
                </div>
			</article>
		</section>
	</main>
</div>