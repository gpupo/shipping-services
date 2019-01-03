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

namespace Gpupo\ShippingServices\Client;

use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;

final class Ect extends AbstractSoap implements ClientInterface
{
    /**
     * @return HistoryCollection
     */
    public function fetchHistoryCollection(array $list): HistoryCollection
    {
        $language = $this->getOptions()->get('ect.language', 'pt_BR');

        $params = [
            'usuario' => $this->getOptions()->get('ect.user'),
            'senha' => $this->getOptions()->get('ect.passwod'),
            'tipo' => 'L',
            'resultado' => 'T',
            'lingua' => ('EN' === $language) ? 102 : 101,
            'objetos' => $list,
        ];

        $response = $this->getTransport()->buscaeventoslista($params);

        return new HistoryCollection($this->convertResponseToArray($response));
    }

    protected function factoryTransport(): TransportInterface
    {
        $transport = new Transport();
        $transport->setOptions([
            'wsdl' => 'https://webservice.correios.com.br/service/rastro/Rastro.wsdl',
            'soap_version' => SOAP_1_1,
        ]);

        return $transport;
    }
}
