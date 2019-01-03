---

## Instalação

Adicione o pacote ``shipping-services`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/shipping-services



```php
<?php

use Gpupo\ShippingServices\Client\EctClient;


$client = new Ect([
	''
]);

$objetos = [
	'foo',
	'bar',
];

$historyCollection = $client->fetchHistoryCollection($objetos);


```
