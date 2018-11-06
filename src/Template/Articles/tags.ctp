 <h1>
    タグ
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

   <section>
<?php foreach ($articles as $article): ?>
    <article>
        <!-- リンクの作成に HtmlHelper を使用 -->
        <h1><?= $this->Html->link(
            $article->title,
            ['controller' => 'Articles', 'action' => 'view', $article->slug]
        ) ?></h1>
    </article>
<?php endforeach; ?>
</section>  
 