<?php
/** @var array $entries */
/** @var \TiloBaller\Mvc\Domain\Model\NewsModel $news */
?>

<?php if (isset($removeResult) && $removeResult === true): ?>
    <div class="alert alert-success" role="alert">Gewählte News wurde gelöscht.</div>
<?php elseif (isset($removeResult) && $removeResult === false): ?>
    <div class="alert alert-danger" role="alert">Gewählte News konnte nicht gelöscht werden.</div>
<?php endif ?>

<?php if (isset($newsToUpdateNotFound) && $newsToUpdateNotFound === true): ?>
    <div class="alert alert-warning" role="alert">Gewählte News wurde nicht gefunden und kann daher nicht editiert werden.</div>
<?php endif ?>


<h1>Alle News</h1>

<hr>

<?php foreach ($entries as $news): ?>

    <p class="toolbox pull-right">
        <a href="/?controller=news&action=update&id=<?= $news->getId() ?>" class="btn btn-default btn-xs" title="Editieren">
            <span class="glyphicon glyphicon-pencil"></span>
        </a>
        <a href="/?controller=news&action=remove&id=<?= $news->getId() ?>" class="btn btn-default btn-xs action-delete" title="Löschen">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </p>

    <h2 class="h3">
        <a href="/?controller=news&action=single&id=<?= $news->getId() ?>" title="zeige News: <?= $news->getTitle() ?>">
            <?= $news->getTitle() ?>
        </a>
    </h2>

    <p class="clearfix">
        <span class="glyphicon glyphicon-time"></span> <?= $news->getDate('d.m.Y') ?><span> | <?= $news->getAuthor() ?>
    </p>


    <div class="clearfix border-bottom">
        <p class="pull-left margin-right-100">
            <?= $news->getAbstract() ?>
        </p>
        <span class="hidden-xs pull-right">
            <a href="/?controller=news&action=single&id=<?= $news->getId() ?>" class="btn btn-default" title="zeige News: <?= $news->getTitle() ?>">mehr &raquo;</a>
        </span>
    </div>

    <hr>

<?php endforeach ?>