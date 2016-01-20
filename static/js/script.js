(function() {
    'use strict';

    $('.action-delete').click(function(e) {
        if (!confirm('Soll diese News wirklich unwiderruflich gelöscht werden?')) {
            e.preventDefault()
        }
    });

    $('.abort-update').click(function(e) {
        if (!confirm('Nicht gespeicherte Änderungen gehen unwiderruflich verloren.\n\nWollen Sie die Bearbeitung der News wirklich abbrechen?')) {
            e.preventDefault()
        }
    });

    $('input.datepicker').datepicker({
        format: "dd.mm.yyyy",
        todayBtn: "linked",
        language: "de",
        autoclose: true,
        todayHighlight: true
    });
})();