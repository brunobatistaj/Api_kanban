# Sistema de Gerenciamento de Produtos

Este é um sistema web para gerenciar produtos de estoque, desenvolvido em **PHP** utilizando **MongoDB** como banco de dados. O sistema possui interface moderna e responsiva com **Bootstrap 5**, incluindo funcionalidades de cadastro, edição, exclusão, listagem e visualização em **Kanban**.

---

## Funcionalidades

- Cadastro de produtos com informações:
  - Nome
  - Preço
  - Estoque
  - Tempo de entrega
  - Sazonalidade
  - Grupo
  - Status Kanban (A Fazer, Em Progresso, Concluído)
- Edição e exclusão de produtos
- Visualização em tabela responsiva
- Visualização em Kanban, com drag-and-drop:
  - Alteração do status do produto sem recarregar a página (AJAX)
  - Feedback visual de atualização
- Layout moderno e responsivo, inspirado em aplicativos dark theme
- Compatível com dispositivos móveis

---

## Tecnologias Utilizadas

- **Backend:** PHP 8.x
- **Banco de Dados:** MongoDB
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Design:** Tema escuro, responsivo, com Kanban interativo
- **Dependências:** 
  - MongoDB PHP Driver (`mongodb` extension)

---

## Estrutura do Projeto

api_gerenciador/
│
├─ config/
│ └─ database.php # Conexão com MongoDB
│
├─ controllers/
│ └─ ProdutoController.php # Lógica de controle de produtos
│
├─ models/
│ └─ ProdutoModel.php # Operações CRUD no MongoDB
│
├─ views/
│ ├─ layout.php # Layout base
│ ├─ listar.php # Lista de produtos
│ ├─ adicionar.php # Formulário de adição
│ ├─ editar.php # Formulário de edição
│ └─ kanban.php # Kanban do estoque
│
├─ index.php # Ponto de entrada
└─ README.md # Este arquivo


---

## Requisitos

- PHP 8.x ou superior
- Servidor web (Apache, Nginx, WAMP, XAMPP)
- MongoDB 5.x ou superior
- Extensão `mongodb` habilitada no PHP
- Acesso a internet para carregar **Bootstrap 5** e **Google Fonts** (ou você pode hospedar localmente)

---

## Instalação

1. Clone este repositório:
git clone https://github.com/seuusuario/api_gerenciador.git

2. Configure o MongoDB em config/database.php:
<?php
class Database {
    public static function conectar() {
        $uri = "mongodb://127.0.0.1:27017"; // ajuste conforme necessário
        return new MongoDB\Driver\Manager($uri);
    }
}
?>

3.Abra o projeto no navegador:http://localhost/api_gerenciador/index.php

## Uso

- Acesse index.php para listar todos os produtos.

- Clique em Adicionar Produto para cadastrar novos produtos.

- Clique em Editar ou Excluir nos produtos existentes.

- Acesse Kanban para arrastar produtos entre os estados: A Fazer, Em Progresso e Concluído.

## Observações

A atualização do Kanban é feita via AJAX, mas requer que o backend esteja corretamente configurado com MongoDB.
Para que o Kanban funcione, os produtos devem ter o campo kanban preenchido (a_fazer, progresso ou concluido).
Layout responsivo, compatível com desktops e dispositivos móveis.