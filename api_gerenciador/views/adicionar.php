<?php require "layout.php"; ?>

<div class="card shadow-sm mx-auto mt-4" style="max-width: 650px;">
    <div class="card-header bg-success text-white text-center">
        <h4>Adicionar Produto</h4>
    </div>

    <div class="card-body">

        <form action="index.php?action=salvar" method="POST">

            <div class="mb-3">
                <label class="form-label fw-semibold">Nome</label>
                <input type="text" name="nome" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Estoque</label>
                <input type="number" name="estoque" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Tempo de Entrega</label>
                <select name="tempo_entrega" class="form-select form-select-lg" required>
                    <option>Imediato</option>
                    <option>2-5 dias</option>
                    <option>6-10 dias</option>
                    <option>15+ dias</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Sazonalidade</label>
                <select name="sazonalidade" class="form-select form-select-lg" required>
                    <option>Baixa</option>
                    <option>Média</option>
                    <option>Alta</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Grupo</label>
                <select name="grupo" class="form-select form-select-lg" required>
                    <option>Eletrônicos</option>
                    <option>Periféricos</option>
                    <option>Acessórios</option>
                    <option>Informática</option>
                    <option>Outros</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status Kanban</label>
                <select name="kanban" class="form-select form-select-lg">
                    <option value="a_fazer">A Fazer</option>
                    <option value="progresso">Em Progresso</option>
                    <option value="concluido">Concluído</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success btn-lg w-100">Salvar</button>
            <a href="index.php" class="btn btn-secondary btn-lg w-100 mt-2">Voltar</a>
        </form>

    </div>
</div>

</div> <!-- /container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>