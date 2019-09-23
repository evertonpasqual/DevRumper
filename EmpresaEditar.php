<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title> DevRumper </title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>DervRumper</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              
              </div>
              <div class="profile_info">
              
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include "MenuLateral.php"; ?>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            <ul class="nav navbar-nav navbar-right">
            </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            
            
           
            
            
            
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Empresas <small>Cadastro</small></h3>
                  </div>
                </div>
                <?php
                $EMPRESA_EDITAR = $_GET['id'];
                $EDITAR_EMPRESAS = mysqli_query($Conceta_Banco,"SELECT * FROM TB_EMPRESAS WHERE EMP_ID='$EMPRESA_EDITAR'");
                $RESULTADO_EDITAR_EMPRESAS = mysqli_fetch_assoc($EDITAR_EMPRESAS);
                
        
                ?>
                <!-- Inicio Cadastro  -->
                <?php
                  if(isset ($_POST['EditarEmpresa']))
                  {  
                    $EMPRESA_NOME = $_POST['form_empresa'];
                    $EMPRESA_CNPJ = $_POST['form_cnpj'];
                    // VERIFICA SE O NOME OU CNPJ DA EMPRESA JÁ FOI CADASTRADO
                    $VERIFICA_EMPRESA = mysqli_query($Conceta_Banco,"SELECT * FROM TB_EMPRESAS WHERE EMP_EMPRESA='$EMPRESA_NOME' OR EMP_CNPJ='$EMPRESA_CNPJ' ");
                    $RESULTADO_EMPRESA = mysqli_num_rows($VERIFICA_EMPRESA);
                    
                if ($RESULTADO_EMPRESA>"1"){
                    echo "<div class='container'>
                            <div class='alert alert-danger'>
                                <strong>Desculpe!</strong> Nome da empresa ou CNPJ já cadastrada em nossa base de dados!.
                            </div>
                        </div>";
                    }
                else{
                    $EMPRESA_NOME = $_POST['form_empresa'];
                    $EMPRESA_CNPJ = $_POST['form_cnpj'];
                    $EMPRESA_CNAE = $_POST['form_cnae'];
                    $EMPRESA_ENDERECO = $_POST['form_endereco'];
                    $EDITA_EMPRESA ="UPDATE TB_EMPRESAS SET EMP_EMPRESA='$EMPRESA_NOME', EMP_CNPJ='$EMPRESA_CNPJ', EMP_CNAE='$EMPRESA_CNAE', EMP_ENDERECO='$EMPRESA_ENDERECO' WHERE EMP_ID='$EMPRESA_EDITAR' "; 
                        
                        if (!mysqli_query($Conceta_Banco,$EDITA_EMPRESA))
                            {
                                die('Error: ' . mysqli_error($Conceta_Banco));
                            }
                        echo "<div class='container'>
                                <div class='alert alert-warning'>
                                    <strong>Obrigado!</strong> Empresa editada com sucesso.
                                </div>
                            </div>";
                    }
                }?>
                <?php
                $EMPRESA_EDITAR = $_GET['id'];
                $EDITAR_EMPRESAS = mysqli_query($Conceta_Banco,"SELECT * FROM TB_EMPRESAS WHERE EMP_ID='$EMPRESA_EDITAR'");
                $RESULTADO_EDITAR_EMPRESAS = mysqli_fetch_assoc($EDITAR_EMPRESAS);
                
        
                ?>
                <!-- Fim do cadastro  -->
                <form method="post"  data-parsley-validate class="form-horizontal form-label-left">
                      
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="form_empresa"><span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="form_empresa" name="form_empresa" value="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_EMPRESA'];?>" placeholder="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_EMPRESA'];?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="form_cnpj"><span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="form_cnpj" value="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_CNPJ'];?>" placeholder="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_CNPJ'];?>" name="form_cnpj" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="form_cnae"><span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="form_cnae" value="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_CNAE'];?>" placeholder="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_CNAE'];?>" name="form_cnae" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="form_endereco"><span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="form_endereco" value="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_ENDERECO'];?>" placeholder="<?php echo $RESULTADO_EDITAR_EMPRESAS['EMP_ENDERECO'];?>" name="form_endereco" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Cancelar</button>
						  <button type="submit" name="EditarEmpresa" class="btn btn-warning">Editar</button>
                        </div>
                      </div>

                    </form>

                

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "footer.php";?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="./vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="./vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="./vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="./vendors/Flot/jquery.flot.js"></script>
    <script src="./vendors/Flot/jquery.flot.pie.js"></script>
    <script src="./vendors/Flot/jquery.flot.time.js"></script>
    <script src="./vendors/Flot/jquery.flot.stack.js"></script>
    <script src="./vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="./vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="./vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="./vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="./vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="./vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
	
  </body>
</html>
