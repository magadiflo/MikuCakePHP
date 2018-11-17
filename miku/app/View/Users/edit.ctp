<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User'); ?>
				<fieldset>
					<legend><?php echo __('Editar usuario'); ?></legend>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('lastname', array('class' => 'form-control', 'label' => 'Apellidos'));
					echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'E-mail'));
					echo $this->Form->input('mobile', array('class' => 'form-control', 'label' => 'Teléfono/celular'));
					echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuario'));
					echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña'));
					echo $this->Form->input('role', 
							array('class' => 'form-control', 
									'label' => 'Rol', 
									'type' => 'select', 
									'options' => array('admin' => 'Administrador', 
														'user' => 'Usuario'), 
													array('class' => 'form-control')));
				?>
				</fieldset>
			<p>
				<?php echo $this->Form->end(array('label' => 'Editar Usuario', 'class' =>'btn btn-success')); ?>
			</p>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Acciones'); ?> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link(__('List Item Previos'), array('controller' => 'item_previos', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Item Previo'), array('controller' => 'item_previos', 'action' => 'add')); ?> </li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Mensaje'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link(__('List Ordens'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Orden'), array('controller' => 'ordens', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</div>
</div>



