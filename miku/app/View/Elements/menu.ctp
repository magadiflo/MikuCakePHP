<!-- INICIO - BARRA DE NAVEGACIÓN -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('Miku', 
                                      array('controller'=>'pages', 'action' => 'index'),
                                      array('class' => 'navbar-brand')); ?>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Platillos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('Lista platillos', array('controller'=>'platillos', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Nuevo platillo', array('controller'=>'platillos', 'action' => 'add')); ?></li>
                        <li role="separator" class="divider"></li>
                        <li><?php echo $this->Html->link('Lista categorías', array('controller'=>'categorias', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Nuevo categoría', array('controller'=>'categorias', 'action' => 'add')); ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('Lista usuarios', array('controller'=>'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Nuevo usuario', array('controller'=>'users', 'action' => 'add')); ?></li>
                    </ul>
                </li>

                <li>
                    <?php echo $this->Html->link('Órdenes', array('controller' => 'ordens', 'action'=>'index')); ?>
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