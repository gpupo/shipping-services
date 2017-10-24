<?php

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
 */

namespace Gpupo\Tests\ShippingServices\Entity\Ect\Sro\Evento;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\ShippingServices\TestCaseAbstract;

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
     * @test
     */
    public function getSchema(Item $item)
    {
        $this->assertInternalType('array', $item->getSchema());
    }

    /**
     * @testdox Possui método ``getTipo()`` para acessar Tipo
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getTipo(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('tipo', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setTipo()`` que define Tipo
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setTipo(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('tipo', 'string', $item);
    }

    /**
     * @testdox Possui método ``getStatus()`` para acessar Status
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getterStatus(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('status', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setStatus()`` que define Status
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setterStatus(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('status', 'string', $item);
    }

    /**
     * @testdox Possui método ``getData()`` para acessar Data
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getData(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('data', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setData()`` que define Data
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setData(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('data', 'string', $item);
    }

    /**
     * @testdox Possui método ``getHora()`` para acessar Hora
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getHora(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('hora', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setHora()`` que define Hora
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setHora(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('hora', 'string', $item);
    }

    /**
     * @testdox Possui método ``getDescricao()`` para acessar Descricao
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDescricao(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('descricao', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setDescricao()`` que define Descricao
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setDescricao(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('descricao', 'string', $item);
    }

    /**
     * @testdox Possui método ``getRecebedor()`` para acessar Recebedor
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getRecebedor(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('recebedor', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setRecebedor()`` que define Recebedor
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setRecebedor(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('recebedor', 'string', $item);
    }

    /**
     * @testdox Possui método ``getDocumento()`` para acessar Documento
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDocumento(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('documento', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setDocumento()`` que define Documento
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setDocumento(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('documento', 'string', $item);
    }

    /**
     * @testdox Possui método ``getComentario()`` para acessar Comentario
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getComentario(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('comentario', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setComentario()`` que define Comentario
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setComentario(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('comentario', 'string', $item);
    }

    /**
     * @testdox Possui método ``getLocal()`` para acessar Local
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getLocal(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('local', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setLocal()`` que define Local
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setLocal(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('local', 'string', $item);
    }

    /**
     * @testdox Possui método ``getCodigo()`` para acessar Codigo
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getCodigo(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('codigo', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setCodigo()`` que define Codigo
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setCodigo(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('codigo', 'string', $item);
    }

    /**
     * @testdox Possui método ``getCidade()`` para acessar Cidade
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getCidade(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('cidade', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setCidade()`` que define Cidade
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setCidade(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('cidade', 'string', $item);
    }

    /**
     * @testdox Possui método ``getUf()`` para acessar Uf
     * @dataProvider dataProviderItem
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getUf(Item $item, $expected = null)
    {
        $this->assertSchemaGetter('uf', 'string', $item, $expected);
    }

    /**
     * @testdox Possui método ``setUf()`` que define Uf
     * @dataProvider dataProviderItem
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setUf(Item $item, $expected = null)
    {
        $this->assertSchemaSetter('uf', 'string', $item);
    }
}
