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

namespace Gpupo\ShippingServices\Entity\Ect\Sro\Evento;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getLocal()                Acesso a local
 * @method        setLocal(string $local)   Define local
 * @method string getCodigo()               Acesso a codigo
 * @method        setCodigo(string $codigo) Define codigo
 * @method string getCidade()               Acesso a cidade
 * @method        setCidade(string $cidade) Define cidade
 * @method string getBairro()               Acesso a bairro
 * @method        setBairro(string $bairro) Define bairro
 * @method string getUf()                   Acesso a uf
 * @method        setUf(string $uf)         Define uf
 */
final class Destino extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return  [
            'local' => 'string',
            'codigo' => 'string',
            'cidade' => 'string',
            'bairro' => 'string',
            'uf' => 'string',
        ];
    }
}
