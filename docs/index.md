---
layout: default
---
# Shipping-services

Acesso a informações de pacotes remetidos no Brasil

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=shipping-services)

[![Build Status](https://secure.travis-ci.org/gpupo/shipping-services.png?branch=main)](http://travis-ci.org/gpupo/shipping-services)


## Requisitos para uso

- PHP *>=7.4*
- [Composer Dependency Manager](http://getcomposer.org)
- [PHP Curl extension](http://php.net/manual/en/intro.curl.php)
- PHP Soap extension


Este componente **não é uma aplicação Stand Alone** e seu objetivo é ser utilizado como biblioteca.
Sua implantação deve ser feita por desenvolvedores experientes.

**Isto não é um Plugin!**

As opções que funcionam no modo de comando apenas servem para depuração em modo de
desenvolvimento.

A documentação mais importante está nos testes unitários. Se você não consegue ler os testes unitários, eu recomendo que não utilize esta biblioteca.


## Direitos autorais e de licença

This project is licensed under the terms of the MIT license.

Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE)

Para a informação dos direitos autorais e de licença você deve ler o arquivo
de [licença](https://github.com/gpupo/common-sdk/blob/master/LICENSE) que é distribuído com este código-fonte.

### Resumo da licença

Exigido:

- Aviso de licença e direitos autorais

Permitido:

- Uso comercial
- Modificação
- Distribuição
- Sublicenciamento

Proibido:

- Responsabilidade Assegurada

## Instalação

Adicione o pacote ``shipping-services`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/shipping-services


Acesso ao componente:

```php

use Gpupo\ShippingServices\Factory;

$service = Factory::getInstance()->getClient();
$collection = $service->fetchHistoryCollection([
	"DU264805409BR",
	"DU264805390BR",
]);


```

## CLI

Para configuração de seu ambiente, crie o arquivo ``.env.local``. Ele Seguie a sintaxe do já existente arquivo ``.env`` e é utilizado para sobrepor valores default. O nome de usuário e a senha precisam ser configurados de acordo com suas credenciais.


Você pode exibir um histórico de objetos a partir da linha de comando:

	bin/shipping-services ect:sro:history Resources/fixtures/Ect/Sro/objetos.json
