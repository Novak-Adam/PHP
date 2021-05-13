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
<?php
if (!($con = mysqli_connect("localhost","knihy","knihy","knihy"))) //treti je heslo
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT id_isbn, krestni, prijmeni, nazev, popis FROM databazeknih")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Knihy</h1>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
?>
<h2><?php echo $radek["nazev"];?></h2>
<dl>
	<dt>Jmeno autora</dt>
	<dd><?php echo $radek["krestni"];?></dd>
</dl>
<dl>
	<dt>Prijmeni autora</dt>
	<dd><?php echo $radek["prijmeni"];?></dd>
</dl>
<dl>
	<dt>Popis dila</dt>
	<dd><?php echo $radek["popis"];?></dd>
</dl>
<dl>

<?php   
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</head>