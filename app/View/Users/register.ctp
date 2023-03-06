<h2>Register</h2>

<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
    'legend' => __(''),
    'name'=>array('label'=>'', 'placeholder'=>__('Full Name'), 'class'=>'input-lg form-control', 'maxlength' => '40','tabindex' => '2'),
    'email'=>array('label'=>'', 'placeholder'=>__('Email'), 'class'=>'input-lg form-control', 'maxlength' => '40','tabindex' => '2'),
    'username'=>array('label'=>'', 'placeholder'=>__('Username'), 'class'=>'input-lg form-control', 'maxlength' => '100' ,'tabindex' => '1'),
    'password'=>array('label'=>'', 'placeholder'=>__('Password'), 'class'=>'input-lg form-control', 'maxlength' => '40','tabindex' => '2'),
  ));
  echo $this->Form->submit(__('Register')) ?>
<?= $this->Form->end() ?>