
<h2><?= $this->Html->link('<i class="fas fa-plus fa-lg">追加</i>',['action' => 'add'],array('escape'=>false)) ?></h2>
<table class="table">
<thead>    
    <tr>
        <th>タイトル</th>
        <th>作成日時</th>
    </tr>
</thead>
    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <h4><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></h4>
        </td>
        <td>
            <?= $article->created->format('Y-m-d')  ?>
        </td>
        <td>
            <h4 class="seticon"><?= $this->Html->link('<i class="fas fa-cog fa-lg" ></i>', ['action' => 'edit', $article->slug], array('escape' => false)) ?></h4>
            <h4><?=$this->form->postLink('<i class="fas fa-trash-alt fa-lg"></i>',['action' => 'delete', $article->slug],array('escape'=>false))?></h4>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
 

