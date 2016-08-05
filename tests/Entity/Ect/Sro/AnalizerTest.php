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

namespace Gpupo\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Analizer
 */
class AnalizerTest extends TestCaseAbstract
{
    public function dataProviderAnalizer()
    {
        $data = [];
        $oTrue = new History($this->getResourceJson('fixtures/Ect/Sro/history.delivered.json'));
        $data[] = [$oTrue, [
            'delivered' => true,
            'lastEvent' => [
                'tipo'      => 'BDE',
                'status'    => '01',
                'data'      => '05/08/2016',
                'hora'      => '12:48',
                'descricao' => 'Delivered',
                'local'     => 'CDD EMBU',
                'codigo'    => '06803970',
                'cidade'    => 'Embu Das Artes',
                'uf'        => 'SP',
            ],
        ]];

        $oFalse = new History($this->getResourceJson('fixtures/Ect/Sro/history.incomplete.json'));
        $data[] = [$oFalse, [
            'delivered' => false,
            'lastEvent' => [
                'tipo'      => 'DO',
                'status'    => '01',
                'data'      => '04/08/2016',
                'hora'      => '21:39',
                'descricao' => 'Forwarded ',
                'local'     => 'CTE CURITIBA',
                'codigo'    => '80237970',
                'cidade'    => 'Curitiba',
                'uf'        => 'PR',
                'destino'   => [
                    'local'  => 'CTE JAGUARE',
                    'codigo' => '05314979',
                    'cidade' => 'Sao Paulo',
                    'bairro' => 'Vila Leopoldina',
                    'uf'     => 'SP',
                ],
            ],
        ]];

        return $data;
    }

    /**
     * @testdox ``getLastEvent()``
     * @cover ::getLastEvent
     * @dataProvider dataProviderAnalizer
     * @test
     */
    public function getLastEvent(History $history, $expected)
    {
        $ex = $expected['lastEvent'];
        $le = $history->factoryAnalizer()->getLastEvent();
        $this->assertSame($ex['tipo'], $le->getTipo());
        $this->assertSame($ex['status'], $le->getStatus());
        $this->assertSame($ex['data'], $le->getData());
        $this->assertSame($ex['hora'], $le->getHora());
        $this->assertSame($ex['descricao'], $le->getDescricao());
        $this->assertSame($ex['local'], $le->getLocal());
        $this->assertSame($ex['codigo'], $le->getCodigo());
        $this->assertSame($ex['cidade'], $le->getCidade());
        $this->assertSame($ex['uf'], $le->getUf());
    }

    /**
     * @testdox ``isDelivered()``
     * @cover ::isDelivered
     * @dataProvider dataProviderAnalizer
     * @test
     */
    public function isDelivered(History $history, $expected)
    {
        $this->assertSame($expected['delivered'], $history->factoryAnalizer()->isDelivered());
    }
}
