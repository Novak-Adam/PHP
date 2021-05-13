<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
</head>
<body>
<?php
if (!($con = mysqli_connect("localhost","knihy","knihy","knihy"))) // heslo je 3treti v zavorce
{
	die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
		"INSERT INTO databazeknih(id_isbn, krestni, prijmeni, nazev, popis) VALUES('" .
		addslashes($_POST["id_isbn"]) . "', '" .
        addslashes($_POST["krestni"]) . "', '" .
        addslashes($_POST["prijmeni"]) . "', '" .
        addslashes($_POST["nazev"]) . "', '" .
		addslashes($_POST["popis"]) . "')"))
{
	echo "Úspěšně vloženo.";
}
else
{
	echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con); 
?>
</body>
</html>