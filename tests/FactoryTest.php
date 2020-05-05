<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Tests;

use Gpupo\CommonSdk\Tests\FactoryTestAbstract;
use Gpupo\ShippingServices\Client\ClientInterface;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Factory;

/**
 * @coversNothing
 */
class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\ShippingServices\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    /**
     * Dá acesso a ``Factory``.
     */
    public function testSetClient()
    {
        $factory = new Factory();

        $factory->setClient([
        ]);

        $this->assertInstanceOf(ClientInterface::class, $factory->getClient());
    }

    /**
     * Dá acesso ao ``Client``.
     */
    public function testGetClient()
    {
        $factory = new Factory();

        $this->assertInstanceOf(ClientInterface::class, $factory->getClient());
    }

    public function dataProviderObjetos()
    {
        return [
            [History::class, 'history', []],
        ];
    }
}
