<?php
declare(strict_types=1);

namespace TxTextControl\ReportingCloud\View\Helper;

use TxTextControl\ReportingCloud\ReportingCloud as TxTextControlReportingCloudReportingCloud;
use Zend\View\Helper\AbstractHelper;

class ReportingCloud extends AbstractHelper
{
    protected $reportingCloud;

    public function __construct(TxTextControlReportingCloudReportingCloud $reportingCloud)
    {
        $this->reportingCloud = $reportingCloud;
    }

    public function __invoke():TxTextControlReportingCloudReportingCloud
    {
        return $this->reportingCloud;
    }
}
