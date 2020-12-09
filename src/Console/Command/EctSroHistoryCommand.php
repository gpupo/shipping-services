<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Console\Command;

use Gpupo\Common\Traits\TableTrait;
use Gpupo\CommonSdk\Console\Command\AbstractCommand;
use Gpupo\CommonSdk\Traits\ResourcesTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class EctSroHistoryCommand extends AbstractCommand
{
    use ResourcesTrait;
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('ect:sro:history')
            ->setDescription('Historico de um ou mais objetos')
            ->addArgument('filename', InputArgument::REQUIRED, 'A file with a SRO list');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        $data = $this->resourceDecodeJsonFile($filename);
        $objetos = $data['list'];
        $client = $this->getFactory()->getClient();
        $historyCollection = $client->fetchHistoryCollection($objetos);

        foreach ($historyCollection as $h) {
            $this->displayTableResults($output, [$h->toLog()]);

            if ('' === $h->getErro()) {
                $this->displayTableResults($output, $h->getEvento()->toLog());
            }
        }
    }
}
