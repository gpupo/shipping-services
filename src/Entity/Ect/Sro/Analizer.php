<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Entity\Ect\Sro;

use Gpupo\ShippingServices\Entity\Ect\Sro\Evento\Item;

final class Analizer
{
    private $container;

    public function __construct(History $history)
    {
        $this->container = $history;
    }

    public function getLastEvent()
    {
        $e = $this->container->getEvento()->first();

        if (!$e instanceof Item) {
            return new Item();
        }

        return $e;
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

    private function isOf(array $array)
    {
        if (\in_array($this->getLastEvent()->getTipo(), $array, true)) {
            return true;
        }

        return false;
    }

    private function is(array $tipo, array $status)
    {
        if (true !== $this->isOf($tipo)) {
            return false;
        }

        if (!\in_array((int) $this->getLastEvent()->getStatus(), $status, true)) {
            return false;
        }

        return true;
    }
}
