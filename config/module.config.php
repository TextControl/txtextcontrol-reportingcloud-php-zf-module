<?php

use TxTextControl\ReportingCloud\Mvc\Controller\Plugin\ReportingCloudFactory as ReportingCloudControllerPluginFactory;
use TxTextControl\ReportingCloud\Service\ReportingCloudFactory as ReportingCloudServiceFactory;
use TxTextControl\ReportingCloud\View\Helper\ReportingCloudFactory as ReportingCloudViewHelperFactory;

return [
    'service_manager'    => [
        'factories' => [
            'ReportingCloud' => ReportingCloudServiceFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'reportingCloud' => ReportingCloudControllerPluginFactory::class,
        ],
    ],
    'view_helpers'       => [
        'factories' => [
            'reportingCloud' => ReportingCloudViewHelperFactory::class,
        ],
    ],
];