<?php

class Helper {
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
        return Helper::value($field) === $option ? 'checked' : '';
    }

    public static function selected($field, $option) {
        return Helper::value($field) === $option ? 'selected' : '';
    }
}