<?php echo $this->Html->css('contactanos'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
							<?php echo $this->Form->create('Mensaje'); ?>
                <fieldset>
					<legend class="text-center leyenda">
						<?php echo __('Contáctate con nosotros'); ?>
					</legend>
                    <div class="form-group">
                        <span class="col-md-1  text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-12">
							<?php echo $this->Form->input('name', array('class'=>'form-control', 'value'=>$current_user['name'], 'disabled' => true, 'label'=>false)); ?>
                        </div>
                    </div>
		
                    <div class="form-group">
                        <span class="col-md-1 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-12">
							<?php echo $this->Form->input('email', array('class'=>'form-control', 'value'=>$current_user['email'], 'disabled' => true, 'label'=>false)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-12">
						<?php echo $this->Form->input('mobile', array('class'=>'form-control', 'value'=>$current_user['mobile'], 'disabled' => true, 'label'=>false)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                        <div class="col-md-12">
							<?php echo $this->Form->input('mensaje', array('label'=>false, 'type'=>'textarea', 'rows'=>'7' ,'class'=>'form-control', 'placeholder'=>'Ingrese la descripción de su mensaje aquí. Nosotros nos contactaremos con usted en la brevedad posible.')); ?>
                        </div>
                    </div>
					<div class="form-group">
						<div class="col-md-12 text-center">
							<p>
								<?php echo $this->Form->end(array('label'=>'Enviar', 'class'=> 'btn btn-success btn-lg')); ?>
							</p>
						</div>
					</div>
                </fieldset>
            </div>
        </div>
		<!-- /col-md-6 -->
    </div>
</div>
