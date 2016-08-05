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
        return $this->container->getEvento()->first();
    }

    public function isDelivered()
    {
        $le = $this->getLastEvent();

        if (in_array($le->getTipo(), ['BDE', 'BDI', 'BDR'], true)) {
            return true;
        }

        return false;
    }
}
