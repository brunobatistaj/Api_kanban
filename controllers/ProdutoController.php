<?php
require_once __DIR__ . "/../models/ProdutoModel.php";

class ProdutoController
{
    public function index()
    {
        $produtos = ProdutoModel::listar();
        require __DIR__ . "/../views/listar.php";
    }

    public function kanban()
    {
        $produtos = ProdutoModel::listar();
        require __DIR__ . "/../views/kanban.php";
    }

    public function moverKanban()
    {
        $id = $_POST['id'] ?? null;
        $novoStatus = $_POST['status'] ?? null;

        if (!$id || !$novoStatus) {
            echo json_encode(["erro" => "Dados incompletos"]);
            return;
        }

        $success = ProdutoModel::atualizarKanban($id, $novoStatus);

        if ($success) {
            echo json_encode(["sucesso" => true]);
        } else {
            echo json_encode(["erro" => "Não foi possível atualizar"]);
        }
    }

    public function criar()
    {
        require __DIR__ . "/../views/adicionar.php";
    }

    public function salvar()
    {
        ProdutoModel::salvar(
            $_POST["nome"],
            $_POST["preco"],
            $_POST["estoque"],
            $_POST["kanban"],
            $_POST["tempo_entrega"],
            $_POST["sazonalidade"],
            $_POST["grupo"]
        );

        header("Location: index.php");
    }

    public function editar()
    {
        $produto = ProdutoModel::buscar($_GET["id"]);
        require __DIR__ . "/../views/editar.php";
    }

    public function atualizar()
    {
        ProdutoModel::atualizar(
            $_POST["id"],
            $_POST["nome"],
            $_POST["preco"],
            $_POST["estoque"],
            $_POST["kanban"],
            $_POST["tempo_entrega"],
            $_POST["sazonalidade"],
            $_POST["grupo"]
        );

        header("Location: index.php");
    }

    public function excluir()
    {
        ProdutoModel::excluir($_GET["id"]);
        header("Location: index.php");
    }
}
