<div class="menu">
    <h3>Menu options</h3>
    <?php echo $this->fetch('menu'); ?>
</div>
<p><?php echo $this->Html->link('Controle de Usuários', array('action' => 'control')); ?></p>
<p><?php echo $this->Html->link('Adicionar Posts', array('controller' => 'Posts', 'action' => 'index')); ?></p>
<table>
    

</table>