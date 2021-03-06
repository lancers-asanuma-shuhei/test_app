<?php

// /posts/index or /posts
//→ /(controller)/(action)/(options)

  namespace App\Controller;

  class CommentsController extends AppController
  {
    public function add()
    {
      $comment = $this->Comments->newEntity();
      if ($this->request->is('post')) {
        $comment = $this->Comments->patchEntity($comment, $this->request->data);
        if ($this->Comments->save($comment)) {
          $this->Flash->success('返信成功!');
          return $this->redirect(['controller'=>'Posts', 'action'=>'view', $comment->post_id]);
        } else {
          // error
          $this->Flash->error('返信失敗!');
          return $this->redirect(['controller'=>'Posts', 'action'=>'view', $comment->post_id]);
        }
      }
      $this->set(compact('comment'));
    }

    public function delete($id = null)
    {
      // $this->request->allowMethod(['post', 'delete']);
      // $post = $this->Posts->get($id);
      // if ($this->Posts->delete($post)) {
      //   $this->Flash->success('削除成功!');
      // } else {
      //   $this->Flash->error('削除失敗!');
      // }
      // return $this->redirect(['action'=>'index']);
    }
}
?>
