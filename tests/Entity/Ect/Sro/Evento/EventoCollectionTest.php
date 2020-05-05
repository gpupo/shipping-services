<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Tests\Entity\Ect\Sro\Evento;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection
 */
class EventoCollectionTest extends TestCaseAbstract
{
    /**
     * @testdox ``factoryElement()``
     * @cover ::factoryElement
     * @dataProvider dataProviderEventoCollection
     */
    public function testFactoryElement(EventoCollection $eventoCollection)
    {
        $this->assertInstanceof(Item::class, $eventoCollection->first());
    }

    /**
     * @testdox ``getDestino()``
     * @dataProvider dataProviderEventoCollection
     */
    public function testGetDestino(EventoCollection $eventoCollection)
    {
        $this->assertInstanceof(Destino::class, $eventoCollection->first()->getDestino());
    }
}
