<p>
  詳細ページページ
</p>

<div>
  <?= $this->Html->link('前のページへ', ['action'=>'index']); ?>
</div>

<h1>
  <?= nl2br(h($post->body)); ?>
</h1>


<!-- 返信表示ゾーン -->
 <?php if (count($post->comments)) : ?>
<h3>返信一覧 <span>(<?= count($post->comments); ?>)</span> </h3>
<ul>
  <?php foreach ($post->comments as $comment) : ?>
  <li>
    <?= h($comment->body); ?>
  </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<hr>

<!-- 返信フォームゾーン -->
<h4>返信する↓</h4>
<?= $this->Form->create(null, [
  'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('body'); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->button('返信する'); ?>
<?= $this->Form->end(); ?>
