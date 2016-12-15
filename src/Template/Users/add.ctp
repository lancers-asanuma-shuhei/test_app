<?= $this->Form->create(null, [
  'url' => ['controller'=>'Users', 'action'=>'add']
]); ?>
<?= $this->Form->input('username'); ?>
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->button('登録する'); ?>
<?= $this->Form->end(); ?>
