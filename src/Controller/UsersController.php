<?php

  namespace App\Controller;

  class UsersController extends AppController
  {
    public function login()
    {
      if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
          $this->Auth->setUser($user);    // データをセットしてログイン
          return $this->redirect($this->Auth->redirectUrl());
        } else {
          $this->Flash->error(
            __('Username or password is incorrect'),
            'default',
            [],
            'auth'
          );
        }
      }
    }
    public function logout()
    {
      return $this->redirect($this->Auth->logout());
    }
  }
?>
