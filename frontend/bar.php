<?php

// este codigo al parecer no se esta usando? ~ Franne


include('../backend/phpfunctions/generals.php');
$a=crear_tickets_codigo();
echo $a;
var_dump($a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/js/barcodegen.js"></script>

</head>
<?php
    include('../backend/phpfunctions/generals.php');
    $a=crear_tickets_codigo();
    

?>  
<input type="text" id="generate" value="<?php echo $a; ?>">


<body>

    <script type="text/javascript"/>
    
        document.addEventListener("DOMContentLoaded", function() {
    var text = document.getElementById("generate").value;
    JsBarcode("#bar",text);


})
    </script>
</body>
</html>