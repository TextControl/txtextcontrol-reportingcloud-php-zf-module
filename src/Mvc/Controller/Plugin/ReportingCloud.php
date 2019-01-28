<?php
declare(strict_types=1);

namespace TxTextControl\ReportingCloud\Mvc\Controller\Plugin;

use TxTextControl\ReportingCloud\ReportingCloud as TxTextControlReportingCloudReportingCloud;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ReportingCloud extends AbstractPlugin
{
    protected $reportingCloud;

    public function __construct(TxTextControlReportingCloudReportingCloud $reportingCloud)
    {
        $this->reportingCloud = $reportingCloud;
    }

    public function __invoke(): TxTextControlReportingCloudReportingCloud
    {
        return $this->reportingCloud;
    }
}
