<?php require "layout.php"; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Kanban do Estoque</h2>
        <a href="index.php" class="btn btn-secondary">← Voltar</a>
    </div>

    <div class="kanban-board">

        <?php
        $statusMap = [
            "a_fazer" => ["titulo" => "A Fazer", "cor" => "azul", "border" => "blue"],
            "progresso" => ["titulo" => "Em Progresso", "cor" => "amarelo", "border" => "yellow"],
            "concluido" => ["titulo" => "Concluído", "cor" => "verde", "border" => "green"]
        ];

        foreach ($statusMap as $status => $info):
        ?>
            <div class="kanban-column" data-status="<?= $status ?>">
                <h3 class="kanban-title <?= $info['cor'] ?>"><?= $info['titulo'] ?></h3>
                <?php foreach ($produtos as $p): ?>
                    <?php if (($p->kanban ?? "a_fazer") === $status): ?>
                        <div class="kanban-item <?= $info['border'] ?>" draggable="true" data-id="<?= (string)$p->_id ?>">
                            <?= htmlspecialchars($p->nome) ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<style>
    .kanban-board {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .kanban-column {
        background: #f5f7fa;
        padding: 15px;
        border-radius: 12px;
        width: 300px;
        min-height: 420px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        transition: background 0.2s;
    }

    .kanban-title {
        padding: 10px;
        border-radius: 6px;
        color: white;
        text-align: center;
        margin-bottom: 15px;
    }

    .azul {
        background: #0d6efd;
    }

    .amarelo {
        background: #ffc107;
        color: black;
    }

    .verde {
        background: #28a745;
    }

    .kanban-item {
        padding: 12px;
        background: white;
        border-radius: 8px;
        margin-bottom: 12px;
        font-weight: 500;
        cursor: grab;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        border-left: 8px solid;
    }

    .kanban-item.blue {
        border-color: #0d6efd;
    }

    .kanban-item.yellow {
        border-color: #ffc107;
    }

    .kanban-item.green {
        border-color: #28a745;
    }

    .kanban-item:active {
        opacity: 0.6;
        cursor: grabbing;
    }

    .kanban-column.drag-over {
        background: #e9f2ff;
        border: 2px dashed #0d6efd;
    }

    .highlight {
        animation: highlightAnim 0.8s forwards;
    }

    @keyframes highlightAnim {
        from {
            background: #fff3cd;
        }

        to {
            background: white;
        }
    }
</style>

<script>
    let draggedItem = null;

    document.querySelectorAll(".kanban-item").forEach(item => {
        item.addEventListener("dragstart", () => {
            draggedItem = item;
        });
    });

    document.querySelectorAll(".kanban-column").forEach(col => {

        col.addEventListener("dragover", e => {
            e.preventDefault();
            col.classList.add("drag-over");
        });
        col.addEventListener("dragleave", () => {
            col.classList.remove("drag-over");
        });

        col.addEventListener("drop", () => {
            col.classList.remove("drag-over");
            col.appendChild(draggedItem);

            let id = draggedItem.dataset.id;
            let status = col.dataset.status;

            fetch("index.php?action=moverKanban", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + id + "&status=" + status
                })
                .then(res => res.json())
                .then(data => {
                    if (data.sucesso) draggedItem.classList.add("highlight");
                    else alert("Erro ao atualizar Kanban");
                })
                .catch(err => console.error(err));
        });
    });
</script>