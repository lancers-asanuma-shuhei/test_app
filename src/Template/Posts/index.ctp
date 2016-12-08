<h1>asanuma Twitter</h1>

<div>
  <?= $this->Html->link('新規作成', ['action'=>'add']); ?>
</div>

<ul>
  <?php foreach ($posts as $post) : ?>
    <li>
      <!-- htmlヘルパー -->
      <!-- <?= $this->Html->link($post->body, ['controller'=>'Posts', 'action'=>'view', $post->id]); ?> -->
      <?= $this->Html->link($post->body, ['action'=>'view', $post->id]); ?>
      <?= $this->Html->link('[編集する]', ['action'=>'edit', $post->id]); ?>
      <?=
        $this->Form->postLink(
          '[削除する]',
          ['action'=>'delete', $post->id],
          ['confirm'=>'削除しますか？', 'class'=>'fs12']
        );
      ?>

      <!-- urlヘルパー -->
      <!-- <a href="<?= $this->Url->build(['action'=>'view', $post->id]); ?>">
        <?= h($post->body); ?>
      </a> -->

    </li>
  <?php endforeach; ?>
</ul>
