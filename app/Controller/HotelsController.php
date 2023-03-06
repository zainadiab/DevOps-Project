<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
use Cake\Http\Client;

class HotelsController extends AppController {

    public function edit($id, $owner_id){
        $this->autoRender = false; 
        $this->redirect('http://bookingproject/hotels/edit', $id , $owner_id);
    }
}