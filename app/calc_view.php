<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<script>
function zmienKalkulator() {
    
  let klasyczny = document.getElementById("klasyczny").style;
  let kredytowy = document.getElementById("kredytowy").style;
  
  if(klasyczny.display === "block"){
      klasyczny.display = "none";
      kredytowy.display = "block";
  }else if (kredytowy.display === "block"){
      kredytowy.display = "none";
      klasyczny.display = "block";
  }

}


</script>
</head>
<body>
    <button onclick="zmienKalkulator()">Zmien kalkulator na klasyczny/kredytowy</button> 
    <br/>
    <br/>
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post" id="klasyczny" style="display:block">
            <label for="id_x">Liczba 1: </label>
            <input id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />
            <label for="id_op">Operacja: </label>
            <select name="op">
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="times">*</option>
                    <option value="div">/</option>
            </select><br />
            <label for="id_y">Liczba 2: </label>
            <input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
            <input type="submit" value="Oblicz" />
    </form>
    <form action="<?php print(_APP_URL);?>/app/calc_credit.php" method="post" id="kredytowy" style="display:none">
        <label>Kwota kredytu: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php print($kwota); ?>" /><br />
        <label>Oprocentowanie kredytu: </label>
        <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php print($oprocentowanie); ?>" /><br />
        <label>Czas trwania kredytu (w latach): </label>
        <input id="id_czas_trwania" type="text" name="czas_trwania" value="<?php print($czas_trwania); ?>" /><br />
        
        <input type="submit" value="Oblicz" />
    </form>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>