
<!-- ページナビの生成 -->
<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href='#'>オンラインmemo</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link(__('新規ユーザー登録（無料）'), ['controller' => 'users', 'action' => 'add']) ?></li>
                 <li><?= $this->Html->link(__('パスワード変更'), ['controller' => 'users', 'action' => 'passet']) ?></li>
                 <!--退会-->
                	<li><?php if($this->request->getsession()->read('Auth.User.id')):
             	?> 
             		<a href="/users/unsub">ユーザー退会</a></li>
          　<?php endif;?>
          　<!--ログアウト-->
              	<li><?php if($this->request->getsession()->read('Auth.User.id')):
             	?>
			<a href="/users/logout">ログアウト</a></li>
          　<?php endif;?>
          
            </ul>
        </div>
</nav>
<?= $this->Flash->render() ?>
<div class="users form large-12 medium-12 columns content">   
<?= $this->Html->link('新規作成', ['action' => 'add']) ?>
<table>
    <tr>
        <th>タイトル</th>
        <th>作成日時</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('編集', ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postLink(
                '削除',
                ['action' => 'delete', $article->slug],
                ['confirm' => 'メモ帳を削除してよろしいですか?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>