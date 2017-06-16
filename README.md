![Logo](./media/rc_logo_512.png)

# ReportingCloud Zend Framework 3 Module


## Install Using Composer

The recommended way to install the ReportingCloud Zend Framework 3 module in your project is using [Composer](http://getcomposer.org):

```bash
composer require textcontrol/txtextcontrol-reportingcloud-zf3-module
```

After installing, you need to copy the configuration file:

```bash
/vendor/textcontrol/txtextcontrol-reportingcloud-zf3-module/config/reportingcloud.local.php.dist
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

Once you have done this, you are ready to enable the module in your application's module configuration file.

In the file `/config/modules.config.php`, add the line:

```php
'TxTextControl\ReportingCloudZf3Module',
```

Your `/config/modules.config.php` file should look something like this:

```php
return [
    'Zend\Router',
    'Zend\Validator',
    'TxTextControl\ReportingCloudZf3Module',
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

For easy access in Views, the following Controller helper is available:

```php
$this->reportingCloud();    // returns a \TxTextControl\ReportingCloud\ReportingCloud instance
```

 ## Getting Support
 
 The official Zend Framework 3 for ReportingCloud Web API is supported by Text Control GmbH. To start a conversation with the PHP people in the ReportingCloud Support Department, please [create a ticket](http://support.textcontrol.com/new-ticket), selecting _ReportingCloud_ from the department selection list.
 