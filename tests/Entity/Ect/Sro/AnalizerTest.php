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

namespace Gpupo\ShippingServices\Tests\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Analizer
 */
class AnalizerTest extends TestCaseAbstract
{
    public function dataProviderAnalizer()
    {
        $data = [];

        //Entregue
        $data[] = [new History($this->getResourceJson('fixtures/Ect/Sro/history.delivered.json')), [
            'delivered' => true,
            'customerAction' => false,
            'lost' => false,
            'lastEvent' => [
                'tipo' => 'BDE',
                'status' => '01',
                'data' => '05/08/2016',
                'hora' => '12:48',
                'descricao' => 'Delivered',
                'local' => 'CDD EMBU',
                'codigo' => '06803970',
                'cidade' => 'Embu Das Artes',
                'uf' => 'SP',
            ],
        ]];

        //Andamento
        $data[] = [new History($this->getResourceJson('fixtures/Ect/Sro/history.incomplete.json')), [
            'delivered' => false,
            'customerAction' => false,
            'lost' => false,
            'lastEvent' => [
                'tipo' => 'DO',
                'status' => '01',
                'data' => '04/08/2016',
                'hora' => '21:39',
                'descricao' => 'Forwarded ',
                'local' => 'CTE CURITIBA',
                'codigo' => '80237970',
                'cidade' => 'Curitiba',
                'uf' => 'PR',
                'destino' => [
                    'local' => 'CTE JAGUARE',
                    'codigo' => '05314979',
                    'cidade' => 'Sao Paulo',
                    'bairro' => 'Vila Leopoldina',
                    'uf' => 'SP',
                ],
            ],
        ]];

        //Aguardando retirada
        $data[] = [new History($this->getResourceJson('fixtures/Ect/Sro/history.customerAction.json')), [
            'delivered' => false,
            'customerAction' => true,
            'lost' => false,
            'lastEvent' => [
                'tipo' => 'LDI',
                'status' => '01',
                'data' => '15/06/2016',
                'hora' => '12:13',
                'descricao' => 'Objeto aguardando retirada no endereço indicado',
                'local' => 'CDD PARTENON',
                'codigo' => '90620971',
                'cidade' => 'PORTO ALEGRE',
                'uf' => 'RS',
            ],
        ]];

        //Objeto Roubado
        $data[] = [new History($this->getResourceJson('fixtures/Ect/Sro/history.lost.json')), [
            'delivered' => false,
            'customerAction' => false,
            'lost' => true,
            'lastEvent' => [
                'tipo' => 'BDE',
                'status' => '50',
                'data' => '04/08/2016',
                'hora' => '17:34',
                'descricao' => 'Objeto Roubado',
                'local' => 'AGF ANGELO',
                'codigo' => '80420982',
                'cidade' => 'Curitiba',
                'uf' => 'PR',
            ],
        ]];

        return $data;
    }

    /**
     * @testdox ``getLastEvent()``
     * @cover ::getLastEvent
     * @dataProvider dataProviderAnalizer
     *
     * @param mixed $expected
     */
    public function testGetLastEvent(History $history, $expected)
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
     *
     * @param mixed $expected
     */
    public function testIsDelivered(History $history, $expected)
    {
        $this->assertSame($expected['delivered'], $history->factoryAnalizer()->isDelivered());
    }

    /**
     * @testdox ``requireCustomerAction()``
     * @cover ::requireCustomerAction
     * @dataProvider dataProviderAnalizer
     *
     * @param mixed $expected
     */
    public function testRequireCustomerAction(History $history, $expected)
    {
        $this->assertSame($expected['customerAction'], $history->factoryAnalizer()->requireCustomerAction());
    }

    /**
     * @testdox ``isLost()``
     * @cover ::isLost
     * @dataProvider dataProviderAnalizer
     *
     * @param mixed $expected
     */
    public function testIsLost(History $history, $expected)
    {
        $this->assertSame($expected['lost'], $history->factoryAnalizer()->isLost());
    }
}
