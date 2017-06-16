<?php

use TxTextControl\ReportingCloudZf3Module\Mvc\Controller\Plugin\ReportingCloudFactory as ReportingCloudControllerFactory;
use TxTextControl\ReportingCloudZf3Module\Service\ReportingCloudFactory as ReportingCloudServiceFactory;
use TxTextControl\ReportingCloudZf3Module\View\Helper\ReportingCloudFactory as ReportingCloudViewFactory;

return [
    'service_manager'    => [
        'factories' => [
            'ReportingCloud' => ReportingCloudServiceFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'reportingCloud' => ReportingCloudControllerFactory::class,
        ],
    ],
    'view_helpers'       => [
        'factories' => [
            'reportingCloud' => ReportingCloudViewFactory::class,
        ],
    ],
];