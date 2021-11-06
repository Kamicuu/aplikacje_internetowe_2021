<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>One Page Wonder - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/one-page-wonder.min.css" rel="stylesheet">

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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand">Kalkulator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" onclick="zmienKalkulator()" style="cursor: pointer">Przełącz kalkulator</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <?php if (isset($result)){ ?>
       <h1 class="masthead-heading mb-0">
        <?php echo 'Wynik: '.$result; ?>
       </h1>
      <?php } ?>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container" id="main-content">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1" style="margin:auto">
           <form class="form-group" action="<?php print(_APP_URL);?>/app/calc_credit.php" method="post" id="kredytowy" style="display:block">
                <label>Kwota kredytu: </label>
                <input  class="form-control" id="id_kwota" type="text" name="kwota" value="<?php print($kwota); ?>" /><br />
                <label>Oprocentowanie kredytu: </label>
                <input  class="form-control" id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php print($oprocentowanie); ?>" /><br />
                <label>Czas trwania kredytu (w latach): </label>
                <input  class="form-control" id="id_czas_trwania" type="text" name="czas_trwania" value="<?php print($czas_trwania); ?>" /><br />

                <input  class="form-control" type="submit" value="Oblicz" />
            </form>
            <form class="form-group" action="<?php print(_APP_URL);?>/app/calc.php" method="post" id="klasyczny" style="display:none">
            <label  for="id_x">Liczba 1: </label>
            <input class="form-control" id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />
            <label for="id_op">Operacja: </label>
            <select class="form-control" name="op">
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="times">*</option>
                    <option value="div">/</option>
            </select><br />
            <label for="id_y">Liczba 2: </label>
            <input class="form-control" id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
            <input class="form-control" type="submit" value="Oblicz" />
        </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
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

</body>

</html>
