<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Client;

use Gpupo\ShippingServices\Entity\Ect\Sro\HistoryCollection;

class EctClient extends AbstractSoap implements ClientInterface
{
    const ENDPOINT = 'https://webservice.correios.com.br/service/rastro/Rastro.wsdl';

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

    private function getTransportOptions(): array
    {
        return [
            'wsdl' => $this::ENDPOINT,
            'soap_version' => SOAP_1_1,
        ];
    }
}
