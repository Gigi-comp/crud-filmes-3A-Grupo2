<?php
session_start();

// Inicializa os filmes na sessão
if (!isset($_SESSION['filmes'])) {
    $_SESSION['filmes'] = [
        ["id" => 1, "titulo" => "Matrix", "ano" => 1999],
        ["id" => 2, "titulo" => "Interestelar", "ano" => 2014],
        ["id" => 3, "titulo" => "A teoria de tudo", "ano" => 2014 ]
        ["id" => 4, "titulo" => "As branquelas", "ano" => 2004]
    ];
}
  
// CREATE
if (isset($_POST['acao']) && $_POST['acao'] === 'criar') {
    $novo = [
        "id" => time(),
        "titulo" => $_POST['titulo'],
        "ano" => $_POST['ano']
    ];
    $_SESSION['filmes'][] = $novo;
}

// DELETE
if (isset($_GET['delete'])) {
    foreach ($_SESSION['filmes'] as $key => $filme) {
        if ($filme['id'] == $_GET['delete']) {
            unset($_SESSION['filmes'][$key]);
        }
    }
    // Reorganiza os índices do array
    $_SESSION['filmes'] = array_values($_SESSION['filmes']);
}

// UPDATE (SEM referência)
if (isset($_POST['acao']) && $_POST['acao'] === 'editar') {
    foreach ($_SESSION['filmes'] as $key => $filme) {
        if ($filme['id'] == $_POST['id']) {
            $_SESSION['filmes'][$key]['titulo'] = $_POST['titulo'];
            $_SESSION['filmes'][$key]['ano'] = $_POST['ano'];
            break; // para o loop depois de encontrar
        }
    }
}

// READ
function listarFilmes() {
    return $_SESSION['filmes'];
}