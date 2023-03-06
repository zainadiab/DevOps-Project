<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
use Cake\Http\Client;

class UsersController extends AppController {

    public $components = array('Security');
    public $uses = array('User');
    
    public function index($owner_id = null){
        $pageTitle = "welcome";
        $this->set('pageTitle', $pageTitle);
        if(isset($this->request->query['owner_id'])){
            $owner_id = $this->request->query['owner_id'];
        }
        $http = new HttpSocket();
        $response = $http->get('http://bookingproject/hotels/view', array(
            'owner_id' => $owner_id,
        ));
       
        $hotels = json_decode($response, true);
        $this->set('hotels', $hotels);
        $this->set('owner_id', $owner_id);
    }

    public function login(){

        if($this->request->is('post'))
		{
			if (empty($this->request->data['User']['username']) || empty($this->request->data['User']['password']))
			{
				$this->Session->setFlash(__('Username and password fields cannot be empty'), 'default', array());
				return false;
			}
           $login = $this->User->find('first', array(
				'conditions' => array(
					'username' => $this->request->data['User']['username'],
					'password' => Security::hash($this->request->data['User']['password'], 'sha256')),
					'recursive' => -1));
            if($login){
                $this->Session->write('User.id', $login['User']['id']);
                return $this->redirect(['action' => 'index', $login['User']['id']]);

            }else {
                $this->Flash->error(__('Username or password is incorrect. Please try again.'));
            }  

        }

    }

    public function register(){
        if ($this->request->is('post')) {
            $user = [];
            $user['username'] = $this->request->data['User']['username'];
            $user['email'] = $this->request->data['User']['email'];
            $user['password'] = $this->request->data['User']['password'];
            $user['name'] = $this->request->data['User']['name'];
            $user['password'] = Security::hash($user['password'], 'sha256');
            $this->loadModel('User');
            if ($this->User->save($user)) {
                $this->Flash->success(__('You have successfully registered.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('There was an error registering your account. Please try again.'));
            }
        }
        
        $this->set('title', 'Register');
    }

}    