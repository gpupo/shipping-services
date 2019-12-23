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
        $array = json_decode(json_encode($response), true);

        if (!\is_array($array) || !\array_key_exists('return', (array) $array)) {
            throw new Exception('Response incomplete');
        }

        return (array) $array['return'];
    }

    abstract protected function factoryTransport();
}
