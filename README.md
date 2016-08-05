


# Shipping-services

Acesso a informações de pacotes remetidos no Brasil

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=shipping-services)



## Requisitos para uso

* PHP >= *5.6*
* [curl extension](http://php.net/manual/en/intro.curl.php)
* [Composer Dependency Manager](http://getcomposer.org)

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



---

## Indicadores de qualidade

[![Build Status](https://secure.travis-ci.org/gpupo/shipping-services.png?branch=master)](http://travis-ci.org/gpupo/shipping-services)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/shipping-services/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/shipping-services/?branch=master)
[![Code Climate](https://codeclimate.com/github/gpupo/shipping-services/badges/gpa.svg)](https://codeclimate.com/github/gpupo/shipping-services)
[![Test Coverage](https://codeclimate.com/github/gpupo/shipping-services/badges/coverage.svg)](https://codeclimate.com/github/gpupo/shipping-services/coverage)



---

## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/shipping-services/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/shipping-services/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/shipping-services/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](http://www.g1mr.com/)_



---

## Instalação

Adicione o pacote ``shipping-services`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/shipping-services


Acesso ao componente:

```php
<?php

use Gpupo\ShippingServices\Factory;
```






---

## Console

Lista de comandos disponíveis

```bash
$ ./vendor/bin/shipping-services
```

### Configurações

Você poder criar um arquivo chamado ``bin/.shipping-services.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando

```JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``bin/app.json.dist``



---

## Links

* [Shipping-services Composer Package](https://packagist.org/packages/gpupo/shipping-services) no packagist.org
* [Documentação Oficial](http://#)




* [Github Repository](https://github.com/gpupo/shipping-services/);
* [Bitbucket Repository](https://bitbucket.org/gpupo/shipping-services/);



---

## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/shipping-services.git
    cd shipping-services;
    ant;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!



*Dica*: Verifique os logs gerados em ``var/log/main.log``







---

## Propriedades dos objetos



Client\Ect
- [ ] ``fetchHistoryCollection()`` 
- [ ] ``factoryTransport()`` 

### ShippingServices\Console\Application


- [x] Append command

### ShippingServices\Entity\Ect\Sro\Evento\EventoCollection


- [x] ``factoryElement()`` 
- [x] ``getDestino()`` 

### ShippingServices\Entity\Ect\Sro\Evento\Item


- [x] ``getSchema()`` 
- [x] Possui método ``getTipo()`` para acessar Tipo 
- [x] Possui método ``setTipo()`` que define Tipo 
- [x] Possui método ``getStatus()`` para acessar Status 
- [x] Possui método ``setStatus()`` que define Status 
- [x] Possui método ``getData()`` para acessar Data 
- [x] Possui método ``setData()`` que define Data 
- [x] Possui método ``getHora()`` para acessar Hora 
- [x] Possui método ``setHora()`` que define Hora 
- [x] Possui método ``getDescricao()`` para acessar Descricao 
- [x] Possui método ``setDescricao()`` que define Descricao 
- [x] Possui método ``getRecebedor()`` para acessar Recebedor 
- [x] Possui método ``setRecebedor()`` que define Recebedor 
- [x] Possui método ``getDocumento()`` para acessar Documento 
- [x] Possui método ``setDocumento()`` que define Documento 
- [x] Possui método ``getComentario()`` para acessar Comentario 
- [x] Possui método ``setComentario()`` que define Comentario 
- [x] Possui método ``getLocal()`` para acessar Local 
- [x] Possui método ``setLocal()`` que define Local 
- [x] Possui método ``getCodigo()`` para acessar Codigo 
- [x] Possui método ``setCodigo()`` que define Codigo 
- [x] Possui método ``getCidade()`` para acessar Cidade 
- [x] Possui método ``setCidade()`` que define Cidade 
- [x] Possui método ``getUf()`` para acessar Uf 
- [x] Possui método ``setUf()`` que define Uf 

Gpupo\Entity\Ect\Sro\HistoryCollection


- [x] ``factoryElement()`` 





## Lista de dependências (libraries)

Name | Version | Description
-----|---------|------------------------------------------------------
codeclimate/php-test-reporter | v0.3.2 | PHP client for reporting test coverage to Code Climate
doctrine/instantiator | 1.0.5 | A small, lightweight utility to instantiate objects in PHP without invoking their constructors
gpupo/cache | 1.3.0 | Caching library that implements PSR-6
gpupo/common | 1.7.5 | Common Objects
gpupo/common-schema | 1.1.8 | Common schema
gpupo/common-sdk | 2.2.10 | Componente de uso comum entre SDKs para integração a partir de aplicações PHP com Restful webservices
guzzle/guzzle | v3.9.3 | PHP HTTP client. This library is deprecated in favor of https://packagist.org/packages/guzzlehttp/guzzle
monolog/monolog | 1.21.0 | Sends your logs to files, sockets, inboxes, databases and various web services
myclabs/deep-copy | 1.5.1 | Create deep copies (clones) of your objects
phpdocumentor/reflection-common | 1.0 | Common reflection classes used by phpdocumentor to reflect the code structure
phpdocumentor/reflection-docblock | 3.1.0 | With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information that is embedded in a DocBlock.
phpdocumentor/type-resolver | 0.2 | 
phpspec/prophecy | v1.6.1 | Highly opinionated mocking framework for PHP 5.3+
phpunit/php-code-coverage | 4.0.1 | Library that provides collection, processing, and rendering functionality for PHP code coverage information.
phpunit/php-file-iterator | 1.4.1 | FilterIterator implementation that filters files based on a list of suffixes.
phpunit/php-text-template | 1.2.1 | Simple template engine.
phpunit/php-timer | 1.0.8 | Utility class for timing
phpunit/php-token-stream | 1.4.8 | Wrapper around PHP's tokenizer extension.
phpunit/phpunit | 5.5.0 | The PHP Unit Testing framework.
phpunit/phpunit-mock-objects | 3.2.3 | Mock Object library for PHPUnit
psr/cache | 1.0.0 | Common interface for caching libraries
psr/log | 1.0.0 | Common interface for logging libraries
satooshi/php-coveralls | v1.0.1 | PHP client library for Coveralls API
sebastian/code-unit-reverse-lookup 1.0.0 | Looks up which function or method a line of code belongs to
sebastian/comparator | 1.2.0 | Provides the functionality to compare PHP values for equality
sebastian/diff | 1.4.1 | Diff implementation
sebastian/environment | 1.3.7 | Provides functionality to handle HHVM/PHP environments
sebastian/exporter | 1.2.2 | Provides the functionality to export PHP variables for visualization
sebastian/global-state | 1.1.1 | Snapshotting of global state
sebastian/object-enumerator | 1.0.0 | Traverses array structures and object graphs to enumerate all referenced objects
sebastian/peek-and-poke | dev-master a8295 | Proxy for accessing non-public attributes and methods of an object
sebastian/recursion-context | 1.0.2 | Provides functionality to recursively process PHP variables
sebastian/resource-operations | 1.0.0 | Provides a list of PHP built-in functions that operate on resources
sebastian/version | 2.0.0 | Library that helps with managing the version number of Git-hosted PHP projects
symfony/config | v3.1.3 | Symfony Config Component
symfony/console | v3.1.3 | Symfony Console Component
symfony/event-dispatcher | v2.8.9 | Symfony EventDispatcher Component
symfony/filesystem | v3.1.3 | Symfony Filesystem Component
symfony/polyfill-mbstring | v1.2.0 | Symfony polyfill for the Mbstring extension
symfony/stopwatch | v3.1.3 | Symfony Stopwatch Component
symfony/yaml | v3.1.3 | Symfony Yaml Component
twig/twig | v1.24.1 | Twig, the flexible, fast, and secure template language for PHP
webmozart/assert | 1.0.2 | Assertions to validate method input/output with nice error messages.






