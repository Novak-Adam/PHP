<div>
		<a href="VkladaniKnih.php"><button>Vkladani novych knih</button></a>&nbsp;
		<a href="PrehledKnih.php"><button>Vypis databeze knih</button></a>&nbsp;
		<a href="vyhledani.php"><button>Vyhledani v databazi knih</button></a>&nbsp;
	</div>
<?php

    $t = "databazeknih";
	$a1 = "id_isbn";
	$a2 = "krestni";
	$a3 = "prijmeni";
	$a4 = "nazev";
    $a5 = "popis";
    
if (!($con = mysqli_connect("localhost","knihy","knihy","knihy"))) {
	die("Nelze se připojit k databázovému serveru!</body></html>");
} else {
	mysqli_query($con, "SET NAMES 'utf8'");
		if ((isset($_POST["odesli"])) && (($_POST["id_isbn"] != "") || ($_POST["krestni"] != "") || ($_POST["prijmeni"] != "") || ($_POST["nazev"] != "") || ($_POST["popis"] != ""))) {
			$b1 = "%";
			$b2 = "%";
			$b3 = "%";
			$b4 = "%";
			$b5 = "%";

			if ($_POST['id_isbn'] != "") {
				$b1 = '%' . addslashes($_POST['id_isbn']) . '%';
			}
			if ($_POST['krestni'] != "") {
				$b2 = '%' . addslashes($_POST['krestni']) . '%';
			}
			if ($_POST['prijmeni'] != "") {
				$b3 = '%' . addslashes($_POST['prijmeni']) . '%';
			}
			if ($_POST['nazev'] != "") {
				$b4 = '%' . addslashes($_POST['nazev']) . '%';
			}
			if ($_POST['popis'] != "") {
				$b5 = '%' . addslashes($_POST['popis']) . '%';
			}
			if (!($vysledek1 = mysqli_query($con, "SELECT * FROM $t WHERE $a1 LIKE '$b1' and $a2 LIKE '$b2' and $a3 LIKE '$b3' and $a4 LIKE '$b4'and $a5 LIKE '$b5'"))) {
				die("Nelze provést dotaz.</body></html>");
				mysqli_free_result($_POST);
			}

            ?>
			<h1>Vypis database knih podle kriteria:</h1><br>
			<table>
				<?php

				while ($radek = mysqli_fetch_array($vysledek1)) {				
				?>
					<tr>
						<td style="width: 15%;"><?php echo "$a1:<br>" .  htmlspecialchars($radek["$a1"]); ?></td>
						<td style="width: 15%;"><?php echo "$a2:<br>" .  htmlspecialchars($radek["$a2"]); ?></td>
						<td style="width: 15%;"><?php echo "$a3:<br>" .  htmlspecialchars($radek["$a3"]); ?></td>
						<td style="width: 15%;"><?php echo "$a4:<br>" .  htmlspecialchars($radek["$a4"]); ?></td>
						<td><?php echo "$a5:<br>" .  htmlspecialchars($radek["$a5"]); ?></td>
					</tr>

				<?php
				
				}
				?>
			</table>
			<br>
			<table>
			<br>
			<table>
				<tr><td><h2><?php echo "Podle vaseho kriteria: " ?><h2></td></tr>
				<tr><td><?php if ($b1 != '%') echo "$a1 : " . str_replace('%', '', $b1);
						else  echo "<i>$a1 : Nezadano.</i>" ?></td></tr>
				<tr><td><?php if ($b2 != '%') echo "$a2 : " . str_replace('%', '', $b2);
						else  echo "<i>$a2 : Nezadano.</i>" ?></td></tr>
				<tr><td><?php if ($b3 != '%') echo "$a3 : " . str_replace('%', '', $b3);
						else  echo "<i>$a3 : Nezadano.</i>" ?></td></tr>
				<tr><td><?php if ($b4 != '%') echo "$a4 : " . str_replace('%', '', $b4);
						else  echo "<i>$a4 : Nezadano.</i>" ?></td></tr>
				<tr><td><?php if ($b5 != '%') echo "$a5 : " . str_replace('%', '', $b5);
						else  echo "<i>$a5 : Nezadano.</i>" ?></td></tr>
			</table>
			<br>
	<?php
		}
	}
	?>
    <h3>Vyhledani knih podle kriterii</h3>
	<form method="POST" action="vyhledani.php">
         <input type="text" name="id_isbn"  id="id_isbn"><label >Zadej čislo ISBN </label><br>
		<input type="text" name="krestni"  id="krestni"><label >Zadej krestni jmeno </label><br>
		<input type="text" name="prijmeni"  id="prijmeni"><label >Zadej prijmeni </label><br>
		<input type="text" name="nazev"  id="nazev"><label >Zadej nazev knihy </label><br>
		<textarea name="popis" cols="20" rows="5" id="popis"></textarea><label >Zadej popis </label><br>
		<input type="submit" value="Vyhledat" name="odesli">
		<input type="reset" value="Reset" name="reset">
		
	</form>
	<?php
	mysqli_close($con);
	?>
</body>

</html>