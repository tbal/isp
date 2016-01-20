<?php
use TiloBaller\Library\Validator;
use TiloBaller\Library\FormHelper;

/** @var string $mode */
/** @var \TiloBaller\Mvc\Domain\Model\NewsModel $news */
?>

<?php if (isset($addResult) && $addResult === false): ?>
    <div class="alert alert-danger" role="alert">Beim Hinzufügen der News ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.</div>
<?php endif ?>

<?php if (isset($updateResult) && $updateResult === false): ?>
    <div class="alert alert-danger" role="alert">Beim Speichern der Änderungen ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.</div>
<?php endif ?>


<h1>
    News
    <?php if ($mode === 'update'): ?>
    bearbeiten
    <?php else: ?>
    hinzufügen
    <?php endif ?>
</h1>


<?php if(Validator::hasErrors()): ?>
    <div class="alert alert-danger" role="alert">
        Ihre Eingabe war entweder unvollständig oder fehlerhaft. Bitte überprüfen Sie noch einmal Ihre Angaben.
    </div>
<?php endif ?>

<form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">

    <div class="form-group <?= FormHelper::error('title') ?>">
        <label for="title">Titel <?= FormHelper::required('title') ?></label>
        <input class="form-control" id="title" name="title" value="<?= FormHelper::property($news, 'title') ?>" />
    </div>

    <div class="row form-group">
        <div class="col-sm-6 <?= FormHelper::error('date') ?>">
            <label for="date">Datum <?= FormHelper::required('date') ?></label>
            <input class="form-control datepicker" id="date" name="date" placeholder="TT.MM.JJJJ" value="<?= FormHelper::property($news, 'date', 'd.m.Y') ?>" />
        </div>
        <div class="col-sm-6 <?= FormHelper::error('author') ?>">
            <label for="author">Autor <?= FormHelper::required('author') ?></label>
            <input class="form-control" id="author" name="author" value="<?= FormHelper::property($news, 'author') ?>" />
        </div>
    </div>

    <div class="form-group <?= FormHelper::error('abstract') ?>">
        <label for="abstract">Abstrakt <?= FormHelper::required('abstract') ?></label>
        <textarea class="form-control" id="abstract" name="abstract" rows="2"><?= FormHelper::property($news, 'abstract') ?></textarea>
    </div>

    <div class="form-group <?= FormHelper::error('body') ?>">
        <label for="body">Inhalt <?= FormHelper::required('body') ?></label>
        <textarea class="form-control" id="body" name="body" rows="10"><?= FormHelper::property($news, 'body') ?></textarea>
    </div>

    <p>
        <button type="submit" name="submit" class="btn btn-primary">Abschicken</button>
        <?php if ($mode === 'update'): ?>
        <a href="/?controller=news&action=single&id=<?= $news->getId() ?>" class="btn btn-default abort-update">Abbrechen</a>
        <?php endif ?>
    </p>

</form>