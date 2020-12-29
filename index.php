<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Document</title>

<style>
li:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>

</head>
<body>
	<?php include_once "database_connect.php" ?>
<div class="container">

	<ul class="nav">
		  <li class="nav-item">
		    <a class="nav-link active" aria-current="page" href="index.php">VKLÁDÁNÍ</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="tabulka.php">TABULKA</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		  </li>
	</ul>


	<form action="ukladani.php" method="POST">

		<div class="input-group mt-5" >
		  <span class="input-group-text">DATUM</span>
		  <input type="text" name="01" aria-label="First name" class="form-control">
		</div>

		<div class="input-group" >
		  <span class="input-group-text">DATUM REALIZACE</span>
		  <input type="text" name="02" aria-label="First name" class="form-control">
		</div>

		<div class="input-group" >
		  <span class="input-group-text">FAKTURA</span>
		  <input type="text" name="03" aria-label="First name" class="form-control">
		</div>

		<div class="input-group" >
		  <span class="input-group-text">NÁKLAD 'KČ'</span>
		  <input type="text" name="04" aria-label="First name" class="form-control">
		</div>

		<div class="input-group" >
		  <span class="input-group-text">POZNÁMKA</span>
		  <input type="text" name="05" aria-label="First name" class="form-control">
		</div>

		<select name="06" class="form-select form-select-lg mt-5" aria-label=".form-select-lg example">
		  <option selected>ID STAVEBNÍHO OBJEKTU</option>
		  <option value="1">One</option>
		  <option value="2">Two</option>
		  <option value="3">Three</option>
		</select>

		<select name="07" class="form-select form-select-lg mb-5" aria-label=".form-select-lg example">
		  <option selected>ID VÝBĚROVÉHO ŘÍZENÍ</option>
		  <option value="1">One</option>
		  <option value="2">Two</option>
		  <option value="3">Three</option>
		</select>

		<input class="btn btn-primary " type="submit" value="ODESLAT">

	</form>



</div>

<div class="container-fluid mt-5">
		

		<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">DATUM</th>
      <th scope="col">DATUM REALIZACE</th>
      <th scope="col">FAKTURA</th>
      <th scope="col">NÁKLAD</th>
      <th scope="col">POZNÁMKA</th>
      <th scope="col">ID SO</th>
      <th scope="col">ID VŘ</th>
    </tr>
 </thead>
 <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"><?php $celkem = $database->count("raederfalge", "faktura"); echo $celkem . " Ks" ; ?></th>
      <th scope="col"><?php $total = $database->sum("raederfalge", "naklad"); echo "Kč " . number_format($total); ?></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>


  </thead>
  
  <tbody>
    

    	<?php

    	$datas = $database->query(

        "SELECT * FROM raederfalge" 

      );

    	foreach($datas as $nevim)

    	{

     echo "<tr>

   	 <td>" . $nevim["id"] . "</td>
   	 <td>" . $nevim["datum"] . "</td>
   	 <td>" . $nevim["datumRealizace"] . "</td>
   	 <td>" . $nevim["faktura"] . "</td>
   	 <td>" . "Kč " .number_format($nevim["naklad"]) . "</td>
   	 <td>" . $nevim["poznamka"] . "</td>
   	 <td>" . $nevim["so"] . "</td>
   	 <td>" . $nevim["vr"] . "</td>

     </tr>";
     
     }

      ?>
   
</tbody>
</table>
</div>

	
</body>
</html>