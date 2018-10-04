<div class="container">
    <?= $this->Form->create($article);?>
    <?= $this->Form->control('user_id',array('type'=>'hidden','value'=>1,
        'class'=>'input-lg','label'=>'ユーザー名'
        ));?>
    <?= $this->Form->control('title',array('label'=>'タイトル',
        'class'=>'input-lg','label'=>'タイトル'
        ));?>
   
      <?= $this->Form->control('body',array('label'=>'本文',
        'class'=>'input-lg','label'=>'本文'
        ));?>
    <div class="form-group">
        <?= $this->Form->button('作成',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>
    <?= $this->Form->end();?>
    </div>