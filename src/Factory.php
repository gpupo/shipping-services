<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices;

use Gpupo\CommonSdk\Entity\GenericManager;
use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\ShippingServices\Client\EctClient;
use Gpupo\ShippingServices\Entity\Ect\Sro\History;

/**
 * Construtor principal, extendido pelo Factory de MarkethubBundle.
 */
class Factory extends FactoryAbstract
{
    protected $name = 'shipping-services';

    public function setClient(?array $clientOptions = [])
    {
        $this->client = new EctClient($clientOptions, $this->getLogger(), $this->getSimpleCache());
    }

    public function getNamespace()
    {
        return  '\\'.__NAMESPACE__.'\Entity\\';
    }

    protected function getSchema(): array
    {
        return [
            'generic' => [
                'manager' => GenericManager::class,
            ],
            'history' => [
                'class' => History::class,
            ],
        ];
    }
}
