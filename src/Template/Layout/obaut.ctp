
<?php
$cakeDescription = 'シンプルメモ2'
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?=$this->Html->css('style.css')?>
    <?=$this->Html->css('obaut.css')?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
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
				<li><?= $this->Html->link(__('使い方'), ['controller' => 'obaut', 'action' => 'index']) ?></li>
				<!--fontawesame アイコン-->
                <li class="fasx"><i class="fas fa-user-circle fa-lg icon"></i>
                 <?= $this->Html->link(__('新規ユーザー登録(無料)'), ['controller' => 'users', 'action' => 'add'])?></li>
               
                <!--ログアウト-->
              	<?php if($this->request->getsession()->read('Auth.User.id')):?>
			    <li class="fasx2"><i class="fas fa-sign-out-alt fa-lg icon2"></i><a href="/users/logout">ログアウト</a></li>
          　 <?php endif;?> 
            　<!--退会-->
                <?php if($this->request->getsession()->read('Auth.User.id')):?> 
             		 <li class="fasx3"><i class="fas fa-door-open fa-lg icon3"></i><a href="/users/unsub">ユーザー退会</a></li>
             		 <!--ここまで-->
                  　<?php endif;?>
			</ul>
		</div>
	</div>
</nav>
    　　<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

    <footer class="footer">
            <small>シンプルメモ@2018 about</small> 
    </footer>
    </div>
</body>
</html>

