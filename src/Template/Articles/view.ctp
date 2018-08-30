<div class="users view large-12 medium-12 columns content">
<h1><?= h($article->title) ?></h1>
<hr size="50">
<p><?= h($article->body) ?></p>
<p><small>作成日時: <?= $article->created->format(DATE_RFC850) ?></small></p>
