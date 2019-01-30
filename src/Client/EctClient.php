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

class EctClient extends AbstractSoap implements ClientInterface
{
    const ENDPOINT = 'https://webservice.correios.com.br/service/rastro/Rastro.wsdl';

    private function getTransportOptions(): array
    {
        return [
            'wsdl' => $this::ENDPOINT,
            'soap_version' => SOAP_1_1,
        ];
    }

    public function fetchHistoryCollection(array $list): HistoryCollection
    {
        $language = $this->getOptions()->get('language', 'pt_BR');

        $params = [
            'usuario' => $this->getOptions()->get('user'),
            'senha' => $this->getOptions()->get('password'),
            'tipo' => 'L',
            'resultado' => 'T',
            'lingua' => ('EN' === $language) ? 102 : 101,
            'objetos' => $list,
        ];

        $this->log('info', 'Fetch History', $params);
        $transport = $this->getTransport();
        $response = $transport->buscaeventoslista($params);
        $data = $this->convertResponseToArray($response);
        $this->log('info', 'Response', $data);

        return new HistoryCollection($data);
    }

    protected function factoryTransport(): TransportInterface
    {
        $transport = new Transport();
        $this->log('info', 'Transpor Options', $this->getTransportOptions());
        $transport->setOptions($this->getTransportOptions());

        return $transport;
    }
}
