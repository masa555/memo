
<?php
$cakeDescription = 'シンプルメモ'
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
    <link rel="shortcut icon" href="/img/favicon.ico" />
    
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?=$this->Html->css('style.css')?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
      
    <!-- jquery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- bootstrap framework -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">
<nav class="navbar navbar-default">
	<div class="container">
		 <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			    <h3 class="top"><?= $this->Html->link(__('シンプルメモ帳'), ['controller' => 'articles', 'action' => 'index']) ?></h3>
		</div>
		
		<div class="collapse navbar-collapse" id="navbarEexample1">
			<ul class="nav navbar-nav navbar-right">
				<li><?= $this->Html->link(__('使い方'), ['controller' => 'about', 'action' => 'index']) ?></li>
				<!--fontawesame アイコン-->
                <li class="fasx"><i class="fas fa-user-circle fa-lg icon"></i>
                 <?= $this->Html->link(__('新規ユーザー登録(無料)'), ['controller' => 'users', 'action' => 'add'])?></li>
                <!--ログアウト-->
              	<?php if($this->request->getsession()->read('Auth.User.id')):?>
			    <li class="fasx2"><i class="fas fa-sign-out-alt fa-lg icon2"></i><a href="/users/logout">ログアウト</a></li>
          　 <?php endif;?> 
            　<!--退会-->
                <?php if($this->request->getsession()->read('Auth.User.id')):?> 
            		 <li class="fasx3"><i class="fas fa-door-open fa-lg icon3"></i><a href="/users/unsub">退会</a></li>
             		 <!--ここまで-->
                  　<?php endif;?>
			</ul>
		</div>
	</div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container">
     <?= $this->fetch('content') ?>
    </div>
    </div>
    <footer class="footer">
            <small>シンプルメモ@2018</small> 
    </footer>
    </div>
</body>
</html>

