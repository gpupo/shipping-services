<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Client;

use Gpupo\CommonSdk\Client\BoardAbstract;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractSoap extends BoardAbstract
{
    protected $transport;

    public function setTransport(TransportInterface $transport): void
    {
        $this->transport = $transport;
    }

    /**
     * {@inheritdoc}
     *
     * @todo
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
    }

    protected function getTransport(): TransportInterface
    {
        if (empty($this->transport)) {
            $this->setTransport($this->factoryTransport());
        }

        return $this->transport;
    }

    /**
     * @param mixed $response
     */
    protected function convertResponseToArray($response): array
    {
        $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $parser = simplexml_load_string($xml);
        $array = json_decode(json_encode($parser), true);

        if (!\is_array($array) || !\array_key_exists('soapenvBody', (array) $array)) {
            throw new Exception('Response incomplete');
          }

        $data = current($array['soapenvBody']);

        return (array) $data['return'];
    }

    abstract protected function factoryTransport();
}
