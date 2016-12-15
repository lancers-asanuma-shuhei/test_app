<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
  public function login()
  {
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
      'authenticate' => [
        'Form' => [
          'userModel' => 'Users',
          'fields' => [
            'username' => 'email',
            'password' => 'password'
          ]    // ログインID対象をemailカラムへ
        ]
      ],
      'authError' => 'Did you really think you are allowed to see that?',
      'loginAction' => [
        'controller' => 'Users',
        'action' => 'login',
      ],
      'storage'=>'Session'
    ]);

    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      debug($user);
      exit;
      if ($user) {
        $this->Auth->setUser($user);    // データをセットしてログイン
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Flash->error(
          __('メールアドレスまたはパスワードが違います'),
          'default',
          [],
          'auth'
        );
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
        $this->Flash->success("ユーザー登録成功！");
        return $this->redirect(['controller'=>'Users', 'action'=>'login']);
      } else {
        $this->Flash->error('ユーザー登録失敗!');
      }
    }
    $this->set(compact('user'));
  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }
}
?>
/
