<?php
    if(isset($_FILES['imagen'])){
        pre_r($_FILES);
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'imgs/'.$_FILES['imagen']['name'])
    }

    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>'
    }
?>