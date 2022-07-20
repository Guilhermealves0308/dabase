<?php

/**
 * Inclui o arquivo que faz conexão com o MySQL:
 */
require('db.php');

/**
 * Se o formulário foi enviado, a resposta da expressão abaixo 
 * é true, então, processamos o formulário.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") :

    /**
     * Processa o formulário:
     *      Aqui entraria todo o processo de validação e sanitização dos dados
     *      para garantir ao máximo que atendemos aos 3 pilares da segurança
     *      da informação (disponibilidade, integridade e autenticidade).
     */

    // Monta o SQL que salva os dados na tabela:
    $sql = "

INSERT INTO produtos (isbn, titulo, autor, preco, local) VALUES (

    '{$_POST['isbn']}',
    '{$_POST['titulo']}',
    '{$_POST['autor']}',
    '{$_POST['preco']}',
    '{$_POST['local']}'

);

";

    // Finalmente, executa SQL no MySQL:
    $conn->query($sql);

    // Dá um feedback ao usuário, informando que o processo foi bem-sucedido:
    echo '<div>Produto cadastrado com sucesso.</div>';

endif;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>

<body>

    <h1>Livretto</h1><small>Sua pior livraria fake</small>
    <hr>
    <a href="create.php">Cadastrar produto</a> &nbsp;|&nbsp;
    <a href="read.php">Todos os produtos</a>
    <hr>

    <h2>Cadastro de produto:</h2>

    <?php /**
     * Formulário de cadastro de produto:
     *      Observe que o 'method="post"'.
     *      Ainda mais importante é o 'action' que envia os dados preenchidos
     *      para esta mesma página.
     *      Não é obrigatório, mas, para facilitar, usaremos no formulário, os
     *      mesmos nomes de campos do banco de dados.
     */ ?>

    <form method="post" action="create.php">

        <p>
            <label for="isbn">ISBN:</label>
            <input type="number" name="isbn">
        </p>
        <p>
            <label for="isbn">Título:</label>
            <input type="text" name="titulo">
        </p>
        <p>
            <label for="isbn">Autor:</label>
            <input type="text" name="autor">
        </p>
        <p>
            <label for="isbn">Preço:</label>
            <input type="number" name="preco">
        </p>
        <p>
            <label for="isbn">Local:</label>
            <input type="text" name="local" maxlength="10">
        </p>
        <p>
            <button type="submit">Salvar produto</button>
        </p>

    </form>

</body>

</html>