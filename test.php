<?php
require_once 'vendor/autoload.php';

$inst = \OhDns\OhDns::getInstance();
$domains = [
    'microsoft.com',
    'www.microsoft.com',
    'google.com',
    'www.google.com'
];

$emails = [
    'joe@example.com',
    'jane@microsoft.com',
    'bob@somdomainthatwillhopefullynevereverexistatnopointintheimmediatefuture.com'
];

foreach ($emails as $email) {
    $valid = \OhDns\Validators\EmailAddressValidator::isValid($email);
    if ($valid) {
        echo sprintf(' YES: %s is a valid email address.', $email) . PHP_EOL;
    } else {
        echo sprintf('  NO: %s is NOT a valid email address.', $email) . PHP_EOL;
    }
}

foreach ($domains as $domain) {
    echo '----' . PHP_EOL;
    echo '| ' . $domain . PHP_EOL;
    echo '----' . PHP_EOL;

    $mx = $inst->getMXRecords($domain);
    if (is_array($mx)) {
        echo sprintf('    MX: %s records found for domain "%s"' . PHP_EOL, count($mx), $domain);
    } else {
        echo sprintf('    MX: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $aaaa = $inst->getAAAARecords($domain);
    if (is_array($aaaa)) {
        echo sprintf('  AAAA: %s records found for domain "%s"' . PHP_EOL, count($aaaa), $domain);
    } else {
        echo sprintf('  AAAA: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $a = $inst->getARecords($domain);
    if (is_array($aaaa)) {
        echo sprintf('     A: %s records found for domain "%s"' . PHP_EOL, count($a), $domain);
    } else {
        echo sprintf('     A: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $ns = $inst->getNSRecords($domain);
    if (is_array($ns)) {
        echo sprintf('    NS: %s records found for domain "%s"' . PHP_EOL, count($ns), $domain);
    } else {
        echo sprintf('    NS: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $soa = $inst->getSOARecords($domain);
    if (is_array($soa)) {
        echo sprintf('   SOA: %s records found for domain "%s"' . PHP_EOL, count($soa), $domain);
    } else {
        echo sprintf('   SOA: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $txt = $inst->getTXTRecords($domain);
    if (is_array($txt)) {
        echo sprintf('   TXT: %s records found for domain "%s"' . PHP_EOL, count($txt), $domain);
    } else {
        echo sprintf('   TXT: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $cname = $inst->getCNAMERecords($domain);
    if (is_array($cname)) {
        echo sprintf(' CNAME: %s records found for domain "%s"' . PHP_EOL, count($cname), $domain);
    } else {
        echo sprintf(' CNAME: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $caa = $inst->getCNAMERecords($domain);
    if (is_array($caa)) {
        echo sprintf(' CNAME: %s records found for domain "%s"' . PHP_EOL, count($caa), $domain);
    } else {
        echo sprintf(' CNAME: no records found for domain "%s"' . PHP_EOL, $domain);
    }

    $allData = $inst->getRecord($domain);
}