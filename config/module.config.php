<?php
declare(strict_types=1);

/**
 * ReportingCloud Zend Framework 3 Module
 *
 * Zend Framework 3 Module for ReportingCloud Web API. Authored and supported by Text Control GmbH.
 *
 * @link      https://www.reporting.cloud to learn more about ReportingCloud
 * @link      https://git.io/Je5US for the canonical source repository
 * @license   https://raw.githubusercontent.com/TextControl/txtextcontrol-reportingcloud-php/master/LICENSE.md
 * @copyright © 2020 Text Control GmbH
 */

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
