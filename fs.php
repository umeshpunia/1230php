<!-- 
    file system method ->
        mkdir -> make directory
        rmdir -> remove directory
        is_dir -> check directory
        unlink -> file delete
        file_put_content -> create file
        fopen -> open a file
 -->

<?php

$fo = fopen("1.txt", "r");

while (!feof($fo)) {
    echo $line = fgets($fo);

}

?>