<p>
  編集ページ
</p>

<div>
  <?= $this->Html->link('前のページへ', ['action'=>'index']); ?>
</div>
<?= $this->Form->create($post); ?>
<?= $this->Form->input('body', ['rows'=>'3']); ?>
<?= $this->Form->button('編集する'); ?>

<?= $this->Form->end(); ?>
