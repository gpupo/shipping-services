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

use Gpupo\ShippingServices\Client\EctClient;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Gpupo\CommonSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Gpupo\CommonSdk\Traits\ResourcesTrait;
use Gpupo\Common\Traits\TableTrait;

final class EctCommand extends AbstractCommand
{
    use ResourcesTrait;
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('ect:sro:history')
            ->setDescription('Historico de um ou mais objetos')
            ->addArgument('filename', InputArgument::REQUIRED, 'A file with a SRO list');
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        $data = $this->resourceDecodeJsonFile($filename);
        $objetos = $data['list'];
        $config = $this->getProjectData();
        $client = new EctClient($config);
        $historyCollection = $client->fetchHistoryCollection($objetos);

        foreach ($historyCollection as $h) {
            $this->displayTableResults($output, [$h->toLog()]);
            $this->displayTableResults($output, $h->getEvento()->toLog());
        }
    }






}
