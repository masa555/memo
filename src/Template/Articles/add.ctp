
<?php
    echo $this->Form->create($article);
    // 今はユーザーを直接記述
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title',['label' => 'タイトル']);
    echo $this->Form->control('body', ['label' => '本文']);
   echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('メモ帳を追加'));
    echo $this->Form->end();
?>