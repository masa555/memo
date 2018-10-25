  <div class="container">
     <div class="row">
          <div class="col-xs-3.col-xs-offset-2">
  <h3>ユーザー登録</h3>      
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
    <!--ユーザー画面-->
    <?= $this->Form->create($user) ?>
        <?php
            echo $this->Form->control('email',array('placeholder' => 'メールアドレス（認証用ID）',
            'class'=>'input-lg','label'=>'メールアドレス'
            ));
            echo $this->Form->control('password',array('placeholder' => 'パスワード',
            'class'=>'input-lg','label'=>'パスワード'
            ));
            echo$this->Form->label('password_check','パスワード（確認)');
            echo $this->Form->password('password_check',array('placeholder'=>'パスワード確認',
             'class'=>'input-lg'
            ));
            echo $this->Form->control('name',array('placeholder' => 'ユーザー名（表示用）',
              'class'=>'input-lg','label'=>'ユーザー名'
            ));
        ?>
        <div class="form-group">
        <?= $this->Form->button('登録',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>    
    <?= $this->Html->link(__('キャンセル'), ['controller' => 'users', 'action' => 'login']) ?>
    <?= $this->Form->end() ?>   
    </div>
    </div>
  </div>
  
    
    