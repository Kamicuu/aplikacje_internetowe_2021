
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
      
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container" id="main-content">
      <div class="row align-items-center">
          <div class="col-lg-6 order-lg-1" style="margin:auto" >
           <form class="form-group" action="{$conf->action_root}login" method="post">
                    <fieldset>
                            <label for="id_login">login: </label>
                            <input class="form-control" id="id_login" type="text" name="login" value="{$form->login}" />
                            <label for="id_pass">pass: </label>
                            <input class="form-control" id="id_pass" type="password" name="pass" value="{$form->pass}" />
                    </fieldset>
               <br>
                    <input class="form-control" type="submit" value="zaloguj"/>
            </form>	

        </div>
      </div>
    </div>
  </section>
<section>
    <div class="container">
      <div class="row align-items-center" style="margin-bottom: 30px;">
          <div class="col-lg-6 order-lg-1" style="margin:auto">
        {* wy??wieltenie listy b????d??w, je??li istniej?? *}
        {if $msgs->isError()}
                <h4>Wyst??pi??y b????dy: </h4>
                <ol class="err">
                {foreach $msgs->getErrors() as $err}
                {strip}
                        <li>{$err}</li>
                {/strip}
                {/foreach}
                </ol>
        {/if}

        {* wy??wieltenie listy informacji, je??li istniej?? *}
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
