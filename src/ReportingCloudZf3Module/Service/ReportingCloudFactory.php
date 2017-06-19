<?php

namespace TxTextControl\ReportingCloud\Service;

use Interop\Container\ContainerInterface;
use TxTextControl\ReportingCloud\ReportingCloud;
use TxTextControl\ReportingCloud\Exception\InvalidArgumentException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ReportingCloudFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        $credentials = $this->getCredentials($config);

        return new ReportingCloud($credentials);
    }

    protected function getCredentials($config)
    {
        $help = "Copy '/vendor/textcontrol/txtextcontrol-reportingcloud-zf3-module/config/reportingcloud.local.php.dist' to '/config/autoload/reportingcloud.local.php' in your Zend Framework 3 application, then add your ReportingCloud credentials to that file.";

        if (!array_key_exists('reportingcloud', $config)) {
            $message = "The key 'reportingcloud' has not been specified in your application's configuration file. {$help}";
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('credentials', $config['reportingcloud'])) {
            $message = "The key 'credentials' has not been specified under the key 'reportingcloud' in your application's configuration file. {$help}";
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('username', $config['reportingcloud']['credentials'])) {
            $message = "The key 'username' has not been specified under the key 'reportingcloud', sub-key 'credentials' in your application's configuration file. {$help}";
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('password', $config['reportingcloud']['credentials'])) {
            $message = "The key 'password' has not been specified under the key 'reportingcloud', sub-key 'credentials' in your application's configuration file. {$help}";
            throw new InvalidArgumentException($message);
        }

        return [
            'username' => $config['reportingcloud']['credentials']['username'],
            'password' => $config['reportingcloud']['credentials']['password'],
        ];
    }
}