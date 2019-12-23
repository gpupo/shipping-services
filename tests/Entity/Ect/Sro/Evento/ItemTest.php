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

namespace Gpupo\ShippingServices\Tests\Entity\Ect\Sro\Evento;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item
 */
class ItemTest extends TestCaseAbstract
{
    use EntityTrait;

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderItem
     */
    public function testGetSchema(Item $item)
    {
        $this->assertIsArray($item->getSchema());
    }

    /**
     * @testdox Possui método ``getTipo()`` para acessar Tipo
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetTipo(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('tipo', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setTipo()`` que define Tipo
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetTipo(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('tipo', 'string', $item);
    }

    /**
     * @testdox Possui método ``getStatus()`` para acessar Status
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetterStatus(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('status', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setStatus()`` que define Status
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetterStatus(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('status', 'string', $item);
    }

    /**
     * @testdox Possui método ``getData()`` para acessar Data
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetData(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('data', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setData()`` que define Data
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetData(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('data', 'string', $item);
    }

    /**
     * @testdox Possui método ``getHora()`` para acessar Hora
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetHora(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('hora', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setHora()`` que define Hora
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetHora(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('hora', 'string', $item);
    }

    /**
     * @testdox Possui método ``getDescricao()`` para acessar Descricao
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetDescricao(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('descricao', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setDescricao()`` que define Descricao
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetDescricao(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('descricao', 'string', $item);
    }

    /**
     * @testdox Possui método ``getRecebedor()`` para acessar Recebedor
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetRecebedor(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('recebedor', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setRecebedor()`` que define Recebedor
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetRecebedor(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('recebedor', 'string', $item);
    }

    /**
     * @testdox Possui método ``getDocumento()`` para acessar Documento
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetDocumento(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('documento', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setDocumento()`` que define Documento
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetDocumento(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('documento', 'string', $item);
    }

    /**
     * @testdox Possui método ``getComentario()`` para acessar Comentario
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetComentario(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('comentario', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setComentario()`` que define Comentario
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetComentario(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('comentario', 'string', $item);
    }

    /**
     * @testdox Possui método ``getLocal()`` para acessar Local
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetLocal(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('local', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setLocal()`` que define Local
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetLocal(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('local', 'string', $item);
    }

    /**
     * @testdox Possui método ``getCodigo()`` para acessar Codigo
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCodigo(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('codigo', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setCodigo()`` que define Codigo
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCodigo(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('codigo', 'string', $item);
    }

    /**
     * @testdox Possui método ``getCidade()`` para acessar Cidade
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCidade(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('cidade', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setCidade()`` que define Cidade
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCidade(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('cidade', 'string', $item);
    }

    /**
     * @testdox Possui método ``getUf()`` para acessar Uf
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetUf(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('uf', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setUf()`` que define Uf
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetUf(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('uf', 'string', $item);
    }
}
