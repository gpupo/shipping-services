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

namespace Gpupo\ShippingServices\Tests\Client;

use Gpupo\ShippingServices\Client\EctClient;
use Gpupo\ShippingServices\Client\Transport;
use Gpupo\ShippingServices\Client\TransportInterface;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Client\Ect
 */
class EctClientTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\ShippingServices\Client\Ect
     */
    public function dataProviderEctClient()
    {
        return [[new EctClient()]];
    }

    /**
     * @testdox ``fetchHistoryCollection()``
     * @cover ::fetchHistoryCollection
     * @dataProvider dataProviderEctClient
     */
    public function testFetchHistoryCollection(EctClient $object)
    {
        $ect = $this->proxy($object);
        $transport = new TransportMockup();
        $transport->response = $this->getResourceJson('fixtures/Ect/Sro/list.response.json');
        $ect->setTransport($transport);
        $this->assertInstanceOf(HistoryCollection::class, $ect->fetchHistoryCollection([]));
    }

    /**
     * @dataProvider dataProviderEctClient
     */
    public function testFetchHistoryCollectionNotFound(EctClient $object)
    {
        $ect = $this->proxy($object);
        $transport = new TransportMockup();
        $transport->response = $this->getResourceJson('fixtures/Ect/Sro/not-found.response.json');
        $ect->setTransport($transport);

        $collection = $ect->fetchHistoryCollection([]);
        $this->assertInstanceOf(HistoryCollection::class, $collection);
        $this->assertSame('DU264805409BR', $collection->first()->getNumero());
        $this->assertSame('Objeto não encontrado na base de dados dos Correios.', $collection->first()->getErro());
    }

    /**
     * @testdox ``factoryTransport()``
     * @cover ::factoryTransport
     * @dataProvider dataProviderEctClient
     */
    public function testFactoryTransport(EctClient $object)
    {
        $ect = $this->proxy($object);
        $transport = $ect->factoryTransport();
        $this->assertInstanceOf(Transport::class, $transport);
        $this->assertInstanceOf(TransportInterface::class, $transport);
    }
}
