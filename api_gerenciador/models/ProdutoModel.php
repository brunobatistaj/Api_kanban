<?php
require_once __DIR__ . "/../config/database.php";

class ProdutoModel
{

    public static function listar()
    {
        $manager = Database::conectar();
        $query = new MongoDB\Driver\Query([]);
        $cursor = $manager->executeQuery("estoque.produtos", $query);
        return $cursor->toArray();
    }

    public static function salvar($nome, $preco, $estoque, $kanban, $tempo, $sazonalidade, $grupo)
    {
        $manager = Database::conectar();
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->insert([
            "nome" => $nome,
            "preco" => (float)$preco,
            "estoque" => (int)$estoque,
            "kanban" => $kanban ?? "a_fazer",
            "tempo_entrega" => $tempo,
            "sazonalidade" => $sazonalidade,
            "grupo" => $grupo
        ]);
        return $manager->executeBulkWrite("estoque.produtos", $bulk);
    }

    public static function atualizarKanban($id, $status)
    {
        $manager = Database::conectar();
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->update(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => ["kanban" => $status]],
            ["multi" => false, "upsert" => false]
        );
        $result = $manager->executeBulkWrite("estoque.produtos", $bulk);
        return $result->getModifiedCount() > 0;
    }

    public static function buscar($id)
    {
        $manager = Database::conectar();
        $query = new MongoDB\Driver\Query([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ]);

        $cursor = $manager->executeQuery("estoque.produtos", $query);
        $resultado = $cursor->toArray();

        return $resultado[0] ?? null; // Retorna o produto ou null se não existir
    }
    
    public static function atualizar($id, $nome, $preco, $estoque, $kanban, $tempo, $sazonalidade, $grupo)
    {
        $manager = Database::conectar();

        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->update(
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                "nome" => $nome,
                "preco" => (float)$preco,
                "estoque" => (int)$estoque,
                "kanban" => $kanban,
                "tempo_entrega" => $tempo,
                "sazonalidade" => $sazonalidade,
                "grupo" => $grupo
            ]],
            ["multi" => false, "upsert" => false]
        );

        $result = $manager->executeBulkWrite("estoque.produtos", $bulk);

        return $result->getModifiedCount() > 0;
    }


    public static function excluir($id)
    {
        $manager = Database::conectar();
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->delete(["_id" => new MongoDB\BSON\ObjectId($id)]);

        return $manager->executeBulkWrite("estoque.produtos", $bulk);
    }
}
