<?php

namespace TxTextControl\ReportingCloudZf3Module\Mvc\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ReportingCloudFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $reportingCloud = $container->get('ReportingCloud');

        return new ReportingCloud($reportingCloud);
    }
}