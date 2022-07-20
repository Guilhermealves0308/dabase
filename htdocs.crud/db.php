<?php

/****************************************************************
 * Arquivo universal de conexão com o banco de dados.           *
 * Use-o como referência para todos os seus projetos PHP/MySQL. *
 ****************************************************************/

/**
 * Primeiramente, antes de tudo, ajuste o PHP para operar com a tabela de 
 * caracteres UTF-8, assim, teremos todos os ambientes UTF-8:
 *      • HTML5 → <meta charset="UTF-8">    
 *      • PHP → header('Content-Type: text/html; charset=utf-8');
 *      • MySQL → CREATE DATABASE livretto CHARACTER SET utf8... 
 *      • etc...
 */
header('Content-Type: text/html; charset=utf-8');

// Variáveis com dados de conexão relacionados ao XAMPP:
$hostname = 'localhost';   // Endereço do servidor MySQL;
$username = 'root';        // Nome de usuário do MySQL;
$password = '';            // Senha do usuário;
$database = 'livretto';    // Base de dados na qual nos conectaremos;

/**
 * Esta linha faz a conexão com o MySQL e armazena-a em "$conn":
 *      Observe que estamos usando o paradigma POO para facilitar a sintaxe.
 *      A variável "$conn" contém um objeto do PHP que representa o banco de 
 *      dados MySQL para este aplicativo.
 **/
$conn = new mysqli($hostname, $username, $password, $database);

/**
 * A linha abaixo é opcional, mas recomendada. Ela emite uma mensagem de erro
 * no caso de falha na conexão com o MySQL, por exemplo, quando o servidor
 * está off-line ou temos erros nas variáveis de conexão acima.
 **/
if ($conn->connect_error)  die("Falha de conexão: " . $conn->connect_error);

/**
 * Seta transações entre o PHP e o MySQL para ocorrer sempre em UTF-8:
 *      As linhas abaixo são importantes para que não ocorram falhas de 
 *      acentuação nos processos de CRUD. Não se esqueça de criar o banco de
 *      dados com "CHARACTER SET utf8".
 **/
$conn->query("SET NAMES 'utf8'");                   // Nomes de tabelas e campos;
$conn->query('SET character_set_connection=utf8');  // Início da conexão;
$conn->query('SET character_set_client=utf8');      // Cliente MySQL do PHP (mysqli);
$conn->query('SET character_set_results=utf8');     // Resultados retornados pelo MySQL;

/**
 * Opcionalmente, podemos setar dias da semana e nomes dos meses 
 * do MySQL para "português do Brasil":
 **/
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');
