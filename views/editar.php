<?php require "layout.php"; ?>

<div class="card shadow-sm mx-auto mt-4" style="max-width: 650px;">
    <div class="card-header bg-warning text-white text-center">
        <h4>Editar Produto</h4>
    </div>
    <div class="card-body">

        <form action="index.php?action=atualizar" method="POST">

            <input type="hidden" name="id" value="<?= $produto->_id ?>">

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome</label>
                <input type="text" name="nome" value="<?= $produto->nome ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" value="<?= $produto->preco ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Estoque</label>
                <input type="number" name="estoque" value="<?= $produto->estoque ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Tempo de Entrega</label>
                <select name="tempo_entrega" class="form-select form-select-lg" required>
                    <option <?= $produto->tempo_entrega == "Imediato" ? "selected" : "" ?>>Imediato</option>
                    <option <?= $produto->tempo_entrega == "2-5 dias" ? "selected" : "" ?>>2–5 dias</option>
                    <option <?= $produto->tempo_entrega == "6-10 dias" ? "selected" : "" ?>>6–10 dias</option>
                    <option <?= $produto->tempo_entrega == "15+ dias" ? "selected" : "" ?>>15+ dias</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Sazonalidade</label>
                <select name="sazonalidade" class="form-select form-select-lg" required>
                    <option <?= $produto->sazonalidade == "Baixa" ? "selected" : "" ?>>Baixa</option>
                    <option <?= $produto->sazonalidade == "Média" ? "selected" : "" ?>>Média</option>
                    <option <?= $produto->sazonalidade == "Alta" ? "selected" : "" ?>>Alta</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Grupo</label>
                <select name="grupo" class="form-select form-select-lg" required>
                    <option <?= $produto->grupo == "Eletrônicos" ? "selected" : "" ?>>Eletrônicos</option>
                    <option <?= $produto->grupo == "Periféricos" ? "selected" : "" ?>>Periféricos</option>
                    <option <?= $produto->grupo == "Acessórios" ? "selected" : "" ?>>Acessórios</option>
                    <option <?= $produto->grupo == "Informática" ? "selected" : "" ?>>Informática</option>
                    <option <?= $produto->grupo == "Outros" ? "selected" : "" ?>>Outros</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning btn-lg w-100">Atualizar</button>
            <a href="index.php" class="btn btn-secondary btn-lg w-100 mt-2">Voltar</a>
        </form>

    </div>
</div>


</div> <!-- /container -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>