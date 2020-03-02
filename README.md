OhDns
=====

Introduction...
---------------

OhDns is a DNS record lookup library for PHP.

Usage...
--------

See `test.php` for examples of retrieving DNS records by type.

Additionally, this library provides a more advanced email validation by verifying the MX records associated to the
domain actually exist.

```php
<?php
$valid = \OhDns\Validators\EmailAddressValidator::isValid(
    'joe@example.com'
);
if ($valid) {
    echo ' YES: joe@example.com is a valid email address.';
} else {
    echo '  NO: joe@example.com is NOT a valid email address.';
}
```

Composer...
-----------

``` 
{
    "repositories":[
        {
            "type": "vcs",
            "url": "git@github.com:rogerthomas84/ohdns.git"
        }
    ],
    "require": {
        "rogerthomas84/ohdns": "^1.0"
    }
}
```
