<?php
require_once __DIR__ . "/../controllers/ProdutoController.php";


$controller = new ProdutoController();

$action = $_GET["action"] ?? "index";

switch ($action) {
    case "criar":
        $controller->criar();
        break;
    case "salvar":
        $controller->salvar();
        break;
    case "editar":
        $controller->editar();
        break;
    case "atualizar":
        $controller->atualizar();
        break;
    case "excluir":
        $controller->excluir();
        break;
    case "kanban":
        $controller->kanban();
        break;
    case "moverKanban":
        $controller->moverKanban();
        break;
    default:
        $controller->index();
        break;

}
