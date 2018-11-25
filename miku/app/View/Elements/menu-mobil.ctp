<?php echo $this->Html->css('cab-base'); ?>
<div class="navbar-header">
    <button class="navbar-toggle barra-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <?php if(!isset($current_user)): ?>
        <div class="sesion visible-xs">
            <i class="fa fa-user fa-lg"></i>
            <a href="#" class="enlace-iniciar-sesion">Iniciar sesión</a>
        </div>
    <?php else: ?>
        <div class="visible-xs cab">
            <div class="sesion">
                <?php echo $this->Html->link($current_user['username'], 
                    array('controller'=>'users', 'action' => 'view', $current_user['id']),
                    array('class'=>'user-logueado')); ?>
                <div class="cuenta-producto navbar-right">
                    <i class="fa fa-cutlery"></i>
                    <span class="cant-selected">
                        <?php echo $this->Html->link("Mis platillos", 
                        array('controller'=>'item_previos', 'action' => 'view')); ?>                    
                    </span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>