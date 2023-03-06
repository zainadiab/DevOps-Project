<h2>Login</h2>

<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
    'legend' => __(''),
    'username'=>array('label'=>'', 'placeholder'=>__('Login Name'), 'class'=>'input-lg form-control', 'maxlength' => '100' ,'tabindex' => '1'),
    'password'=>array('label'=>'', 'placeholder'=>__('Password'), 'class'=>'input-lg form-control', 'maxlength' => '40','tabindex' => '2'),
  ));
echo $this->Form->submit('Login', ['name' => 'login']);
echo $this->Form->end();