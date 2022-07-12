<?php
$msg="";
$class_name="text-danger";


function print_array($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

}

function redirect($url){
    ?>
    <script>
        location.href="<?=$url?>";
    </script>
    <?php
}

function redirect_some_time($url){
    ?>
    <script>
        setTimeout(function(){
            location.href="<?=$url?>";
        },2000)
    </script>
    <?php
}

?>