<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Routing\Router;

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
        $this->Auth->allow(['logout', 'password', 'reset']);
    }

    public function login()
    {
        if($this->Auth->user()) {
            $this->Flash->error(__('You are already logged.'));
            return $this->redirect(['controller' => 'Users','action' => 'profile']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users','action' => 'profile']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->Flash->success('Vous êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    public function password()
    {
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + HOUR;
                 if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])){
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('univinfo.sio@gmail.com');
        $email->to($user->email, $user->full_name);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    // Clear passkey and timeout
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }

}
