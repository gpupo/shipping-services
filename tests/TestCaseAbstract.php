<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Tests;

use Gpupo\CommonSdk\Tests\TestCaseAbstract as CommonSdkTestCaseAbstract;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return \dirname(__DIR__).'/Resources/';
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
        $h = $this->factoryHistory();

        return [[$h, $this->getResourceJson('fixtures/Ect/Sro/history.json')]];
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
            if (11 > \count($data)) {
                break;
            }
        }

        return $data;
    }

    /**
     * @return \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino
     */
    public function dataProviderDestino()
    {
        $data = [
            'local' => 'CDD EMBU',
            'codigo' => '06803970',
            'cidade' => 'Embu Das Artes',
            'bairro' => 'Centro',
            'uf' => 'SP',
        ];

        return [[new Destino($data), $data]];
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
}
