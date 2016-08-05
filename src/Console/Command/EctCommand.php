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

namespace Gpupo\ShippingServices\Console\Command;

use Gpupo\ShippingServices\Client\Ect as Client;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class EctCommand extends AbstractCommand
{
    public function main($app)
    {
        $opts = [
            ['key' => 'ect.user'],
            ['key' => 'ect.password'],
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('ect:sro:history', 'Historico de um ou mais objetos', $opts)
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);
                $data = $app->jsonLoadFromFile($list['file']);
                $objetos = $data['list'];
                $client = new Client($list);
                $response = $client->fetchHistoryCollection($objetos);

                print_r($response);
            });
    }
}
