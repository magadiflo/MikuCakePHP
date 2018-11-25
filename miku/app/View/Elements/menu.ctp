<!-- INICIO - BARRA DE NAVEGACIÓN -->
<nav class="navbar navbar-inverse navbar-fixed-buttom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('Miku', 
                                      array('controller'=>'platillos', 'action' => 'index'),
                                      array('class' => 'navbar-brand')); ?>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Platillos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('Lista platillos', array('controller'=>'platillos', 'action' => 'index')); ?></li>

                        <?php if($current_user['role'] == 'admin'): ?>
                            <li><?php echo $this->Html->link('Nuevo platillo', array('controller'=>'platillos', 'action' => 'add')); ?></li>
                        <?php endif; ?>

                        <li role="separator" class="divider"></li>

                        <li><?php echo $this->Html->link('Lista categorías', array('controller'=>'categorias', 'action' => 'index')); ?></li>

                        <?php if($current_user['role'] == 'admin'): ?>
                            <li><?php echo $this->Html->link('Nuevo categoría', array('controller'=>'categorias', 'action' => 'add')); ?></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li></span> <?php echo $this->Html->link('Ver', array('controller'=>'users', 'action' => 'index')); ?></li>
                        <?php if($current_user['role'] == 'admin'): ?>
                            <li><?php echo $this->Html->link('Nuevo usuario', array('controller'=>'users', 'action' => 'add')); ?></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link('Editar datos', array('controller'=>'users', 'action' => 'edit', $current_user['id'])); ?></li>   
                        <li><?php echo $this->Html->link('Editar cuenta', array('controller'=>'users', 'action' => 'editAccount', $current_user['id'])); ?></li>
                    </ul>
                </li>

                <li>
                    <?php echo $this->Html->link('Órdenes', array('controller' => 'ordens', 'action'=>'index')); ?>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mensajes <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('Lista mensajes', array('controller'=>'mensajes', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Nuevo mensaje', array('controller'=>'mensajes', 'action' => 'add')); ?></li>
                    </ul>
                </li>

                <?php echo $this->Html->link('Mis platillos', array('controller' => 'item_previos', 'action' => 'view'), array('class' => 'btn btn-success navbar-btn') ); ?>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>
                    </li>
                </ul>          
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
	<!-- FIN - BARRA DE NAVEGACIÓN -->