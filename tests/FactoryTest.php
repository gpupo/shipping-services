<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\ShippingServices\Tests;

use Gpupo\ShippingServices\Client\ClientInterface;
use Gpupo\ShippingServices\Factory;
use Gpupo\CommonSdk\Tests\FactoryTestAbstract;

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
    }
}
