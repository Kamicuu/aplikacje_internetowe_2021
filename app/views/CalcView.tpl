<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kalkulatory</title>

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
        {if isset($res->result)}
	<h4 class="masthead-heading mb-0" >Wynik {$res->result}</h4>
        {/if}
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
          <form class="form-group" action="{$conf->action_root}calcCreditCompute" method="post" id="kredytowy" style="display:block">
                <label>Kwota kredytu: </label>
                <input  class="form-control" id="kwota" type="text" name="kwota" value="{$form->kwota}" /><br />
                <label>Oprocentowanie kredytu: </label>
                <input  class="form-control" id="oprocentowanie" type="text" name="oprocentowanie" value="{$form->oprocentowanie}" /><br />
                <label>Czas trwania kredytu (w latach): </label>
                <input  class="form-control" id="czas_trwania" type="text" name="czas_trwania" value="{$form->czas_trwania}" /><br />

                <input  class="form-control" type="submit" value="Oblicz" />
            </form>
                
            <form class="form-group" action="{$conf->action_root}calcCompute" method="post" id="klasyczny" style="display:none">
            <label  for="x">Liczba 1: </label>
            <input class="form-control" id="x" type="text" name="x" value="{$form->x}" /><br />
            <label for="op">Operacja: </label>
            <select class="form-control" name="op">
                {if isset($res->op_name)}
                <option value="{$form->op}">ponownie: {$res->op_name}</option>
                <option value="" disabled="true">---</option>
                {/if}
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="times">*</option>
                    <option value="div">/</option>
            </select><br />
            <label for="y">Liczba 2: </label>
            <input class="form-control" id="y" type="text" name="y" value="{$form->y}" /><br />
            <input class="form-control" type="submit" value="Oblicz" />
        </form>
        </div>
      </div>
    </div>
  </section>
            
<section>
    <div class="container">
      <div class="row align-items-center" style="margin-bottom: 30px;">
          <div class="col-lg-6 order-lg-1" style="margin:auto">
        {* wyświeltenie listy błędów, jeśli istnieją *}
        {if $msgs->isError()}
                <h4>Wystąpiły błędy: </h4>
                <ol class="err">
                {foreach $msgs->getErrors() as $err}
                {strip}
                        <li>{$err}</li>
                {/strip}
                {/foreach}
                </ol>
        {/if}

  {* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

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

 
</body>

</html>
