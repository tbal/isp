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


        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

            <h3>Adresse</h3>

            <div class="row form-group">
                <div class="col-sm-2 <?= Helper::error('salutation') ?>">
                    <label for="salutation">Anrede <?= Helper::required('salutation') ?></label>
                    <select class="form-control" id="salutation" name="salutation">
                        <option value="">&nbsp;</option>
                        <option <?= Helper::selected('salutation', 'Firma') ?>>Firma</option>
                        <option <?= Helper::selected('salutation', 'Herr') ?>>Herr</option>
                        <option <?= Helper::selected('salutation', 'Frau') ?>>Frau</option>
                    </select>
                </div>
                <div class="col-sm-5 <?= Helper::error('firstname') ?>">
                    <label for="firstname">Vorname <?= Helper::required('firstname') ?></label>
                    <input class="form-control" id="firstname" name="firstname" placeholder="Max" value="<?= Helper::value('firstname') ?>" />
                </div>
                <div class="col-sm-5 <?= Helper::error('lastname') ?>">
                    <label for="lastname">Nachname <?= Helper::required('lastname') ?></label>
                    <input class="form-control" id="lastname" name="lastname" placeholder="Mustermann" value="<?= Helper::value('lastname') ?>" />
                </div>
            </div>

            <div class="form-group <?= Helper::error('street') ?>">
                <label for="street">Straße <?= Helper::required('street') ?></label>
                <input class="form-control" id="street" name="street" placeholder="Musterstraße 12" value="<?= Helper::value('street') ?>" />
            </div>

            <div class="form-group <?= Helper::error('company') ?>">
                <label for="street">Firma <?= Helper::required('company') ?></label>
                <input class="form-control" id="company" name="company" placeholder="Muster GmbH" value="<?= Helper::value('company') ?>" />
            </div>

            <div class="row form-group">
                <div class="col-sm-2 <?= Helper::error('zip') ?>">
                    <label for="zip">Postleitzahl <?= Helper::required('zip') ?></label>
                    <input class="form-control" id="zip" name="zip" placeholder="01234" value="<?= Helper::value('zip') ?>" />
                </div>
                <div class="col-sm-10 <?= Helper::error('city') ?>">
                    <label for="city">Ort <?= Helper::required('city') ?></label>
                    <input class="form-control" id="city" name="city" placeholder="Musterstadt" value="<?= Helper::value('city') ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-6 <?= Helper::error('email') ?>">
                    <label for="email">E-Mail <?= Helper::required('email') ?></label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="muster@mail.de" value="<?= Helper::value('email') ?>" />
                </div>
                <div class="col-sm-6 <?= Helper::error('phone') ?>">
                    <label for="phone">Telefon <?= Helper::required('phone') ?></label>
                    <input class="form-control" id="phone" name="phone" placeholder="+49 1577 123 0 456" value="<?= Helper::value('phone') ?>" />
                </div>
            </div>


            <h3>Versand <?= Helper::required('shipping') ?></h3>

            <div class="form-group <?= Helper::error('shipping') ?>">
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_default" value="Standard" <?= Helper::checked('shipping', 'Standard') ?>>
                        Standard-Versand (3-5 Werktage)
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_express" value="Express" <?= Helper::checked('shipping', 'Express') ?>>
                        Express-Versand (1-2 Werktage)
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="shipping" id="shipping_overnight" value="Overnight" <?= Helper::checked('shipping', 'Overnight') ?>>
                        Overnight-Express (Lieferung am nächsten Werktag)
                    </label>
                </div>
            </div>


            <h3>Sonstiges</h3>

            <div class="form-group <?= Helper::error('notes') ?>">
                <label for="notes">Ihre Anmerkungen <?= Helper::required('notes') ?></label>
                <textarea class="form-control" id="notes" name="notes" placeholder="Hinweise oder Anmerkungen, die Sie uns mitteilen möchten ..." rows="3"><?= Helper::value('notes') ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Abschicken</button>

        </form>
    </div>
</div>