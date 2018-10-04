
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
        <?= $this->Form->control('email',array('placeholder'=>'メールアドレス',
        'class'=>'input-lg','label'=>'メールアドレス'
        ));?>
        <?= $this->Form->control('password',array('placeholder'=>'パスワード',
        'class'=>'input-lg','label'=>'パスワード'
        )); ?>
        <?= $this->Form->control('ログイン情報を保存', array('type' => 'checkbox'
        )); ?>
        <!--ログイン-->
        <div class="form-group">
        <?= $this->Form->button('ログイン',
        array('div'=>'btn-group ',
       'class'=>'button',
        )); ?>  
        <!--ここまで-->
        </div>
        <?= $this->Html->link(__('パスワードを忘れたらこちら'), ['controller' => 'users', 'action' => 'passet']) ?>
        <?= $this->Form->end() ?>            
    </div>   
        </div>
</div>
