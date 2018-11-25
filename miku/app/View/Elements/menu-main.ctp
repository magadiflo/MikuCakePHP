<?php echo $this->Html->css('cab-base'); ?>
<div class="container">
  <div class="visible-xs">
    <h1 class="titulo-principal">Miku</h1>
  </div>
  <div class="hidden-xs cab">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2">
        <a href="" target="_black">
          <i class="fa fa-facebook red-social"></i>
        </a>
        <a href="" target="_black">
          <i class="fa fa-youtube red-social"></i>
        </a>
        <a href="" target="_black">
          <i class="fa fa-twitter red-social"></i>
        </a>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <figure class="cuadro-logo">
          <?php echo $this->Html->image('logo/logo-principal.png', array('width' => '150')); ?>
        </figure>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="sesion">
          <?php if(!isset($current_user)): ?>
            <div>
              <i class="fa fa-user fa-lg"></i>
              <a href="#" class="enlace-iniciar-sesion">Iniciar sesión</a>
            </div>
          <?php else: ?>
            <div class="user-logueado-vista">
              <?php echo $this->Html->link($current_user['username'], 
                array('controller'=>'users', 'action' => 'view', $current_user['id']),
                array('class'=>'user-logueado')); ?>
              <div class="cuenta-producto">
                  <i class="fa fa-cutlery"></i>
                  <span class="cant-selected">
                  <?php echo $this->Html->link("Mis platillos", 
                    array('controller'=>'item_previos', 'action' => 'view')); ?>                    
                  </span>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>