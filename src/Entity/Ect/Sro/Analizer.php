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

namespace Gpupo\ShippingServices\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;

/**
 */
final class Analizer
{
    private $container;

    public function __construct(History $history)
    {
        $this->container = $history;
    }

    public function getLastEvent()
    {
        $e =  $this->container->getEvento()->first();

        if (!$e instanceof Item) {
            return new Item();
        }

        return $e;
    }

    protected function isOf(array $array)
    {
        if (in_array($this->getLastEvent()->getTipo(), $array, true)) {
            return true;
        }

        return false;
    }

    protected function is(array $tipo, array $status)
    {
        if (true !== $this->isOf($tipo)) {
            return false;
        }

        if (!in_array((int) $this->getLastEvent()->getStatus(), $status, true)) {
            return false;
        }

        return true;
    }

    public function isDelivered()
    {
        return $this->is(['BDE', 'BDI', 'BDR'], [1]);
    }

    public function requireCustomerAction()
    {
        return $this->isOf(['LDI']);
    }

    public function isLost()
    {
        return $this->is(['BDE', 'BDI', 'BDR'], [50, 52, 52]);
    }
}
