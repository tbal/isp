<?php

use TiloBaller\Library\FormHelper;

?>

<h2>Resultat</h2>

<div class="panel panel-default">
    <div class="panel-body">
        <dl>
            <dt>Anrede</dt>
            <dd><?= FormHelper::value($data, 'salutation') ?></dd>

            <dt>Vorname</dt>
            <dd><?= FormHelper::value($data, 'firstname') ?></dd>

            <dt>Nachname</dt>
            <dd><?= FormHelper::value($data, 'lastname') ?></dd>

            <dt>Firma</dt>
            <dd><?= FormHelper::value($data, 'company') ?></dd>

            <dt>Straße</dt>
            <dd><?= FormHelper::value($data, 'street') ?></dd>

            <dt>Postleitzahl</dt>
            <dd><?= FormHelper::value($data, 'zip') ?></dd>

            <dt>Ort</dt>
            <dd><?= FormHelper::value($data, 'city') ?></dd>

            <dt>E-Mail</dt>
            <dd><?= FormHelper::value($data, 'email') ?></dd>

            <dt>Telefon</dt>
            <dd><?= FormHelper::value($data, 'phone') ?></dd>

            <dt>Versand</dt>
            <dd><?= FormHelper::value($data, 'shipping') ?></dd>

            <dt>Anmerkungen</dt>
            <dd><?= FormHelper::value($data, 'notes') ?></dd>
        </dl>
    </div>
</div>


<h4>Raw:</h4>

<pre><?php print_r($data) ?></pre>