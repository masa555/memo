<?php
/* @var $this \Cake\View\View */
$this->Html->css('BootstrapUI.signin', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="container">
<?php
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->start('tb_footer');
echo ' ';
$this->end();

$this->append('content', '</div>');
echo $this->fetch('content');
?>

<h1>シンプルなメモ帳とても簡単にできます！</h1>
<div class="container">
    <div class="row">
        <div class="col-xs-3.col-xs-offset-2">
              <!--container--bootstrap-->    
<?php echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
    )); ?> 
    <!--ここまで-->
        <?= $this->Form->create() ?>
        <?= $this->Form->control('メールアドレス',array('placeholder'=>'メールアドレス',
        'class'=>'input-lg'
        ));?>
        <?= $this->Form->control('パスワード',array('placeholder'=>'パスワード',
        'class'=>'input-lg'
        )); ?>
        <?= $this->Form->control('ログイン情報を保存', array('type' => 'checkbox'
        )); ?>
        <!--ログイン-->
        <div class="form-group">
        <?= $this->Form->button('ログイン',array(
        'div'=>'col col-md-9 col-md-offset-3',
        'class'=>' btn btn-info  btn-lg',
        )); ?>     
        <!--ここまで-->
        </div>
        <?= $this->Html->link(__('パスワードを忘れたらこちら'), ['controller' => 'users', 'action' => 'passet']) ?>
        <?= $this->Form->end() ?>            
    </div>   
        </div>
</div>
