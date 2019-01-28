<?php
declare(strict_types=1);

namespace TxTextControl\ReportingCloud;

class Module
{
    public function getConfig()
    {
        $filename = dirname(__FILE__, 2) . '/config/module.config.php';

        return include $filename;
    }
}
