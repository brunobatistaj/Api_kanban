<?php require "layout.php"; ?>

<div class="text-center mb-4">
    <h2 class="fw-bold">Gestão de Estoque</h2>
    <p class="text-muted">Controle moderno com Kanban, sazonalidade e mais.</p>
</div>

<div class="d-flex justify-content-end mb-3">
    <a href="index.php?action=criar" class="btn btn-success">Adicionar Produto</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover bg-white shadow-sm rounded text-center align-middle">
        <thead class="table-primary">
            <tr>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Sazonalidade</th>
                <th>Estoque</th>
                <th>Kanban</th>
                <th>Entrega</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($produtos as $p): ?>

                <?php
                $badge = "secondary";
                if ($p->kanban == "Em Estoque") $badge = "success";
                if ($p->kanban == "Atenção") $badge = "warning";
                if ($p->kanban == "Crítico") $badge = "danger";
                if ($p->kanban == "Sem Estoque") $badge = "dark";
                ?>

                <tr>
                    <td><?= htmlspecialchars($p->nome) ?></td>
                    <td><?= $p->grupo ?></td>
                    <td><?= $p->sazonalidade ?></td>
                    <td><?= $p->estoque ?></td>

                    <td>
                        <span class="badge bg-<?= $badge ?>"><?= $p->kanban ?? "—" ?>
                        </span>
                    </td>

                    <td><?= $p->tempo_entrega ?></td>

                    <td>
                        <a href="index.php?action=editar&id=<?= $p->_id ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?action=excluir&id=<?= $p->_id ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
                        <a href="index.php?action=kanban" class="btn btn-primary ms-2">Kanban</a>

                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</div>


</div> <!-- /container -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>