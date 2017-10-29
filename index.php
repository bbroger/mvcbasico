<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting('E_ALL');


require_once 'Model/Conexao.php';
require_once 'Model/Contato.php';
require_once 'Model/Filtro.php';


$filtro = new Filtro;
// $filtro->adicionarFiltro($campo, $operador, $valor);
$filtro->adicionarFiltro('nome', 'LIKE', 'Alex');

$resultSet = Contato::listar($filtro->dump());

echo '<pre>';
print_r($resultSet);
echo '</pre>';
