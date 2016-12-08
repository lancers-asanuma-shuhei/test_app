<p>
  新規作成ページ
</p>

<div>
  <?= $this->Html->link('前のページへ', ['action'=>'index']); ?>
</div>
<?= $this->Form->create($post); ?>
<?= $this->Form->input('body', ['rows'=>'3']); ?>
<?= $this->Form->button('投稿'); ?>

<?= $this->Form->end(); ?>
