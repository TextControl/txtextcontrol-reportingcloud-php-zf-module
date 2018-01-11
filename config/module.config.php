<?php

namespace TxTextControl\ReportingCloud;

return [
    'service_manager'    => [
        'factories' => [
            'ReportingCloud' => Service\ReportingCloudFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'reportingCloud' => Mvc\Controller\Plugin\ReportingCloudFactory::class,
        ],
    ],
    'view_helpers'       => [
        'factories' => [
            'reportingCloud' => View\Helper\ReportingCloudFactory::class,
        ],
    ],
];
