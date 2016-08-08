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

namespace Gpupo\ShippingServices\Client;

use Gpupo\CommonSdk\Client\BoardAbstract;

abstract class AbstractSoap extends BoardAbstract
{
    /**
     * @return arrray
     */
    protected function convertResponseToArray($response)
    {
        $array = json_decode(json_encode($response), true);

        if (!is_array($array) || !array_key_exists('return', (array) $array)) {
            throw new Exception('Response incomplete');
        }

        return (array) $array['return'];
    }

    abstract protected function factoryTransport();
}
