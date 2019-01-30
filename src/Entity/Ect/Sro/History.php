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

namespace Gpupo\ShippingServices\Entity\Ect\Sro;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string                                                        getNumero()                                                                      Acesso a numero
 * @method                                                               setNumero(string $numero)                                                        Define numero
 * @method string                                                        getSigla()                                                                       Acesso a sigla
 * @method                                                               setSigla(string $sigla)                                                          Define sigla
 * @method string                                                        getNome()                                                                        Acesso a nome
 * @method                                                               setNome(string $nome)                                                            Define nome
 * @method string                                                        getCategoria()                                                                   Acesso a categoria
 * @method                                                               setCategoria(string $categoria)                                                  Define categoria
 * @method Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection getEvento()                                                                      Acesso a evento
 * @method                                                               setEvento(Gpupo\ShippingServices\Entity\Ect\Sro\Evento\EventoCollection $evento) Define evento
 */
final class History extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema():array
    {
        return  [
            'numero' => 'string',
            'sigla' => 'string',
            'nome' => 'string',
            'categoria' => 'string',
            'evento' => 'object',
        ];
    }

    public function toLog():array
    {
        $array = $this->partitionByArrayKey([
            'numero',
            'sigla',
            'nome',
            'catedoria',
        ]);
        $analizer = $this->factoryAnalizer();

        $f = function ($method) use ($analizer) {
            return (true === $analizer->{$method}()) ? 'yes' : 'no';
        };

        $array['delivered'] = $f('isDelivered');
        $array['require_customer_action'] = $f('requireCustomerAction');
        $array['lost'] = $f('isLost');

        return $array;
    }

    public function factoryAnalizer()
    {
        return new Analizer($this);
    }
}
