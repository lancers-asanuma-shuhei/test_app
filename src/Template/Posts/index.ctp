<h1>asanuma 闇発散部屋</h1>

<div class="login" style="float: right;">
  <?= h($login_status); ?>
</div>

<div>
  <?= $this->Html->link('新規作成', ['action'=>'add']); ?>
</div>

<ul>
  <?php foreach ($posts as $post) : ?>
    <li>
      <!-- htmlヘルパー -->
      <!-- <?= $this->Html->link($post->body, ['controller'=>'Posts', 'action'=>'view', $post->id]); ?> -->
      <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?>
      <br>
      <?= $this->Html->link($post->body, ['action'=>'view', $post->id]); ?>
      <?= $this->Html->link('[編集する]', ['action'=>'edit', $post->id]); ?>
      <?=
        $this->Form->postLink(
          '[削除する]',
          ['action'=>'delete', $post->id],
          ['confirm'=>'削除しますか？', 'class'=>'fs12']
        );
      ?>
<hr>
      <!-- urlヘルパー -->
      <!-- <a href="<?= $this->Url->build(['action'=>'view', $post->id]); ?>">
        <?= h($post->body); ?>
      </a> -->

    </li>
  <?php endforeach; ?>

</ul>
