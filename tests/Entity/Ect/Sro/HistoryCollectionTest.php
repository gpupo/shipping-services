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

namespace Gpupo\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;

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
