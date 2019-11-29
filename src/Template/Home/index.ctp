<h1>Gestion de Formation 2019</h1>
<div>
<p>Les utilisateurs du système doivent se connecter</p>
<?=$this->Html->link("Login", array('controller' => 'Users','action'=> 'login'), array( 'class' => 'button'))?></div>
<p>Entrer votre email pour recevoir votre plan de formation.</p>
<?= $this->Form->create(null, ['action'=> 'emailer']) ?>

<?php
echo $this->Form->control('email');

?>
<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

