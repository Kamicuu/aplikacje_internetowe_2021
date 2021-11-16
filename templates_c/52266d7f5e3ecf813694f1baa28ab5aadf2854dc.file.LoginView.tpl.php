<?php /* Smarty version Smarty-3.1.17, created on 2021-11-15 22:01:57
         compiled from "C:\Users\Kamil\Documents\NetBeansProjects\aplikacje_sieciowe_2021\app\views\LoginView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19790899146192d1c1315d93-03415130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52266d7f5e3ecf813694f1baa28ab5aadf2854dc' => 
    array (
      0 => 'C:\\Users\\Kamil\\Documents\\NetBeansProjects\\aplikacje_sieciowe_2021\\app\\views\\LoginView.tpl',
      1 => 1637013715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19790899146192d1c1315d93-03415130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6192d1c1341d26_36219157',
  'variables' => 
  array (
    'conf' => 0,
    'form' => 0,
    'msgs' => 0,
    'err' => 0,
    'inf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6192d1c1341d26_36219157')) {function content_6192d1c1341d26_36219157($_smarty_tpl) {?>
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
           <form class="form-group" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
                    <fieldset>
                            <label for="id_login">login: </label>
                            <input class="form-control" id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" />
                            <label for="id_pass">pass: </label>
                            <input class="form-control" id="id_pass" type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pass;?>
" />
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
