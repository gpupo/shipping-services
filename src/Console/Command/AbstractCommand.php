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

namespace Gpupo\ShippingServices\Console\Command;

use Gpupo\ShippingServices\Console\Application;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCommand
{
    protected $list = ['main'];

    protected $app;

    public function append(Application $app)
    {
        $this->app = $app;

        foreach ($this->list as $i) {
            $this->{$i}($this->getApp());
        }

        return $this->getApp();
    }

    protected function getApp()
    {
        return $this->app;
    }
}
