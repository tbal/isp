<?php

namespace TiloBaller\Library;

class FormHelper {

    public static function value($inputArray, $field) {
        return isset($inputArray[$field]) ? $inputArray[$field] : '';
    }

    public static function property($inputObject, $property) {
        $methodName = 'get' . ucfirst($property);
        return method_exists($inputObject, $methodName) ? $inputObject->$methodName() : '';
    }

    public static function selected($inputArray, $field, $option) {
        return FormHelper::value($inputArray, $field) === $option ? 'selected' : '';
    }

    public static function checked($inputArray, $field, $option) {
        return FormHelper::value($inputArray, $field) === $option ? 'checked' : '';
    }

    public static function error($field) {
        return !Validator::isValid($field) ? 'has-error' : '';
    }

    public static function required($field) {
        return Validator::hasRule($field, Validator::RULE_REQUIRED) ? '<abbr title="Pflichtangabe">*</abbr>' : '';
    }
}