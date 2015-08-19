<?php
include 'conexao.php';

$params = "";

// Montagem da query e envio dos dados
$serie = $_POST['serie'];
//var_dump($serie) ;//log
$modulo = $_POST['modulo'];
$periodicidade = $_POST['periodicidade'];
$dados = $_POST['dados'];
$sent = true;
$link='';
//print_r($resultado);
if($dados == '1'){
	$link='<a href="http://www.ipeadata.gov.br/ExibeSerie.aspx?module=M&serid=';
}
else if($dados == '2'){
	$link='<a href="http://ipeadata-homologa.ipea.gov.br/ExibeSerie.aspx?module=M&serid=';
}

$params .= ($serie!="") ? " AND serid = '".$serie."'" : "";
$params .= ($modulo!="") ? " AND modulo = '".$modulo."'" : "";
$params .= ($periodicidade!="") ? " AND periodicidade = '".$periodicidade."'" : "";

//$query = "SELECT * FROM series limit 1;";// debug da tabela

$query = "SELECT serid as ID, sercodigotroll as Codigo, serliberada as Liberada, sernome_p as Nome, serdescricao_p as Descricao, serresponsavel as Responsavel FROM series WHERE serid is not null ".$params.";";

//$result = pg_fetch_all(pg_query($query));
$result = pg_query($query);

$numRows = pg_num_rows($result);
$numFields = pg_num_fields($result);
$html='<table class="table table-striped table-bordered table-hover" id="dataTables-example">';

$html.='<thead> <tr>';


for ($i=0; $i<$numFields; $i++) {
	$html.="<th>".pg_field_name($result, $i)."</th>";
}

$html.="</tr> </thead> <tbody>";
print_r($html);

for($i=0; $i<$numRows; $i++){
	$resultado = pg_fetch_row($result, $i);

	$linha="<tr class='odd gradeX'>";
	foreach ($resultado as $k => $v) {
		$linha.='<td>'.$link.$resultado[0].'" target="_blank">'.$v.'</a></td>';
	}

	$linha.="</tr>";
	print_r($linha);
}

pg_free_result($result);
print_r ("</tbody></table>");
?>