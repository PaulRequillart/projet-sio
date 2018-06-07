<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function isAuthorized($user) {

        if (in_array($this->request->action, ['view', 'edit', 'delete'])) {
          $id = (int) $this->request->getParams['pass.0'];
          
          if ($id == $user['id']) {
            return true;
          }
        }
    
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    

    public function indexEleve()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function indexProf()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Marks']
        ]);

        $this->set('user', $user);
    }

    public function marks()
    {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Marks']
        ]);
        $this->set('user', $user);
        $modules = TableRegistry::get('Modules');
        $this->set('modules', $modules);
    }

    public function moyenne(){
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Marks']
        ]);
        $this->set('user', $user);

        $modules = TableRegistry::get('Modules');
        $this->set('modules', $modules);

        $groups = TableRegistry::get('Groups');
        $group = $groups->get($user->group->id,[
            'contain' => ['Users', 'Modules']]);
        $this->set('group', $group);
    }

    public function profile(){
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Marks']
        ]);
        $this->set('user', $user);

        //partie editemail

        $userEmail = $this->Users->get($id, [
            'contain' => []
        ]);
        if (isset($this->request->data['btn1'])) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $userEmail = $this->Users->patchEntity($userEmail, $this->request->getData());
                if ($this->Users->save($userEmail)) {
                    $this->Flash->success(__('Adresse email enregistrée.'));

                    return $this->redirect(['controller'=>'Users','action' => 'profile']);
                }
                $this->Flash->error(__('Erreur, veuillez réessayer.'));
            }
        }
        $this->set(compact('userEmail'));

        //Partie editPassword

        $userPwd = $this->Users->get($id, [
            'contain' => []
        ]);
        if (isset($this->request->data['btn2'])) {
            if (!empty($this->request->data)) {
                $userPwd = $this->Users->patchEntity($user, [
                        'old_password'  => $this->request->data['old_password'],
                        'password'      => $this->request->data['password1'],
                        'password1'     => $this->request->data['password1'],
                        'password2'     => $this->request->data['password2']
                    ],
                    ['validate' => 'password']
                );
                if ($this->Users->save($userPwd)) {
                    $this->Flash->success('The password is successfully changed');
                    return $this->redirect(['controller'=>'Users','action' => 'profile']);
                } else {
                    $this->Flash->error('There was an error during the save!');
                }
            }
            $this->set(compact('userPwd'));
        }
    }

    public function editEmail(){
        $id = $this->Auth->user('id');

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Adresse email enregistrée.'));

                return $this->redirect(['controller'=>'Users','action' => 'profile']);
            }
            $this->Flash->error(__('Erreur, veuillez réessayer.'));
        }
        $this->set(compact('user'));

    }

    public function groupe()
    {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Marks']
        ]);
        $this->set('user', $user);
        $groups = TableRegistry::get('Groups');
        $group = $groups->get($user->group_id, [
            'contain' => ['Users']]);
        $this->set('group', $group);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
    }

    public function addProf()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200])
            ->where(['Groups.id =' => '9']);
        $this->set(compact('user', 'groups'));
    }

    public function addEleve()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200])
            ->where(['Groups.id <>' => '9', ' Groups.id <>' => '1']);
        $this->set(compact('user', 'groups'));
    }

    /**&&
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'Users','action' => 'add']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'forgotPassword', 'ResetPasswordToken']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users','action' => 'profile']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }



    /**
     * Allow a user to request a password reset.
     * @return
     */
    function forgotPassword() {
        if (!empty($this->data)) {
            $user = $this->User->findByUsername($this->data['User']['username']);
            if (empty($user)) {
                $this->Session->setflash('Sorry, the username entered was not found.');
                $this->redirect('/users/forgot_password');
            } else {
                $user = $this->__generatePasswordToken($user);
                if ($this->User->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
                    $this->Session->setflash('Password reset instructions have been sent to your email address.
						You have 24 hours to complete the request.');
                    $this->redirect('/users/login');
                }
            }
        }
    }
    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function resetPasswordToken($reset_password_token = null) {
        if (empty($this->data)) {
            $this->data = $this->User->findByResetPasswordToken($reset_password_token);
            if (!empty($this->data['User']['reset_password_token']) && !empty($this->data['User']['token_created_at']) &&
            $this->__validToken($this->data['User']['token_created_at'])) {
                $this->data['User']['id'] = null;
                $_SESSION['token'] = $reset_password_token;
            } else {
                $this->Session->setflash('The password reset request has either expired or is invalid.');
                $this->redirect('/users/login');
            }
        } else {
            if ($this->data['User']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setflash('The password reset request has either expired or is invalid.');
                $this->redirect('/users/login');
            }
            $user = $this->User->findByResetPasswordToken($this->data['User']['reset_password_token']);
            $this->User->id = $user['User']['id'];
            if ($this->User->save($this->data, array('validate' => 'only'))) {
                $this->data['User']['reset_password_token'] = $this->data['User']['token_created_at'] = null;
                if ($this->User->save($this->data) && $this->__sendPasswordChangedEmail($user['User']['id'])) {
                    unset($_SESSION['token']);
                    $this->Session->setflash('Your password was changed successfully. Please login to continue.');
                    $this->redirect('/users/login');
                }
            }
        }
    }
    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at']     = date('Y-m-d H:i:s');
        return $user;
    }
    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }
    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
            $this->Email->to 		= $User['User']['email'];
            $this->Email->subject 	= 'Password Reset Request - DO NOT REPLY';
            $this->Email->replyTo 	= 'do-not-reply@example.com';
            $this->Email->from 		= 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template 	= 'reset_password_request';
            $this->Email->sendAs 	= 'both';
            $this->set('User', $User);
            $this->Email->send();
            return true;
        }
        return false;
    }
    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
            $this->Email->to 		= $User['User']['email'];
            $this->Email->subject 	= 'Password Changed - DO NOT REPLY';
            $this->Email->replyTo 	= 'do-not-reply@example.com';
            $this->Email->from 		= 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template 	= 'password_reset_success';
            $this->Email->sendAs 	= 'both';
            $this->set('User', $User);
            $this->Email->send();
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->Flash->success('Vous êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
    }
}
