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

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\History
 */
class HistoryTest extends TestCaseAbstract
{
    use EntityTrait;

    /**
     * @testdox ``factoryElement()``
     * @cover ::factoryElement
     * @dataProvider dataProviderHistory
     */
    public function testFactoryElement(History $history)
    {
        $this->assertSame(6, $history->count());
    }

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderHistory
     */
    public function testGetSchema(History $history)
    {
        $this->assertInternalType('array', $history->getSchema());
    }

    /**
     * @testdox Possui método ``getNumero()`` para acessar Numero
     * @dataProvider dataProviderHistory
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetNumero(History $history, $expected = null)
    {
        $this->assertSchemaGetter('numero', 'string', $history, $expected);
    }

    /**
     * @testdox Possui método ``setNumero()`` que define Numero
     * @dataProvider dataProviderHistory
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetNumero(History $history, $expected = null)
    {
        $this->assertSchemaSetter('numero', 'string', $history);
    }

    /**
     * @testdox Possui método ``getSigla()`` para acessar Sigla
     * @dataProvider dataProviderHistory
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetSigla(History $history, $expected = null)
    {
        $this->assertSchemaGetter('sigla', 'string', $history, $expected);
    }

    /**
     * @testdox Possui método ``setSigla()`` que define Sigla
     * @dataProvider dataProviderHistory
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetSigla(History $history, $expected = null)
    {
        $this->assertSchemaSetter('sigla', 'string', $history);
    }

    /**
     * @testdox Possui método ``getNome()`` para acessar Nome
     * @dataProvider dataProviderHistory
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetNome(History $history, $expected = null)
    {
        $this->assertSchemaGetter('nome', 'string', $history, $expected);
    }

    /**
     * @testdox Possui método ``setNome()`` que define Nome
     * @dataProvider dataProviderHistory
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetNome(History $history, $expected = null)
    {
        $this->assertSchemaSetter('nome', 'string', $history);
    }

    /**
     * @testdox Possui método ``getCategoria()`` para acessar Categoria
     * @dataProvider dataProviderHistory
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCategoria(History $history, $expected = null)
    {
        $this->assertSchemaGetter('categoria', 'string', $history, $expected);
    }

    /**
     * @testdox Possui método ``setCategoria()`` que define Categoria
     * @dataProvider dataProviderHistory
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCategoria(History $history, $expected = null)
    {
        $this->assertSchemaSetter('categoria', 'string', $history);
    }

    /**
     * @testdox Possui método ``getEvento()`` para acessar Evento
     * @dataProvider dataProviderHistory
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetEvento(History $history, $expected = null)
    {
        $this->assertSchemaGetter('evento', 'object', $history, $expected);
    }
}
