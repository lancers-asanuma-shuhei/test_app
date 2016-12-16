<?php

// /posts/index or /posts
//→ /(controller)/(action)/(options)

namespace App\Controller;

class PostsController extends AppController
{
  public function index()
  {
    // debug($this->Session->read('Auth'));
    $posts = $this->Posts->find('all')
              ->order(['id' => 'desc']);
              // ->limit(1);
    // $this->set('posts', $posts);
    $this->set(compact('posts'));
    debug($this);
  }

  public function view($id=null)
  {
    // $post = $this->Posts->get($id);
    $post = $this->Posts->get($id, [
      'contain' => 'Comments'
    ]);
    $this->set(compact('post'));
  }

  public function add()
  {
    $post = $this->Posts->newEntity();
    if ($this->request->is('post')) {
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('投稿成功!');
        return $this->redirect(['action'=>'index']);
      } else {
        // error
        $this->Flash->error('投稿失敗!');
      }
    }
    $this->set(compact('post'));
  }

  public function edit($id = null)
  {
    $post = $this->Posts->get($id);
    if ($this->request->is(['post', 'patch', 'put'])) {
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('編集成功!');
        return $this->redirect(['action'=>'index']);
      } else {
        // error
        $this->Flash->error('編集失敗!');
      }
    }
    $this->set(compact('post'));
  }

  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $post = $this->Posts->get($id);
    if ($this->Posts->delete($post)) {
      $this->Flash->success('削除成功!');
    } else {
      $this->Flash->error('削除失敗!');
    }
    return $this->redirect(['action'=>'index']);
  }
}
?>
