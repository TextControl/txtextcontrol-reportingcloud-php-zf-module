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

namespace TxTextControl\ReportingCloud\Mvc\Controller\Plugin;

use TxTextControl\ReportingCloud\ReportingCloud as TxTextControlReportingCloudReportingCloud;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Class ReportingCloud
 *
 * @package TxTextControl\ReportingCloud
 * @author  Jonathan Maron (@JonathanMaron)
 */
class ReportingCloud extends AbstractPlugin
{
    /**
     * @var TxTextControlReportingCloudReportingCloud
     */
    protected $reportingCloud;

    /**
     * ReportingCloud constructor
     *
     * @param TxTextControlReportingCloudReportingCloud $reportingCloud
     */
    public function __construct(TxTextControlReportingCloudReportingCloud $reportingCloud)
    {
        $this->reportingCloud = $reportingCloud;
    }

    /**
     * @return TxTextControlReportingCloudReportingCloud
     */
    public function __invoke(): TxTextControlReportingCloudReportingCloud
    {
        return $this->reportingCloud;
    }
}
