<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\CommonSdk\FactoryInterface;
use Gpupo\ShippingServices\Factory;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @codeCoverageIgnore
 */
final class Application extends AbstractApplication
{
    public function factorySdk(array $options, LoggerInterface $logger = null, CacheInterface $cache = null): FactoryInterface
    {
        return new Factory($options, $logger, $cache);
    }
}
