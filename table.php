<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <?php include 'header.php';
        ?>
        <!--/. NAV TOP  -->
        <?php include 'navbar.php';
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tables Page <small>Séries</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            <!--<a href="#" onclick="enviaDados(1);">Produção</a>
                            <a href="#" onclick="enviaDados(2);">Homologação</a>-->
                        </div>
                        
                            
                        
                        <!--<div class="panel-heading">
                            <a href="" onclick="carregaDesenv();">Desenvolvimento</a>
                        </div>-->
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a data-toggle="tab" href="#search" onclick="enviaDados(1);">Produção</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#search" onclick="enviaDados(2);">Homologação</a>
                                </li>
                            </ul>
                            <div id="search" class="table-responsive">
                                <!-- Resultados aparecem aqui -->
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
               
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                enviaDados(1);//1 => produção e 2=> homologação
                
            });

            function enviaDados(op) {
                var dados='dados='+op;

                $("#search").html("");
                
                $.ajax({                 
                    type: 'POST',                                  
                    url: 'search.php',                 
                    async: true,                 
                    data: dados,                 
                    success: function(response) {
                        $("#search").html(response);

                        $('#dataTables-example').dataTable({
                            "oLanguage":{"sSearch": '<a class="submit_button" href="#"><i class="glyphicon glyphicon-search"></i></a>'},
                            paging: true
                        });
                    }             
                });           
            }
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
