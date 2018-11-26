<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-left menu-font">
        <li>
            <?php echo $this->Html->link(
                $this->Html->tag('i', '', array('class' => 'fa fa-home')).$this->Html->tag('span', ' Inicio'),
                array('controller'=>'platillos', 'action' => 'index'),
                array('escape'=>false)
            );?>
        </li>
        <?php if(isset($current_user)): ?>
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
        <?php endif; ?>
        <?php if(isset($current_user)): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-laptop"></i> 
                    Transacción
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-cart-plus')).$this->Html->tag('span', ' Mis platillos'),
                            array('controller' => 'item_previos', 'action' => 'view'),
                            array('escape'=>false)
                        );?>
                    </li>
                    <li>
                    <?php if($current_user['role'] == 'admin'){
                        $titulo = " Órdenes recibidas";
                    }else{
                        $titulo = " Mis órdenes";
                    }?>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-truck')).$this->Html->tag('span', $titulo),
                            array('controller' => 'ordens', 'action'=>'index'),
                            array('escape'=>false)
                        );?>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
    
    <ul class="nav navbar-nav navbar-right menu-font">
        <?php if(isset($current_user)): ?>
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'fa fa-desktop')).$this->Html->tag('span', ' Autor'),
                    array('controller'=>'users', 'action' => 'autor'),
                    array('escape'=>false)
                );?>
            </li>
        <?php endif; ?>
       
        <?php if(isset($current_user)): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i> 
                    Mensajes
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-comments')).$this->Html->tag('span', ' Listar mensajes'),
                            array('controller'=>'mensajes', 'action' => 'index'),
                            array('escape'=>false)
                        );?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-commenting')).$this->Html->tag('span', ' Nuevo mensaje'),
                            array('controller'=>'mensajes', 'action' => 'add'),
                            array('escape'=>false)
                        );?>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(isset($current_user)): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> 
                    Cuenta
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-eye')).$this->Html->tag('span', ' Ver'),
                            array('controller'=>'users', 'action' => 'index'),
                            array('escape'=>false)
                        );?>
                    </li>
                    <?php if($current_user['role'] == 'admin'): ?>
                        <li>
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', '', array('class' => 'fa  fa-user-plus')).$this->Html->tag('span', ' Nuevo usuario [admin]'),
                                array('controller'=>'users', 'action' => 'add'),
                                array('escape'=>false)
                            );?>
                        </li>
                    <?php endif; ?>
                    <li role="separator" class="divider"></li>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa  fa-pencil-square')).$this->Html->tag('span', ' Editar datos'),
                            array('controller'=>'users', 'action' => 'edit', $current_user['id']),
                            array('escape'=>false)
                        );?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'fa fa-edit')).$this->Html->tag('span', ' Editar cuenta'),
                            array('controller'=>'users', 'action' => 'editAccount', $current_user['id']),
                            array('escape'=>false)
                        );?>
                    </li>
                </ul>
            </li>
        <?php endif; ?>



        <?php if(isset($current_user)): ?>
            <li>
                <?php echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-sign-out fa-lg')).$this->Html->tag('span', ' Salir'),
                        array('controller' => 'users', 'action' => 'logout'),
                        array('escape'=>false)
                );?>
            </li>
        <?php endif; ?>
    </ul>
</div>