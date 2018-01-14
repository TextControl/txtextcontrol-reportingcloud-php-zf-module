<?php

namespace TxTextControlTest\ReportingCloud\Service;

use PHPUnit\Framework\TestCase;
use TxTextControl\ReportingCloud\Exception\InvalidArgumentException;
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

    public function testItInitializesReportingCloudUsingApiKey()
    {
        $container = new ServiceManager();
        $container->setService('Config', [
            'reportingcloud' => [
                'credentials' => [
                    'api_key' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                ],
            ],
        ]);
        $reportingCloud = $this->factory->__invoke($container, '');
        $this->assertInstanceOf(ReportingCloud::class, $reportingCloud);
    }

    public function testItInitializesReportingCloudUsingUsernameAndPassword()
    {
        $container = new ServiceManager();
        $container->setService('Config', [
            'reportingcloud' => [
                'credentials' => [
                    'username' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                    'password' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                ],
            ],
        ]);
        $reportingCloud = $this->factory->__invoke($container, '');
        $this->assertInstanceOf(ReportingCloud::class, $reportingCloud);
    }

    public function testItRaisesExceptionIfConfigNotInContainer()
    {
        try {
            $container = new ServiceManager();
            $this->factory->__invoke($container, '');
        } catch (ServiceNotFoundException $e) {
            $this->assertContains('Unable to resolve service "Config" to a factory', $e->getMessage());
        }
    }

    public function testItRaisesExceptionIfConfigInContainerIsIncomplete1()
    {
        try {
            $container = new ServiceManager();
            $container->setService('Config', []);
            $this->factory->__invoke($container, '');
        } catch (InvalidArgumentException $e) {
            $needle = "The key 'reportingcloud' has not been specified in your application's configuration file.";
            $this->assertContains($needle, $e->getMessage());
        }
    }

    public function testItRaisesExceptionIfConfigInContainerIsIncomplete2()
    {
        try {
            $container = new ServiceManager();
            $container->setService('Config', [
                'reportingcloud' => [],
            ]);
            $this->factory->__invoke($container, '');
        } catch (InvalidArgumentException $e) {
            $needle = "The key 'credentials' has not been specified under the key ";
            $needle .= "'reportingcloud' in your application's configuration file.";
            $this->assertContains($needle, $e->getMessage());
        }
    }

    public function testItRaisesExceptionIfConfigInContainerIsIncomplete3()
    {
        try {
            $container = new ServiceManager();
            $container->setService('Config', [
                'reportingcloud' => [
                    'credentials' => [],
                ],
            ]);
            $this->factory->__invoke($container, '');
        } catch (InvalidArgumentException $e) {
            $needle = "Neither the key 'api_key', nor the keys 'username' and 'password' have been specified";
            $this->assertContains($needle, $e->getMessage());
        }
    }

    public function testItRaisesExceptionIfConfigInContainerIsIncomplete4()
    {
        try {
            $container = new ServiceManager();
            $container->setService('Config', [
                'reportingcloud' => [
                    'credentials' => [
                        'username' => '',
                    ],
                ],
            ]);
            $this->factory->__invoke($container, '');
        } catch (InvalidArgumentException $e) {
            $needle = "Neither the key 'api_key', nor the keys 'username' and 'password' have been specified";
            $this->assertContains($needle, $e->getMessage());
        }
    }

    public function testItRaisesExceptionIfConfigInContainerIsIncomplete5()
    {
        try {
            $container = new ServiceManager();
            $container->setService('Config', [
                'reportingcloud' => [
                    'credentials' => [
                        'password' => '',
                    ],
                ],
            ]);
            $this->factory->__invoke($container, '');
        } catch (InvalidArgumentException $e) {
            $needle = "Neither the key 'api_key', nor the keys 'username' and 'password' have been specified";
            $this->assertContains($needle, $e->getMessage());
        }
    }

    public function testItIsRegisteredInServiceFactory()
    {
        $serviceManager = ServiceManagerFactory::getServiceManager();

        $this->assertTrue($serviceManager->has('ReportingCloud'));
    }

    protected function setUp()
    {
        $this->factory = new ReportingCloudFactory();
    }
}
