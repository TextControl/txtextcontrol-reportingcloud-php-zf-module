<?php

namespace TxTextControlTest\ReportingCloud\Mvc\Controller\Plugin;

use PHPUnit\Framework\TestCase;
use TxTextControl\ReportingCloud\Mvc\Controller\Plugin\ReportingCloud as ReportingCloudControllerPlugin;
use TxTextControl\ReportingCloud\ReportingCloud as ReportingCloudReportingCloud;

class ReportingCloudTest extends TestCase
{
    public function testInvocationReturnsReportingCloudInstance()
    {
        $reportingCloud = new ReportingCloudReportingCloud();

        $controllerPlugin = new ReportingCloudControllerPlugin($reportingCloud);

        $this->assertSame($reportingCloud, $controllerPlugin());
    }
}
