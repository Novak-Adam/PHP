<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
</head>
<body>
<div>
		<a href="VkladaniKnih.php"><button>Vkladani novych knih</button></a>&nbsp;
		<a href="PrehledKnih.php"><button>Vypis databeze knih</button></a>&nbsp;
		<a href="vyhledani.php"><button>Vyhledani v databazi knih</button></a>&nbsp;
	</div>
<h1>Vkládání nových knih</h1>
<form method="POST" action="VkladaniKniha.php">
	ISBN - čislo:
	<input name="id_isbn" type="text" ><br>
	Křestní jméno:
	<input name="krestni" type="text" ><br>
    Příjmení:
	<input name="prijmeni" type="text" ><br>
	Název knihy:
	<input name="nazev" type="text" ><br>
	Popis:
	<textarea name="popis"></textarea>
	<input type="submit" value="Vložit" >
</form>
</body>
</html>
