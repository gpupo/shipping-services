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

use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;

final class Ect extends AbstractSoap
{
    /**
     * @return HistoryCollection
     */
    public function fetchHistoryCollection(array $list)
    {
        $params = [
            'usuario'   => $this->getOptions()->get('ect.user'),
            'senha'     => $this->getOptions()->get('ect.passwod'),
            'tipo'      => 'L',
            'resultado' => 'T',
            'lingua'    => '102',
            'objetos'   => $list,
        ];

        $response = $this->factoryTransport()->buscaeventoslista($params);

        return new HistoryCollection($this->convertResponseToArray($response));
    }

    protected function factoryTransport()
    {
        $transport = new Transport();
        $transport->setOptions([
            'wsdl'         => 'https://webservice.correios.com.br/service/rastro/Rastro.wsdl',
            'soap_version' => SOAP_1_1,
        ]);

        return $transport;
    }
}
