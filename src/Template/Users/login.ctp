<br>
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
         <?= $this->Form->control('autologin', array('type' => 'checkbox','label'=>'ログイン情報を保存'
        ));?>
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
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <br>
    <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fcakephp-masa55.c9users.io%2F&width=130&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId" width="130" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</div>
