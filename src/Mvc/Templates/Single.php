<?php
/** @var \TiloBaller\Mvc\Domain\Model\NewsModel $news */
?>

<?php if (isset($addResult) && $addResult === true): ?>
    <div class="alert alert-success" role="alert">News erfolgreich hinzugefügt.</div>
<?php endif ?>

<?php if (isset($updateResult) && $updateResult === true): ?>
    <div class="alert alert-success" role="alert">News erfolgreich aktualisiert.</div>
<?php endif ?>


<p class="toolbox pull-right">
    <a href="/?controller=news&action=update&id=<?= $news->getId() ?>" class="btn btn-default" title="Editieren">
        <span class="glyphicon glyphicon-pencil"></span>
    </a>
    <a href="/?controller=news&action=remove&id=<?= $news->getId() ?>" class="btn btn-default action-delete" title="Löschen">
        <span class="glyphicon glyphicon-trash"></span>
    </a>
</p>

<h1 class="h2">
    <?= $news->getTitle() ?><br>
</h1>

<p class="lead">von <?= $news->getAuthor() ?></p>

<p class="clearfix">
    <span class="glyphicon glyphicon-time"></span> Veröffentlicht am <?= $news->getDate('d.m.Y') ?><span>
</p>

<hr>

<p>
    <strong><?= $news->getAbstract() ?></strong>
</p>

<hr>

<p><?= nl2br($news->getBody()) ?></p>

<hr>

<p>
    <a href="/?controller=news" class="btn btn-default">&laquo; zurück</a>
</p>