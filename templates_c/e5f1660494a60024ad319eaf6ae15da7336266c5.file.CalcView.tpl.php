<?php /* Smarty version Smarty-3.1.17, created on 2021-11-15 16:27:06
         compiled from "C:\Users\Kamil\Documents\NetBeansProjects\aplikacje_sieciowe_2021\app\CalcView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15621599761928a5a1ecdc3-14835218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f1660494a60024ad319eaf6ae15da7336266c5' => 
    array (
      0 => 'C:\\Users\\Kamil\\Documents\\NetBeansProjects\\aplikacje_sieciowe_2021\\app\\CalcView.tpl',
      1 => 1636993599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15621599761928a5a1ecdc3-14835218',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'res' => 0,
    'conf' => 0,
    'form' => 0,
    'msgs' => 0,
    'err' => 0,
    'inf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_61928a5a2596f1_20734154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61928a5a2596f1_20734154')) {function content_61928a5a2596f1_20734154($_smarty_tpl) {?><!DOCTYPE html>
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
        <?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4 class="masthead-heading mb-0" >Wynik <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
</h4>
        <?php }?>
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
          <form class="form-group" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc_credit.php" method="post" id="kredytowy" style="display:block">
                <label>Kwota kredytu: </label>
                <input  class="form-control" id="kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" /><br />
                <label>Oprocentowanie kredytu: </label>
                <input  class="form-control" id="oprocentowanie" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
" /><br />
                <label>Czas trwania kredytu (w latach): </label>
                <input  class="form-control" id="czas_trwania" type="text" name="czas_trwania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->czas_trwania;?>
" /><br />

                <input  class="form-control" type="submit" value="Oblicz" />
            </form>
                
            <form class="form-group" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post" id="klasyczny" style="display:none">
            <label  for="x">Liczba 1: </label>
            <input class="form-control" id="x" type="text" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
" /><br />
            <label for="op">Operacja: </label>
            <select class="form-control" name="op">
                <?php if (isset($_smarty_tpl->tpl_vars['res']->value->op_name)) {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
                <option value="" disabled="true">---</option>
                <?php }?>
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="times">*</option>
                    <option value="div">/</option>
            </select><br />
            <label for="y">Liczba 2: </label>
            <input class="form-control" id="y" type="text" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
" /><br />
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
        
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
                <h4>Wystąpiły błędy: </h4>
                <ol class="err">
                <?php  $_smarty_tpl->tpl_vars['err'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['err']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['err']->key => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
                <?php } ?>
                </ol>
        <?php }?>

  
<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php  $_smarty_tpl->tpl_vars['inf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getInfos(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->key => $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->_loop = true;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php } ?>
	</ol>
<?php }?>

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
<?php }} ?>
