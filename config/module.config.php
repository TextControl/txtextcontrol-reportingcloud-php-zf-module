<?php

use TxTextControl\ReportingCloud\Mvc\Controller\Plugin\ReportingCloudFactory as ReportingCloudControllerFactory;
use TxTextControl\ReportingCloud\Service\ReportingCloudFactory as ReportingCloudServiceFactory;
use TxTextControl\ReportingCloud\View\Helper\ReportingCloudFactory as ReportingCloudViewFactory;

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