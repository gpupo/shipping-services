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

namespace Gpupo\ShippingServices\Entity\Ect\Sro;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\ShippingServices\Entity\AbstractMetadata;

final class HistoryCollection extends AbstractMetadata implements CollectionInterface
{
    /**
     * @codeCoverageIgnore
     */
    protected function getKey()
    {
        return 'objeto';
    }

    protected function factoryEntity(array $data)
    {
        return new History($data);
    }

    public function __construct($data = null)
    {
        $this->raw = $data;
        $this->factoryMetadata($data);
        $list = $this->dataPiece($this->getKey(), $data);

        if (2 > $data['qtd']) {
            $this->add($this->factoryEntity($list));
        } elseif (!empty($list)) {
            foreach ($list as $entityData) {
                $this->add($this->factoryEntity($entityData));
            }
        }
    }
}
