<?php

namespace TiloBaller\Library;

class Validator {

    const RULE_REQUIRED = 1;
    const RULE_EMAIL    = 2;
    const RULE_ZIP      = 4;
    const RULE_PHONE    = 8;

    private static $ruleset = array();
    private static $invalidFields = array();

    public static function addRule($field, $rule) {
        if (!array_key_exists($field, self::$ruleset)) {
            self::$ruleset[$field] = array();
        }

        self::$ruleset[$field][] = $rule;
    }

    public static function isValid($field) {
        return !in_array($field, self::$invalidFields);
    }

    public static function hasErrors() {
        return !empty(self::$invalidFields);
    }

    public static function hasRule($field, $rule) {
        return isset(self::$ruleset[$field]) && in_array($rule, self::$ruleset[$field]);
    }

    public static function validate(array $inputArray) {
        foreach (self::$ruleset as $field => $rules) {
            foreach ($rules as $rule) {
                if (!self::isValid($field)) {
                    // if field is already marked as invalid we skip the other rules for this field
                    continue;
                }

                if (!self::validateWithRule(isset($inputArray[$field]) ? $inputArray[$field] : '', $rule)) {
                    self::$invalidFields[] = $field;
                }
            }
        }

        return !self::hasErrors();
    }

    public static function reset() {
        self::$ruleset = array();
        self::$invalidFields = array();
    }

    private static function validateWithRule($input, $rule) {
        switch ($rule) {
            case self::RULE_REQUIRED:
                return $input !== '';
                break;
            case self::RULE_EMAIL:
                return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
                break;
            case self::RULE_ZIP:
                return $input === '' || preg_match('/^[0-9]{5}$/', $input) === 1;
                break;
            case self::RULE_PHONE:
                return $input === '' || preg_match('/^\+?[0-9 \(\)\/-]+$/', $input) === 1;
                break;
            default:
                throw new \InvalidArgumentException(sprintf(
                    'Unknown validator rule \'%s\'. Can not validate input \'%s\' with this rule.',
                    $rule,
                    $input
                ));
        }
    }
}