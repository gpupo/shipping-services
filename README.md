# Shipping-services

Acesso a informações de pacotes remetidos no Brasil

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=shipping-services)

[![Build Status](https://secure.travis-ci.org/gpupo/shipping-services.png?branch=master)](http://travis-ci.org/gpupo/shipping-services)


## Requisitos para uso


- PHP >= *7.2*
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


## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/shipping-services/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/shipping-services/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/shipping-services/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](https://opensource.gpupo.com/)_


---

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

Você pode exibir um histórico de objetos a partir da linha de comando:

	bin/shipping-services ect:sro:history --ect.user ECT.USER --ect.password ECT.PASSWORD --file Resources/fixtures/Ect/Sro/objetos.json
