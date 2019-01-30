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
use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino;
use Gpupo\ShippingServices\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Destino
 */
class DestinoTest extends TestCaseAbstract
{
    use EntityTrait;

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderDestino
     */
    public function testGetSchema(Destino $destino)
    {
        $this->assertInternalType('array', $destino->getSchema());
    }

    /**
     * @testdox Possui método ``getLocal()`` para acessar Local
     * @dataProvider dataProviderDestino
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetLocal(Destino $destino, $expected = null)
    {
        $this->assertSchemaGetter('local', 'string', $destino, $expected);
    }

    /**
     * @testdox Possui método ``setLocal()`` que define Local
     * @dataProvider dataProviderDestino
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetLocal(Destino $destino, $expected = null)
    {
        $this->assertSchemaSetter('local', 'string', $destino);
    }

    /**
     * @testdox Possui método ``getCodigo()`` para acessar Codigo
     * @dataProvider dataProviderDestino
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCodigo(Destino $destino, $expected = null)
    {
        $this->assertSchemaGetter('codigo', 'string', $destino, $expected);
    }

    /**
     * @testdox Possui método ``setCodigo()`` que define Codigo
     * @dataProvider dataProviderDestino
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCodigo(Destino $destino, $expected = null)
    {
        $this->assertSchemaSetter('codigo', 'string', $destino);
    }

    /**
     * @testdox Possui método ``getCidade()`` para acessar Cidade
     * @dataProvider dataProviderDestino
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCidade(Destino $destino, $expected = null)
    {
        $this->assertSchemaGetter('cidade', 'string', $destino, $expected);
    }

    /**
     * @testdox Possui método ``setCidade()`` que define Cidade
     * @dataProvider dataProviderDestino
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCidade(Destino $destino, $expected = null)
    {
        $this->assertSchemaSetter('cidade', 'string', $destino);
    }

    /**
     * @testdox Possui método ``getBairro()`` para acessar Bairro
     * @dataProvider dataProviderDestino
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetBairro(Destino $destino, $expected = null)
    {
        $this->assertSchemaGetter('bairro', 'string', $destino, $expected);
    }

    /**
     * @testdox Possui método ``setBairro()`` que define Bairro
     * @dataProvider dataProviderDestino
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetBairro(Destino $destino, $expected = null)
    {
        $this->assertSchemaSetter('bairro', 'string', $destino);
    }

    /**
     * @testdox Possui método ``getUf()`` para acessar Uf
     * @dataProvider dataProviderDestino
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetUf(Destino $destino, $expected = null)
    {
        $this->assertSchemaGetter('uf', 'string', $destino, $expected);
    }

    /**
     * @testdox Possui método ``setUf()`` que define Uf
     * @dataProvider dataProviderDestino
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetUf(Destino $destino, $expected = null)
    {
        $this->assertSchemaSetter('uf', 'string', $destino);
    }
}
