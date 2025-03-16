# Alarm System

## Descrição

O Alarm System é um sistema para cadastro e manipulação de alarmes relacionados a equipamentos industriais. Permite o gerenciamento completo dos alarmes e seus estados, fornecendo recursos como ordenação, filtragem e registro de ações.

## Tecnologias Utilizadas

-   Backend: PHP

-   Frontend: Bootstrap, JavaScript

-   Banco de Dados: MySQL

-   Bibliotecas: PHPMailer (para envio de e-mails)

## Funcionalidades

Equipamentos (CRUD)

-   Cadastro de novos equipamentos.

-   Listagem de equipamentos.

-   Edição de equipamentos existentes.

-   Remoção de equipamentos.

Alarmes (CRUD)

-   Cadastro de alarmes vinculados aos equipamentos.

-   Listagem de alarmes cadastrados.

-   Edição de informações do alarme.

-   Exclusão de alarmes.

## Manipulação de Alarmes

-   Ativar e desativar alarmes.

*   Um alarme já ativado não pode ser ativado novamente.

*   Um alarme desativado não pode ser desativado novamente.

*   Alarmes classificados como urgentes disparam um e-mail para "abcd@abc.com.br" ao serem ativados.

-   Verificação dos alarmes atuados.

*   Listagem de alarmes atuados.

*   Ordenação dos alarmes por colunas.

*   Filtro por descrição do alarme.

*   Exibição dos 3 alarmes mais frequentes.

-   Registro de Ações

*   Todas as ações do sistema são registradas para auditoria.

## Telas do Sistema

-   Login: Acesso ao sistema.

-   Cadastro de Usuário: Registra novos usuários.

-   Equipamentos: Gerenciamento de equipamentos.

-   Alarmes: Gerenciamento de alarmes.

-   Alarmes Atuados: Monitoramento de alarmes ativados.

## Modelagem de Dados

-   Equipamentos

*   Nome do equipamento

*   Número de Série

*   Tipo (Tensão, Corrente e Óleo)

*   Data de cadastro

-   Alarmes

*   Descrição do alarme

*   Classificação (Urgente, Emergente e Ordinário)

*   Equipamento relacionado

*   Data de cadastro

-   Alarmes Atuados

*   Data da entrada

*   Data da saída

*   Status do alarme

*   Descrição do alarme

*   Descrição do equipamento

## Requisitos

PHP 8+

MySQL 5.7+

Servidor Apache/Nginx

Composer (para gerenciar dependências PHP)

Node.js (para desenvolvimento frontend, se necessário)

## Instalação

-   Clone o repositório:

```bash
  git clone https://github.com/seu-repositorio/alarm-system.git
```

-   Configure o banco de dados MySQL e importe o arquivo database.sql.

-   Configure as variáveis de ambiente no arquivo .env.

-   Instale as dependências:

```bash
  composer install
```

Inicie o servidor:

```bash
  php -S localhost:8000
```

Acesse http://localhost:8000 no navegador.

## Observações

O sistema foi desenvolvido sem o uso excessivo de scaffolding para demonstrar o conhecimento em estruturação de código.

Foi priorizada a clareza e manutenção do sistema.

## Autor

Desenvolvido por Tiago Garbi Baganha.
