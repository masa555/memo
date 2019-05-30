    <p>※マークダウン形式に対応しています。</p> 
    <?php echo $this->Markdown->parse($md); ?>
    <?= $this->Form->create($article);?>
    <?= $this->Form->control('user_id',array('type'=>'hidden',
        'class'=>'input-lg','label'=>'ユーザー名'
        ));?>
    <?= $this->Form->control('title',array('label'=>'タイトル',
        'class'=>'input-lg','label'=>'タイトル',
        ));?>
   
       <?= $this->Ck->input('body',array('label'=>'本文',
        'class'=>'input-lg','label'=>'本文',
        ));?>
    <div class="form-group">
        <?= $this->Form->button('作成',
        array('div'=>'btn-group ',
       'class'=>'button ',
        )); ?> 
    </div>
    <?= $this->Form->end();?>
