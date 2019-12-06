<?php
declare(strict_types=1);

namespace TxTextControl\ReportingCloud\Mvc\Controller\Plugin;

use Psr\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ReportingCloudFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ReportingCloud
    {
        $reportingCloud = $container->get('ReportingCloud');

        return new ReportingCloud($reportingCloud);
    }
}
