<?php

use TiloBaller\Library\Validator;
use TiloBaller\Library\FormHelper;

?>

<h2>Eingabeformular</h2>

<div class="panel panel-default">
    <div class="panel-body">

        <?php if(Validator::hasErrors()): ?>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Ihre Eingabe war entweder unvollständig oder fehlerhaft. Bitte überprüfen Sie noch einmal Ihre Angaben.
                </div>
            </div>
        <?php endif ?>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

            <h3>Adresse</h3>

            <div class="row form-group">
                <div class="col-sm-2 <?= FormHelper::error('salutation') ?>">
                    <label for="salutation">Anrede <?= FormHelper::required('salutation') ?></label>
                    <select class="form-control" id="salutation" name="salutation">
                        <option value="">&nbsp;</option>
                        <option <?= FormHelper::selected('salutation', 'Firma') ?>>Firma</option>
                        <option <?= FormHelper::selected('salutation', 'Herr') ?>>Herr</option>
                        <option <?= FormHelper::selected('salutation', 'Frau') ?>>Frau</option>
                    </select>
                </div>
                <div class="col-sm-5 <?= FormHelper::error('firstname') ?>">
                    <label for="firstname">Vorname <?= FormHelper::required('firstname') ?></label>
                    <input class="form-control" id="firstname" name="firstname" placeholder="Max" value="<?= FormHelper::value('firstname') ?>" />
                </div>
                <div class="col-sm-5 <?= FormHelper::error('lastname') ?>">
                    <label for="lastname">Nachname <?= FormHelper::required('lastname') ?></label>
                    <input class="form-control" id="lastname" name="lastname" placeholder="Mustermann" value="<?= FormHelper::value('lastname') ?>" />
                </div>
            </div>

            <div class="form-group <?= FormHelper::error('street') ?>">
                <label for="street">Straße <?= FormHelper::required('street') ?></label>
                <input class="form-control" id="street" name="street" placeholder="Musterstraße 12" value="<?= FormHelper::value('street') ?>" />
            </div>

            <div class="form-group <?= FormHelper::error('company') ?>">
                <label for="street">Firma <?= FormHelper::required('company') ?></label>
                <input class="form-control" id="company" name="company" placeholder="Muster GmbH" value="<?= FormHelper::value('company') ?>" />
            </div>

            <div class="row form-group">
                <div class="col-sm-2 <?= FormHelper::error('zip') ?>">
                    <label for="zip">Postleitzahl <?= FormHelper::required('zip') ?></label>
                    <input class="form-control" id="zip" name="zip" placeholder="01234" value="<?= FormHelper::value('zip') ?>" />
                </div>
                <div class="col-sm-10 <?= FormHelper::error('city') ?>">
                    <label for="city">Ort <?= FormHelper::required('city') ?></label>
                    <input class="form-control" id="city" name="city" placeholder="Musterstadt" value="<?= FormHelper::value('city') ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-6 <?= FormHelper::error('email') ?>">
                    <label for="email">E-Mail <?= FormHelper::required('email') ?></label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="muster@mail.de" value="<?= FormHelper::value('email') ?>" />
                </div>
                <div class="col-sm-6 <?= FormHelper::error('phone') ?>">
                    <label for="phone">Telefon <?= FormHelper::required('phone') ?></label>
                    <input class="form-control" id="phone" name="phone" placeholder="+49 1577 123 0 456" value="<?= FormHelper::value('phone') ?>" />
                </div>
            </div>


            <h3>Versand <?= FormHelper::required('shipping') ?></h3>

            <div class="form-group <?= FormHelper::error('shipping') ?>">
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_default" value="Standard" <?= FormHelper::checked('shipping', 'Standard') ?>>
                        Standard-Versand (3-5 Werktage)
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_express" value="Express" <?= FormHelper::checked('shipping', 'Express') ?>>
                        Express-Versand (1-2 Werktage)
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_overnight" value="Overnight" <?= FormHelper::checked('shipping', 'Overnight') ?>>
                        Overnight-Express (Lieferung am nächsten Werktag)
                    </label>
                </div>
            </div>


            <h3>Sonstiges</h3>

            <div class="form-group <?= FormHelper::error('notes') ?>">
                <label for="notes">Ihre Anmerkungen <?= FormHelper::required('notes') ?></label>
                <textarea class="form-control" id="notes" name="notes" placeholder="Hinweise oder Anmerkungen, die Sie uns mitteilen möchten ..." rows="3"><?= FormHelper::value('notes') ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Abschicken</button>

        </form>
    </div>
</div>