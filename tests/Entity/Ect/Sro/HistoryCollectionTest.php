<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Tests\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection
 */
class HistoryCollectionTest extends TestCaseAbstract
{
    /**
     * @testdox ``factoryElement()``
     * @cover ::factoryElement
     * @dataProvider dataProviderHistoryCollection
     */
    public function testFactoryElement(HistoryCollection $historyCollection)
    {
        $this->assertSame(25, $historyCollection->count());
        foreach ($historyCollection as $h) {
            $this->assertInstanceof(History::class, $h);
            $this->assertInstanceof(EventoCollection::class, $h->getEvento());
            $this->assertInstanceof(Item::class, $h->getEvento()->first());
        }
    }
}
