<?php

namespace TxTextControl\ReportingCloud\View\Helper;

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
