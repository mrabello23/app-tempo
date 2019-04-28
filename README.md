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
