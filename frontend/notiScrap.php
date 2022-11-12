<?php

session_start();
if(!isset($_SESSION['nivel'])){

header('location:  ../index.php');
    
}else {
    if($_SESSION['nivel']!=1){

header('location: ../index.php');

    }
}
?>

<?php

require '../backend/phpfuntions/simple_html_dom.php';

$html = file_get_html('https://leidsa.com/noticias');
$titulo = $html->find('div[class=panel]',0);

                echo "<div class='col-12'>";
                echo $titulo->find('h1[class=titulo1]',0);
                echo "</div>";

?>


<!--No borrar-->
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--Script de iconos-->
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--No borrar-->

</body>
<footer>
  <?php include("footer.php") ?>
</footer>
</html>
