<?php
include 'conn.php';


    $EMPRESA_EXCLUIR = $_GET['id'];
    $DELETA_EMPRESAS = mysqli_query($Conceta_Banco,"DELETE FROM TB_EMPRESAS WHERE EMP_ID='$EMPRESA_EXCLUIR'");
     
    
    ?>
    
    <script type="text/javascript">
	alert("Empresa excluida com sucesso!");
	window.location="EmpresaLista.php";
</script>


 