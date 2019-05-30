<!--フォントのお大きさ-->
<div class="row">
        <div class="col-3">
            <button class="btn-s">小</button>
            <button class="btn-m">中</button>
            <button class="btn-l">大</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
    </div>
<h3>タイトル</h3>
<hr>
<div class="container">
 <div class="title">
<h3><?php echo $this->Markdown->parse($md); ?></h3>
    <h3>本文</h3>
    <hr size="100">
    <h2><?php echo $this->Markdown->parse($md2); ?></h2>  
 </div>
</div>
<?php echo $this->Html->css('view')?>
<?php echo $this->Html->script('index');?>