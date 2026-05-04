<?php include 'filmes.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Filmes</title>
</head>
<body>

<h1>Lista de Filmes</h1>

<!-- FORM CRIAR -->
<h2>Adicionar Filme</h2>
<form method="POST">
    <input type="hidden" name="acao" value="criar">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="number" name="ano" placeholder="Ano" required>
    <button type="submit">Adicionar</button>
</form>

<hr>

<!-- LISTA -->
<h2>Filmes</h2>

<?php foreach (listarFilmes() as $filme): ?>
    <div style="margin-bottom:10px;">
        <strong><?= htmlspecialchars($filme['titulo']) ?> (<?= $filme['ano'] ?>)</strong>

        <!-- DELETE -->
        <a href="?delete=<?= $filme['id'] ?>">[Excluir]</a>

        <!-- EDITAR -->
        <button onclick="mostrarForm(
            <?= $filme['id'] ?>,
            '<?= htmlspecialchars($filme['titulo'], ENT_QUOTES) ?>',
            <?= $filme['ano'] ?>
        )">
            Editar
        </button>
    </div>
<?php endforeach; ?>

<hr>

<!-- FORM EDITAR -->
<h2>Editar Filme</h2>
<form method="POST" id="formEditar" style="display:none;">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" id="editId">

    <input type="text" name="titulo" id="editTitulo" required>
    <input type="number" name="ano" id="editAno" required>

    <button type="submit">Salvar</button>
</form>

<script>
function mostrarForm(id, titulo, ano) {
    document.getElementById('formEditar').style.display = 'block';
    document.getElementById('editId').value = id;
    document.getElementById('editTitulo').value = titulo;
    document.getElementById('editAno').value = ano;
}
</script>

</body>
</html>