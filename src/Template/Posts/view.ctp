<p>
  詳細ページページ
</p>

<div>
  <?= $this->Html->link('前のページへ', ['action'=>'index']); ?>
</div>

<h1>
  <?= nl2br(h($post->body)); ?>
</h1>

 <?php if (count($post->comments)) : ?>
<h2>返信一覧 <span>(<?= count($post->comments); ?>)</span> </h2>
<ul>
  <?php foreach ($post->comments as $comment) : ?>
  <li>
    <?= h($comment->body); ?>
  </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<hr>
<hr>
<hr>

<h4>返信する↓</h4>
<?= $this->Form->create(null, [
  'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('コメント'); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->button('返信'); ?>

<?= $this->Form->end(); ?>
