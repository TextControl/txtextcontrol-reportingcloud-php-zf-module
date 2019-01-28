<?php
declare(strict_types=1);

namespace TxTextControlTest\ReportingCloud\View\Helper;

use PHPUnit\Framework\TestCase;
use TxTextControl\ReportingCloud\ReportingCloud as ReportingCloudReportingCloud;
use TxTextControl\ReportingCloud\View\Helper\ReportingCloud as ReportingCloudViewHelper;

class ReportingCloud extends TestCase
{
    public function testInvocationReturnsReportingCloudInstance(): void
    {
        $reportingCloud = new ReportingCloudReportingCloud();

        $viewHelper = new ReportingCloudViewHelper($reportingCloud);

        $this->assertSame($reportingCloud, $viewHelper());
    }
}
