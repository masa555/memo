<?php
    //ページタイトル変更
    $this->assign('title', 'パスワード変更 - オンラインwebメモ帳');
?>
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
    <h3>パスワード変更</h3>
    <p><strong>入力されたメールアドレスに、再設定メールを送信します。<br>
    ユーザー登録されていない場合は送信出来ません。また、存在しないメールアドレスには正しく送信出来ませんので、ご了承下さい。</strong></p>
    <?= $this->Form->create() ?>
        <?= $this->Form->control('email',array('placeholder'=>'メールアドレス',
        'class'=>'input-lg','label'=>'メールアドレス(※半角英数字)'
        ));?>
        <div class="form-group">
        <?= $this->Form->button('送信',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?>   
    </div>
        <p><?= $this->Html->link('キャンセル',['controller'=>'users','action'=>'login'])?></p>
    <?= $this->Form->end() ?>
    </div>
  </div>
 </div>      
</div>
