
<h1>メモ帳の編集</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title',['label' => 'タイトル']);
    echo $this->Form->control('body', ['label' => '本文']);
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('更新'));
    echo $this->Form->end();
?>