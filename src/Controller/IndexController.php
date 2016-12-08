<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class IndexController extends AppController {
  public function index() {
      $this->Post = TableRegistry::get('Posts');
      $posts_list = $this->Post->find()->all();
      $this->set('posts_list', $posts_list);
  }
}
?>
