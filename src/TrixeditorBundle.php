<?php

namespace MaricTrading\TrixeditorBundle;

use MaricTrading\TrixeditorBundle\DependencyInjection\TrixeditorExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TrixeditorBundle extends Bundle {

    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
