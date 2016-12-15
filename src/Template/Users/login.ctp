<?= $this->Form->create(); ?>

 <fieldset>
 <legend><?= __('login') ?></legend>
 <?php
    echo $this->Form->input('email');
    echo $this->Form->input('password');
 ?>
 </fieldset>
 <?= $this->Form->button(__('Submit')) ?>
 <?= $this->Form->end() ?>
