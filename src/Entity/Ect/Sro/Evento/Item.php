<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Entity\Ect\Sro\Evento;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getTipo()                         Acesso a tipo
 * @method        setTipo(string $tipo)             Define tipo
 * @method string getStatus()                       Acesso a status
 * @method        setStatus(string $status)         Define status
 * @method string getData()                         Acesso a data
 * @method        setData(string $data)             Define data
 * @method string getHora()                         Acesso a hora
 * @method        setHora(string $hora)             Define hora
 * @method string getDescricao()                    Acesso a descricao
 * @method        setDescricao(string $descricao)   Define descricao
 * @method string getRecebedor()                    Acesso a recebedor
 * @method        setRecebedor(string $recebedor)   Define recebedor
 * @method string getDocumento()                    Acesso a documento
 * @method        setDocumento(string $documento)   Define documento
 * @method string getComentario()                   Acesso a comentario
 * @method        setComentario(string $comentario) Define comentario
 * @method string getLocal()                        Acesso a local
 * @method        setLocal(string $local)           Define local
 * @method string getCodigo()                       Acesso a codigo
 * @method        setCodigo(string $codigo)         Define codigo
 * @method string getCidade()                       Acesso a cidade
 * @method        setCidade(string $cidade)         Define cidade
 * @method string getUf()                           Acesso a uf
 * @method        setUf(string $uf)                 Define uf
 */
final class Item extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'tipo' => 'string',
            'status' => 'string',
            'data' => 'string',
            'hora' => 'string',
            'descricao' => 'string',
            'recebedor' => 'string',
            'documento' => 'string',
            'comentario' => 'string',
            'local' => 'string',
            'codigo' => 'string',
            'cidade' => 'string',
            'uf' => 'string',
            'destino' => 'object',
        ];
    }

    public function toLog(): array
    {
        return $this->partitionByArrayKey([
            'tipo',
            'status',
            'descricao',
            'local',
            'codigo',
            'cidade',
            'uf',
        ]);
    }
}
