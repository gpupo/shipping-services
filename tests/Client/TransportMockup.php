<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Tests\Client;

use Gpupo\ShippingServices\Client\Transport;
use Gpupo\ShippingServices\Client\TransportInterface;

class TransportMockup extends Transport implements TransportInterface
{
    public $response;

    public function __call($name, $arguments)
    {
        $this->soapInputHeaders = [];

        return $this->_preProcessResult(['return' => $this->response]);
    }
}
