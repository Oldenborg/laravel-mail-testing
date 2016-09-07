#Laravel email testing trait
This trait is for testing emails in Laravel
Works with Laravel 5.3

1. Place the files *MailTracking.php* and *MailTest.php* in the `/tests/` folder
2. Add this to the autoload-dev selection of your **composer.json** file
```
    "autoload-dev": {
        "files": [
            "tests/MailTracking.php"
        ]
    },
```
