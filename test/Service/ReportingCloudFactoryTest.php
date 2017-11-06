<?php

namespace TxTextControlTest\ReportingCloud\Service;

use PHPUnit\Framework\TestCase;
use TxTextControl\ReportingCloud\ReportingCloud;
use TxTextControl\ReportingCloud\Service\ReportingCloudFactory;
use TxTextControlTest\ReportingCloud\ServiceManagerFactory;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\ServiceManager;

class ReportingCloudFactoryTest extends TestCase
{
    protected $factory;

    public function testItInitializesReportingCloud()
    {
        $container = ServiceManagerFactory::getServiceManager();

        $reportingCloud = $this->factory->__invoke($container, '');

        $this->assertInstanceOf(ReportingCloud::class, $reportingCloud);
    }

    public function testItRaisesExceptionIfRequestNotInContainer()
    {
        try {
            $container   = new ServiceManager();
            $requestName = '';
            $this->factory->__invoke($container, $requestName);
            $this->fail('Exception should have been raised');
        } catch (ServiceNotFoundException $ex) {
            $this->assertContains('Unable to resolve service "Config" to a factory', $ex->getMessage());
        }
    }

    public function testItIsRegisteredAsAppServiceFactory()
    {
        $serviceManager = ServiceManagerFactory::getServiceManager();

        $this->assertTrue($serviceManager->has('ReportingCloud'));
    }

    protected function setUp()
    {
        $this->factory = new ReportingCloudFactory();
    }
}