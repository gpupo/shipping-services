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

namespace Gpupo\Tests\ShippingServices\Client;

use Gpupo\ShippingServices\Client\Ect;
use Gpupo\ShippingServices\Client\Transport;
use Gpupo\ShippingServices\Client\TransportInterface;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Client\Ect
 */
class EctTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\ShippingServices\Client\Ect
     */
    public function dataProviderEct()
    {
        return [[new Ect()]];
    }

    /**
     * @testdox ``fetchHistoryCollection()``
     * @cover ::fetchHistoryCollection
     * @dataProvider dataProviderEct
     */
    public function testFetchHistoryCollection(Ect $object)
    {
        $ect = $this->proxy($object);
        $transport = new TransportMockup();
        $transport->response = $this->getResourceJson('fixtures/Ect/Sro/list.response.json');
        $ect->setTransport($transport);
        $this->assertInstanceOf(HistoryCollection::class, $ect->fetchHistoryCollection([]));
    }
    /**
     * @testdox ``factoryTransport()``
     * @cover ::factoryTransport
     * @dataProvider dataProviderEct
     */
    public function testFactoryTransport(Ect $object)
    {
        $ect = $this->proxy($object);
        $transport = $ect->factoryTransport();
        $this->assertInstanceOf(Transport::class, $transport);
        $this->assertInstanceOf(TransportInterface::class, $transport);
    }
}
