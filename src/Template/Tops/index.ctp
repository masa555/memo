
<?php
echo $this->Html->css('top');
?>
<body>
    <ul class="list-group">
      <div class="container">
             <div class="row">
           <h1 class="title">シンプルメモ帳</h1>
           
           <h3 class="img-responsive"　><?php echo $this->Html->image('/webroot/img/images.png', ['alt' => 'memo'],
            ['escapeTitle' => false,]
            );?></3>
             <p class="subtitle">あなたの生活をもっとシンプルにもっと便利に</p>
             <br>
           <?php echo $this->Html->link(
           'ログインはこちらから→',
           array('controller' => 'Users', 'action' => 'login'),
           array('class' => 'btn btn-success btn-lg', 'role' => 'button')
          ); ?>
        </div>
        <br>
        <h1 class="concept"><a class="btn btn-success" data-toggle="collapse" href="#collapseExample">
    このメモ帳のコンセプトとは?</a></h1>
   <div class="collapse" id="collapseExample">
        <div class="well well-lg"><h3>シンプルで見やすいデザイン</h3><br>
        <h4>無駄のないシンプルなデザインに仕上げました。</h4>
        </div>
        <div class="well well-lg"><h3>マークダウン対応</h3><br>
        <h4>メモを記述したり、ドキュメント作成に、ブログ作成に便利なマークダウンに対応しています。</h4>
        </div>
        <div class="well well-lg"><h3>無料で利用可能</h3><br>
        <h4>インターネットさえあれば、誰もが無料で利用可能です。</h4>
        </div>
    </div>
    </div>
</ul>
</body>