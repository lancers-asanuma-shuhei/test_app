<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
  public function login()
  {
    if ($this->request->is('post')) {
      // $hasher = new DefaultPasswordHasher();
      // $this->Auth->config('authenticate', ['Form']);
      $this->Auth->config('authenticate', [
        'Basic' => ['userModel' => 'Users'],
        'Form' => ['userModel' => 'Users']
      ]);
      // $password = $hasher->hash('password');
      $user = $this->Auth->identify();
      // $user = $this->request->data;
      // debug($password);
      // exit;
      // $bool = $hasher->check($this->request->data['password'], $this->User->password);
      // debug($bool);
      if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Flash->error('メールアドレスまたはパスワードが違います');
      }
    }

  }

  // public function initialize()
  // {
  //   parent::initialize();
  //   $this->loadComponent('RequestHandler');
  //   $this->loadComponent('Flash');
  //   $this->loadComponent('Auth', [
  //     'authenticate' => [
  //       'Form' => [
  //         'userModel' => 'Users',
  //         'fields' => [
  //           'username' => 'email',
  //           'password' => 'password'
  //         ]    // ログインID対象をemailカラムへ
  //       ]
  //     ],
  //     'authError' => 'Did you really think you are allowed to see that?',
  //     'loginAction' => [
  //       'controller' => 'Users',
  //       'action' => 'login',
  //     ],
  //     'storage'=>'Session'
  //   ]);
  // }

  public function add() {
    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      $hasher = new DefaultPasswordHasher();
      $password = $hasher->hash('password');
      $this->request->data['password'] = $password;
      $user = $this->Users->patchEntity($user, $this->request->data);
      if ($this->Users->save($user)) {
        $this->Flash->success('ユーザー登録成功！');
        return $this->redirect(['controller'=>'Users', 'action'=>'login']);
      } else {
        $this->Flash->error('ユーザー登録失敗!');
      }
    }
    $this->set(compact('user'));
  }

  public function logout() {
    $this->Session->delete("Auth");
    return $this->redirect($this->Auth->logout());
  }
}
?>
/
