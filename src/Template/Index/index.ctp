<?php
foreach ($posts_list as $post) {
  print_r($post['Post']['id']."<br>");
  print_r($post['Post']['body']."<br>");
}
?>
