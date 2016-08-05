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

namespace Gpupo\Tests\ShippingServices;

use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return dirname(dirname(__FILE__)).'/Resources/';
    }

    protected function factoryHistoryCollection()
    {
        $data = $this->getResourceJson('fixtures/Ect/Sro/list.response.json');

        return new HistoryCollection($data);
    }

    protected function factoryHistory()
    {
        $data = $this->getResourceJson('fixtures/Ect/Sro/history.json');

        return new History($data);
    }

    /**
     * @return \Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection
     */
    public function dataProviderHistoryCollection()
    {
        return [[$this->factoryHistoryCollection()]];
    }

    /**
     * @return \Gpupo\ShippingServices\Entity\Ect\Sro\History
     */
    public function dataProviderHistory()
    {
        return [[$this->factoryHistory()]];
    }

    /**
     * @return \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection
     */
    public function dataProviderEventoCollection()
    {
        $data = [];
        foreach ($this->factoryHistoryCollection() as $h) {
            $data[] = [$h->getEvento()];
        }

        return $data;
    }

    /**
     * @return \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item
     */
    public function dataProviderItem()
    {
        $data = [];
        foreach ($this->factoryHistoryCollection() as $h) {
            foreach ($h->getEvento() as $i) {
                $data[] = [$i, $i->toArray()];
            }
            if (11 > count($data)) {
                break;
            }
        }

        return $data;
    }
}
