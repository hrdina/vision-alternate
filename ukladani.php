
<?php include_once "database_connect.php" ?>

<?php  

$id = $database->insert('raederfalge',[

'datum' => $_POST['01'],
'datumRealizace' => $_POST['02'],
'faktura' => $_POST['03'],
'naklad' => $_POST['04'],
'poznamka' => $_POST['05'],
'so' => $_POST['06'],
'vr' => $_POST['07'],

]);

header('Location: index.php');
die();






