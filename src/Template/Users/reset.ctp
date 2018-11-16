<?php
    //ページタイトル変更
    $this->assign('title', 'パスワード変更 - オンラインwebメモ帳');
?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
    <?php echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-8',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
    )); ?> 
<?php $this->assign('title', 'パスワード再設定'); ?>
<?php $this->assign('title', 'パスワード再設定'); ?>
<div class="passet">
    <?php echo $this->Form->create($user) ?>
    
      <h3>パスワード再設定</h3>
    <?php
        echo $this->Form->control('password',['label'=>'パスワード','required' => true, 'autofocus' => true]); ?>
        <p class="helper">パスワードは8-16 文字で、小文字、大文字、数字が少なくとも１文字ずつ、含まれている必要があります。</p>
    <?php 
        echo $this->Form->control('confirm_password', ['label'=>'パスワード確認','type' => 'password', 'required' => true]);
    ?>
      <p class="helper">もう一度入力してください。</p>
     <div class="form-group">
        <?= $this->Form->button('送信',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?>   
    </div>
 </div>
</div>
</div>

