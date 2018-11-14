<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Categoria'); ?>
				<fieldset>
					<legend><?php echo __('Nueva Categoría'); ?></legend>
					<?php echo $this->Form->input('categoria', 
						array('class' => 'form-control', 'label'=>'Categoría')); ?>
				</fieldset>
			<p>
			<?php echo $this->Form->end(array('class'=>'btn btn-success', 'label'=>'Crear Categoría')); ?>
			</p>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions'); ?> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</div>
</div>