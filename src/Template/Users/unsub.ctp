   <h3>ユーザー退会についての注意事項</h3>
   <br>
   <br>
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
    <p><strong>登録されたユーザー情報は全て削除致します。</strong></p>
    <br>
    <?= $this->Form->create() ?>
        <p>本当に退会しますか？</p>
        <br>
        <br>
         <div class="form-group">
        <?= $this->Form->button('退会',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>
        <p><?= $this->Html->link(__('キャンセル'),['controller'=>'articles','action'=>'index']) ?></p>
    <?= $this->Form->end() ?>
       </div>
     </div>
    </div>   <h3>ユーザー退会についての注意事項</h3>
   <br>
   <br>
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
    <p><strong>登録されたユーザー情報は全て削除致します。</strong></p>
    <br>
    <?= $this->Form->create() ?>
        <p>本当に退会しますか？</p>
        <br>
        <br>
         <div class="form-group">
        <?= $this->Form->button('退会',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>
        <p><?= $this->Html->link(__('キャンセル'),['controller'=>'articles','action'=>'index']) ?></p>
    <?= $this->Form->end() ?>
       </div>
     </div>
    </div>