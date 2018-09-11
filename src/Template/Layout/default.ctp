<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			    <h3><?= $this->Html->link(__('シンプルメモ'), ['controller' => 'articles', 'action' => 'index']) ?></h3>
		</div>
		
		<div class="collapse navbar-collapse" id="navbarEexample1">
			<ul class="nav navbar-nav navbar-right">
				<li><?= $this->Html->link(__('使い方'), ['controller' => 'tops', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('新規ユーザー登録（無料）'), ['controller' => 'users', 'action' => 'add']) ?></li>
                  <!--退会-->
                <?php if($this->request->getsession()->read('Auth.User.id')):?> 
             		 <li><a href="/users/unsub">ユーザー退会</a></li>
                  　<?php endif;?>
                  　
                <!--ログアウト-->
              	<?php if($this->request->getsession()->read('Auth.User.id')):?>
			    <li><a href="/users/logout">ログアウト</a></li>
          　 <?php endif;?>  　
			</ul>
		</div>
	</div>
</nav>

<div class="users form large-12 medium-12 columns content">
    <?= $this->Flash->render() ?>
    
    
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
         <div class="container-fluid text-center">
             <small>シンプルメモ@2018</small>
        </div>
    </footer>
</body>
</html>

