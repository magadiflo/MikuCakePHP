<div class="container">
	<div class="row">
		<div class="col-md-">
			<?php echo $this->Form->create('Platillo', array('type'=>'file', 'novalidate' => 'novalidate')); ?>
				<fieldset>
					<legend><?php echo __('Nuevo Platillo'); ?></legend>
					<?php
						echo $this->Form->input('categoria_id', array('class'=>'form-control', 'label'=>'Categoría'));
						echo $this->Form->input('nombre', array('class'=>'form-control', 'label'=>'Nombre'));
						echo $this->Form->input('descripcion', array('class'=>'form-control', 'label'=>'Descripción'));
						echo $this->Form->input('precio' , array('class'=>'form-control', 'label'=>'Precio'));
						echo $this->Form->input('foto' , array('type'=>'file', 'label'=>'Foto', 
																'id'=>'foto', 'class'=>'file', 
																'data-show-upload' => 'false', 
																'data-show-caption' => 'true'));
						echo $this->Form->input('foto_dir', array('type'=>'hidden'));
						echo $this->Form->input('estado', array('class'=>'form-control', 'value'=>1, 'type'=>'hidden'));
					?>
				</fieldset>
			<p><?php echo $this->Form->end(array('label'=>'Crear platillo', 'class'=>'btn btn-success')); ?></p>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    	<?php echo __('Acciones'); ?> <span class="caret"></span>
			  	</button>
			  	<ul class="dropdown-menu" role="menu">
					<li><?php echo $this->Html->link(__('Lista de platillos'), array('action' => 'index')); ?></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link(__('Lista de categorías'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Nueva categoría'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
			  	</ul>
			</div>
		</div>
	</div>
</div>
