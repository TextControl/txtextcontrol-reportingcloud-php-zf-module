<?php

namespace TxTextControl\ReportingCloud\Service;

use Interop\Container\ContainerInterface;
use TxTextControl\ReportingCloud\Exception\InvalidArgumentException;
use TxTextControl\ReportingCloud\ReportingCloud;
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
        $source = '/vendor/textcontrol/txtextcontrol-reportingcloud-zf3-module/config/reportingcloud.local.php.dist';
        $dest   = '/config/autoload/reportingcloud.local.php';

        $help = "Copy '{$source}' to '{$dest}' in your Zend Framework 3 application, ";
        $help .= "then add your ReportingCloud credentials to that file.";

        if (!array_key_exists('reportingcloud', $config)) {
            $message = "The key 'reportingcloud' has not been specified in your application's configuration file. ";
            $message .= $help;
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('credentials', $config['reportingcloud'])) {
            $message = "The key 'credentials' has not been specified under the key 'reportingcloud' ";
            $message .= "in your application's configuration file. ";
            $message .= $help;
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('username', $config['reportingcloud']['credentials'])) {
            $message = "The key 'username' has not been specified under the key 'reportingcloud', ";
            $message .= "sub-key 'credentials' in your application's configuration file. ";
            $message .= $help;
            throw new InvalidArgumentException($message);
        }

        if (!array_key_exists('password', $config['reportingcloud']['credentials'])) {
            $message = "The key 'password' has not been specified under the key 'reportingcloud', ";
            $message .= "sub-key 'credentials' in your application's configuration file. ";
            $message .= $help;
            throw new InvalidArgumentException($message);
        }

        return [
            'username' => $config['reportingcloud']['credentials']['username'],
            'password' => $config['reportingcloud']['credentials']['password'],
        ];
    }
}
