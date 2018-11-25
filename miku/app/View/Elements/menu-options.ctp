<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-home')).$this->Html->tag('span', ' Inicio'),
                array('controller'=>'platillos', 'action' => 'index'),
                array('escape'=>false)
            );?>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-cutlery"></i> 
                Platillos
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-list')).$this->Html->tag('span', ' Lista de platillos'),
                        array('controller'=>'platillos', 'action' => 'index'),
                        array('escape'=>false)
                    );?>
                </li>
                <?php if($current_user['role'] == 'admin'): ?>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-plus-circle')).$this->Html->tag('span', ' Nuevo platillo'),
                            array('controller'=>'platillos', 'action' => 'add'),
                            array('escape'=>false)
                        );?>
                    </li>
                <?php endif; ?>
                <li role="separator" class="divider"></li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-outdent')).$this->Html->tag('span', ' Lista de categorías'),
                        array('controller'=>'categorias', 'action' => 'index'),
                        array('escape'=>false)
                    );?>
                </li>
                <?php if($current_user['role'] == 'admin'): ?>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-plus-circle')).$this->Html->tag('span', ' Nueva categoría'),
                            array('controller'=>'categorias', 'action' => 'add'),
                            array('escape'=>false)
                        );?>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li><a href="lista-pedido.html"><i class="fa fa-pencil"></i> Pedidos</a></li>
        <li><a href="#"><i class="fa fa-users"></i> Clientes</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
        <li><a href="nosotros.html"><i class="fa fa-desktop"></i> Nosotros</a></li>
        <li><a href="contactanos.html"><i class="fa fa-wechat"></i> Contáctanos</a></li>
        <li><a href="#" id="logout"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
    </ul>
</div>