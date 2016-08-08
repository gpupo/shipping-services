<?php

/*
 * This file is part of gpupo/shipping-services
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Client;

use Gpupo\ShippingServices\Client\Ect;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;

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
     * @test
     */
    public function fetchHistoryCollection(Ect $ect)
    {
        $this->markIncomplete('fetchHistoryCollection() need implementation!');
    }

    /**
     * @testdox ``factoryTransport()``
     * @cover ::factoryTransport
     * @dataProvider dataProviderEct
     * @test
     */
    public function factoryTransport(Ect $ect)
    {
        $url = 'Resources/fixtures/Ect/Sro/Soap/Rastro.wsdl';
        $soapClientMock = $this->getMockFromWsdl($url, 'Foo', 'Client');
        $soapClientMock
        ->method('buscaeventoslista')
        ->willReturn(true);

        $this->markIncomplete('factoryTransport() need implementation!');
    }
}
