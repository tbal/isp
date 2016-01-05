<?php

namespace TiloBaller\Library;

class FormHelper {
    public static function value($field) {
        return isset($_REQUEST[$field]) ? $_REQUEST[$field] : '';
    }

    public static function error($field) {
        return !Validator::isValid($field) ? 'has-error' : '';
    }

    public static function required($field) {
        return Validator::hasRule($field, Validator::RULE_REQUIRED) ? '<abbr title="Pflichtangabe">*</abbr>' : '';
    }

    public static function checked($field, $option) {
        return FormHelper::value($field) === $option ? 'checked' : '';
    }

    public static function selected($field, $option) {
        return FormHelper::value($field) === $option ? 'selected' : '';
    }

    public static function sanitizeInput() {
        array_walk($_REQUEST, function(&$value, $key) {
            $value = filter_var(trim($value), FILTER_SANITIZE_STRING);
        });
    }
}