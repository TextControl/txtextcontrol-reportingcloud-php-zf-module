![Logo](./media/rc_logo_512.png)

# ReportingCloud Zend Framework 3 Module


## Install Using Composer

The recommended way to install the ReportingCloud Zend Framework 3 module in your project is using [Composer](http://getcomposer.org):

```bash
composer require textcontrol/txtextcontrol-reportingcloud-zf3-module
```

After installing, you need to copy the configuration file:

```bash
/config/reportingcloud.local.php.dist
```
to your Zend Framework 3 application: 

```bash
/config/autoload/reportingcloud.local.php
```

Note: The `.dist` prefix has been removed.

Then, add your ReportingCloud credentials to the configuration file:

```php
return [
    'reportingcloud' => [
        'credentials' => [
            'username' => 'your-username',
            'password' => 'your-password',
        ],
    ],
];
```

Once you have done this, you are ready to enable the module in your Zend Framework 3 application's module configuration file.

In the file:

```bash
/config/modules.config.php
```
Add the line:

```php
'TxTextControl\Account',
```

And that is all. You are now ready to use Reporting Cloud in your Zend Framework 3 application.

## Usage in Zend Framework 3