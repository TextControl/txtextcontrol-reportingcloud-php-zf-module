<?php

namespace TxTextControl\ReportingCloudZf3Module\Mvc\Controller\Plugin;

use TxTextControl\ReportingCloud\ReportingCloud as TxTextControlReportingCloudReportingCloud;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ReportingCloud extends AbstractPlugin
{
    protected $reportingCloud;

    public function __construct(TxTextControlReportingCloudReportingCloud $reportingCloud)
    {
        $this->reportingCloud = $reportingCloud;
    }

    public function __invoke()
    {
        return $this->reportingCloud;
    }
}
