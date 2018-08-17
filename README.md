![Logo](./data/rc_logo_512.png)

# ReportingCloud Zend Framework 3 Module

[![Build Status](https://scrutinizer-ci.com/g/TextControl/txtextcontrol-reportingcloud-php-zf-module/badges/build.png?b=master)](https://scrutinizer-ci.com/g/TextControl/txtextcontrol-reportingcloud-php-zf-module/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/TextControl/txtextcontrol-reportingcloud-php-zf-module/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/TextControl/txtextcontrol-reportingcloud-php-zf-module/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/textcontrol/txtextcontrol-reportingcloud-zf-module/v/stable)](https://packagist.org/packages/textcontrol/txtextcontrol-reportingcloud-zf-module)
[![composer.lock available](https://poser.pugx.org/textcontrol/txtextcontrol-reportingcloud-zf-module/composerlock)](https://packagist.org/packages/textcontrol/txtextcontrol-reportingcloud-zf-module)


## Install Using Composer

The recommended way to install the ReportingCloud Zend Framework 3 module in your project is using [Composer](http://getcomposer.org):

```bash
composer require textcontrol/txtextcontrol-reportingcloud-zf-module:^0.1
```

After installing, you need to copy the configuration file:

```bash
/vendor/textcontrol/txtextcontrol-reportingcloud-zf-module/config/reportingcloud.local.php.dist
```
to your Zend Framework 3 application: 

```bash
/config/autoload/reportingcloud.local.php
```

Note: The `.dist` prefix has been removed.

Then, add your ReportingCloud credentials to the configuration file.

Do this using either an API key:

```php
return [
    'reportingcloud' => [
        'credentials' => [
            'api_key' => 'your-api-key',
        ],
    ],
];
```

Or your username and password:

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

Once you have done this, you are ready to enable the module in your application's module configuration file.

In the file `/config/modules.config.php`, add the line:

```php
'TxTextControl\ReportingCloud',
```

Your `/config/modules.config.php` file should look something like this:

```php
return [
    'Zend\Router',
    'Zend\Validator',
    'TxTextControl\ReportingCloud',
    'Application',
];
```

You are now ready to use Reporting Cloud in your Zend Framework 3 application.

## Usage in Zend Framework 3

The ReportingCloud Zend Framework 3 module registers a Service in the Service Manager under the key `ReportingCloud`.

It is therefore available in Factories as follows:

```php
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Factory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $reportingCloud = $container->get('ReportingCloud');

        // instantiate and return your object here
        
    }
}
```

### Controller Plugin

For easy access in Controllers, the following Controller plugin is available:

```php
$this->reportingCloud();    // returns a \TxTextControl\ReportingCloud\ReportingCloud instance
```

### View Helper

For easy access in Views, the following View helper is available:

```php
$this->reportingCloud();    // returns a \TxTextControl\ReportingCloud\ReportingCloud instance
```

 ## Getting Support
 
 The official Zend Framework 3 module for ReportingCloud Web API is supported by Text Control GmbH. To start a conversation with the PHP people in the ReportingCloud Support Department, please [create a ticket](https://support.textcontrol.com/new-ticket), selecting _ReportingCloud_ from the department selection list.
