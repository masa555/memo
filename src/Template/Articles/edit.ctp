 <br>
 <h1>メモ帳の編集</h1>
     <?= $this->Form->create($article);?>
    <?= $this->Form->control('user_id',array('type'=>'hidden',
        'class'=>'input-lg','label'=>'ユーザー名'
        ));?>
    <?= $this->Form->control('title',array('label'=>'タイトル',
        'class'=>'input-lg','label'=>'タイトル'
        ));?>
      <?= $this->Ck->input('body',array('label'=>'本文',
        'class'=>'input-lg','label'=>'本文'
        ));?>
        <div class="form-group">
        <?= $this->Form->button('更新',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>
    <?= $this->Form->end();?>