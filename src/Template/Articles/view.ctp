<h3>タイトル</h3>
<div class="container">
 <div class="title">  
<h2><?= h($article->title),$this->Markdown->parse($md);?></h2>
<hr size="100">
<h3>本文</h3>
<h4><?= h($article->body),$this->Markdown->parse($md);?></h4>
</div>
</div>
