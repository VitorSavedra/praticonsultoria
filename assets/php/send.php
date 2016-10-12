<?php 

//COLETANDO IP
$ip = $_SERVER['REMOTE_ADDR'];
//echo $ip;
    
//COLETANDO DATA E HORA
$timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
$datahora = gmdate("d/m/Y H:i:s", $timestamp);
//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
 
$host= '';
$bd= '';
$senhabd= '';
 
$userbd = $bd; 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$name	= $_POST ["name"];	//atribuição do campo "nome" vindo do formulário para variavel	
$email	= $_POST ["email"];	//atribuição do campo "email" vindo do formulário para variavel
$telefone	= $_POST ["telefone"];	
$endereco	= $_POST ["endereco"];	
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host,$bd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
$query = "INSERT INTO `tbleads` ( `name` , `email`, `telefone`, `endereco` , `datahora` , `ip`) 
VALUES ('$name', '$email', '$telefone', '$endereco', '$datahora', '$ip')";
 
mysql_query($query,$conexao);
echo "Seu e-mail foi recebido com sucesso!<br>Em breve retornaremos o contato. :)";

/*REDIRECIONAMENTO
    $redirect = "http://webteste.profissional.ws/www/lp/obrigado.html";
    header("location:$redirect");*/
    
?> 