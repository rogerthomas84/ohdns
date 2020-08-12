<?php
namespace OhDns\Validators;

use OhDns\OhDns;

/**
 * Class EmailAddressValidator
 * @package OhDns\Validators
 */
class EmailAddressValidator
{
    /**
     * This verifies that an email address is valid, optionally checking the DNS for valid MX records.
     *
     * @param string $emailAddress
     * @param bool $deepMxCheck (optional) whether to also check the MX records.
     * @return bool
     */
    public static function isValid($emailAddress, $deepMxCheck=true)
    {
        if (mb_strstr($emailAddress, '@') === false || mb_strstr($emailAddress, '.') === false) {
            return false;
        }
        if ($emailAddress !== filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $parts = explode('@', $emailAddress);
        if (count($parts) !== 2) {
            return false;
        }
        if (mb_strlen(trim($parts[0])) === 0 || mb_strlen(trim($parts[1])) === 0) {
            return false;
        }
        $domain = trim($parts[1]);
        if (mb_strstr($domain, '.') === false) {
            return false;
        }
        if (mb_substr($domain, 0, 1) === '.' || mb_substr($domain, -1) === '.') {
            return false;
        }

        if ($deepMxCheck === false) {
            return true;
        }

        $records = OhDns::getInstance()->getMXRecords(
            $domain
        );
        if (!is_array($records)) {
            return false;
        }
        return count($records) > 0;
    }
}
