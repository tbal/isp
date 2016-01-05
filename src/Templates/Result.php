<?php

use TiloBaller\Library\FormHelper;

?>

<h2>Resultat</h2>

<div class="panel panel-default">
    <div class="panel-body">
        <dl>
            <dt>Anrede</dt>
            <dd><?= FormHelper::value('salutation') ?></dd>

            <dt>Vorname</dt>
            <dd><?= FormHelper::value('firstname') ?></dd>

            <dt>Nachname</dt>
            <dd><?= FormHelper::value('lastname') ?></dd>

            <dt>Firma</dt>
            <dd><?= FormHelper::value('company') ?></dd>

            <dt>Straße</dt>
            <dd><?= FormHelper::value('street') ?></dd>

            <dt>Postleitzahl</dt>
            <dd><?= FormHelper::value('zip') ?></dd>

            <dt>Ort</dt>
            <dd><?= FormHelper::value('city') ?></dd>

            <dt>E-Mail</dt>
            <dd><?= FormHelper::value('email') ?></dd>

            <dt>Telefon</dt>
            <dd><?= FormHelper::value('phone') ?></dd>

            <dt>Versand</dt>
            <dd><?= FormHelper::value('shipping') ?></dd>

            <dt>Anmerkungen</dt>
            <dd><?= FormHelper::value('notes') ?></dd>
        </dl>
    </div>
</div>


<h4>Raw:</h4>

<pre><?php print_r($_REQUEST) ?></pre>