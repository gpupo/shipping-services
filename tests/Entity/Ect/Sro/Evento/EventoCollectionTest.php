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

namespace Gpupo\Tests\ShippingServices\Entity\Ect\Sro\Evento;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection
 */
class EventoCollectionTest extends TestCaseAbstract
{
    /**
     * @testdox ``factoryElement()``
     * @cover ::factoryElement
     * @dataProvider dataProviderEventoCollection
     * @test
     */
    public function factoryElement(EventoCollection $eventoCollection)
    {
        $this->assertInstanceof(Item::class, $eventoCollection->first());
    }

    /**
     * @testdox ``getDestino()``
     * @dataProvider dataProviderEventoCollection
     * @test
     */
    public function getDestino(EventoCollection $eventoCollection)
    {
        $this->assertInstanceof(Destino::class, $eventoCollection->first()->getDestino());
    }
}
