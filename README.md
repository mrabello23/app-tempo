# Teste App Tempo

## Requisitos
- Docker instalado

## Rodar com Docker
- clonar projeto
- navegar até pasta raiz do projeto via bash
- executar: docker-compose build
- executar: docker-compose up -d (aguardar 5 minutos para os scripts de configuração finalizarem a execução)

## Testes unitários
- Acessar pasta da aplicação via bash
- Na raiz do projeto, executar o comando "vendor/bin/phpunit" para rodar a suite de teste

## Observações Importantes
- Projeto estará acessível via browser / bash somente após finalizada instalação e/ou atualização das dependências do framework
- Para acessar qualquer container iniciado no modo interativo devemos usar comando "docker exec -it NOME_OU_ID_CONTAINER bash"
- Para execução do modo interativo via bash existe uma limitação em ambiente Windows ("cannot enable tty mode on non tty input"), que força o camando ser iniciado com "winpty" ficando desta forma: "winpty docker exec -it NOME_OU_ID_CONTAINER bash"


## Arquitetura e Design
- Foi escolhido para este projeto a linguagem PHP versão 7.2, pois é a tecnologia que tenho a maior experiência e facilidade em trabalhar para backend;
- Foi escolhido o Framework PHP Laravel versão 5.8 por ser bem completo em questão de recursos e patterns para auxiliar a implementação de projeto web;
- Para o front-end decidi usar Bootstrap versão 4.0 e template Blade que vem junto com o framework Laravel;
- Para o banco de dados optei pelo mysql versão 5.7 por sua facilidade e boa compatibilidade com a linguagem do backend;
- Fiz alguns testes unitários simples para garantir que as partes importantes para o funcionamento do projeto estejam em conformidade com as epecificações;
- Projeto foi implementado com arquitetura em camadas e padrão MVC que vem implementado no framework;
