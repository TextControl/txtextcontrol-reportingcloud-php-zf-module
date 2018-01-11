<?php

namespace TxTextControlTest\ReportingCloud;

use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

class ServiceManagerFactory
{
    public static function getServiceManager(array $applicationConfig = null)
    {
        $applicationConfig = $applicationConfig ?: static::getApplicationConfig();
        $config            = self::getConfig();

        $serviceManagerConfigArray = [];
        if (isset($applicationConfig['service_manager'])) {
            $serviceManagerConfigArray = $applicationConfig['service_manager'];
        }

        $serviceManager       = new ServiceManager();
        $serviceManagerConfig = new ServiceManagerConfig($serviceManagerConfigArray);
        $serviceManagerConfig->configureServiceManager($serviceManager);
        $serviceManager->setService('ApplicationConfig', $applicationConfig);
        $serviceManager->setService('Config', $config);
        $moduleManager = $serviceManager->get('ModuleManager');
        $moduleManager->loadModules();

        return $serviceManager;
    }

    public static function getApplicationConfig()
    {
        return [
            'modules' => [
                'Zend\Router',
                'TxTextControl\ReportingCloud',
            ],

            'module_listener_options' => [
                'config_glob_paths' => [],
                'module_paths'      => [],
            ],

        ];
    }

    public static function getConfig()
    {
        return [
            'reportingcloud' => [
                'credentials' => [
                    'username' => 'your-username',
                    'password' => 'your-password',
                ],
            ],
        ];
    }
}
