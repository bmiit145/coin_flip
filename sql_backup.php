<?php include_once('Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=coin_flip', 'root', '');
$f=date('d-m-Y');
$dump->start("sql_dump/coin_flip.sql");

echo "done";

?>