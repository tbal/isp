<h2>Resultat</h2>

<div class="panel panel-default">
    <div class="panel-body">
        <dl>
            <dt>Anrede</dt>
            <dd><?= Helper::value('salutation') ?></dd>

            <dt>Vorname</dt>
            <dd><?= Helper::value('firstname') ?></dd>

            <dt>Nachname</dt>
            <dd><?= Helper::value('lastname') ?></dd>

            <dt>Firma</dt>
            <dd><?= Helper::value('company') ?></dd>

            <dt>Straße</dt>
            <dd><?= Helper::value('street') ?></dd>

            <dt>Postleitzahl</dt>
            <dd><?= Helper::value('zip') ?></dd>

            <dt>Ort</dt>
            <dd><?= Helper::value('city') ?></dd>

            <dt>E-Mail</dt>
            <dd><?= Helper::value('email') ?></dd>

            <dt>Telefon</dt>
            <dd><?= Helper::value('phone') ?></dd>

            <dt>Versand</dt>
            <dd><?= Helper::value('shipping') ?></dd>

            <dt>Anmerkungen</dt>
            <dd><?= Helper::value('notes') ?></dd>
        </dl>
    </div>
</div>


<h4>Raw:</h4>

<pre><?php print_r($_REQUEST) ?></pre>