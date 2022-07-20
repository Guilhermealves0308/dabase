<?php

// Setup inicial:
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

// Variáveis do tema:
$site_name = "Trufando";
$site_slogan = "Paga logo!";
$site_logo = "/img/logo.png";

// Conexão com o MySQL:
$db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/_config.ini', true);
foreach ($db as $server => $values) :
    if ($server == $_SERVER['SERVER_NAME']) :
        $conn = new mysqli($values['hostname'], $values['username'], $values['password'], $values['database']);
        if ($conn->connect_error) die("Falha de conexão com o banco e dados: " . $conn->connect_error);
    endif;
endforeach;

// MySQL em UTF-8 e portugês Br:
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

// Obtém a variável com o nome da página:
if (isset($_GET['p'])) $page = trim(strtolower($_GET['p']));
else $page = 'home';

// Inclui os arquivos corretos conforme o valor de page:
switch ($page):

        // Carrega a página inicial:
    case 'home':
        require('/page/home.php');
        break;

        // Carrega a página de contatos:
    case 'contacts':
        require('page/contacts.php');
        break;

        // Carrega a página sobre:
    case 'about':
        require('page/about.php');
        break;

        // Qualquer outra página, carrega a página de erro 404:
    default:
        require('/page/e404.php');

endswitch;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name ?></title>
</head>

<body>

    <div class="wrap">

        <header>
            <a href="/"><img src="<?php echo $site_logo ?>" alt="Logotipo de <?php echo $site_name ?>"></a>
            <h1><?php echo $site_name ?><small><?php echo $site_slogan ?></small></h1>
        </header>

        <nav>

            <a href="/">Início</a>
            <a href="/?p=contacts">Contatos</a>
            <a href="/?p=about&teste=testando">Sobre</a>

        </nav>

        <main>

            <article></article>

            <aside></aside>

        </main>

        <footer></footer>

    </div>

</body>

</html>