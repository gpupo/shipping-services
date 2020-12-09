<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/shipping-services created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\ShippingServices\Client;

class Transport implements TransportInterface
{
    const XML_BUSCAEVENTOS = <<<'EOF'
    <soapenv:Envelope 
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
        xmlns:res="http://resource.webservice.correios.com.br/">
        <soapenv:Header/> 
        <soapenv:Body>
            <res:buscaEventosLista>
                <usuario>%s</usuario>
                <senha>%s</senha>
                <tipo>%s</tipo>
                <resultado>%s</resultado>
                <lingua>%d</lingua>%s
            </res:buscaEventosLista> 
        </soapenv:Body>
    </soapenv:Envelope>
    EOF;
    
    protected array $options;

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
    
    public function buscaEventosListaAction(array $params): string
    {
        $objetosString = '';
        foreach($params['objetos'] as $objeto) {
            $objetosString .= sprintf("\n<objetos>%s</objetos>", $objeto);
        }
        
        $xml_post_string = sprintf(self::XML_BUSCAEVENTOS, $params['usuario'], $params['senha'], $params['tipo'], $params['resultado'], $params['lingua'], $objetosString);  

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => $this->options['wsdl'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$xml_post_string,
          CURLOPT_HTTPHEADER => [
            'Host: webservice.correios.com.br:80',
            'SOAPAction: buscaEventosLista',
            'Content-Type: text/xml; charset=UTF-8',
          ],
        ]);
        
        $response = curl_exec($curl);
        curl_close($curl);

        return $response ;
    }
}
