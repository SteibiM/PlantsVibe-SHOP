<?php

    // asa luam in MYSQL data si trebuie pus la sfarsit ;
    $sql="SELECT * FROM produsetable;";
    //query=interogare/$sql este intrusctiunea/staiment ce dorim sa introducem in baza noastra de data si sa o rulam iar ca rezultat sa primim ce a returnat 
    $result=mysqli_query($conn,$sql);
    // facem o verificare daca am primit ceva si facem cu mysqli_num_rows o metoda care returneaza numarul de linii din db care ar trebui sa fie mai mare >0 daca este ceva
    $resultCheck=mysqli_num_rows($result);
    
    if($resultCheck>0){
        // While a row of data exists, put that row in $row as an associative array
        $vector_date_db=[];
        while($row=mysqli_fetch_assoc($result)){
      
               array_push($vector_date_db,new Produs($row['produs_nume'],$row['amount'],$row['descriere'],$row['images'],$row['tag']));
               
        }
      
    }

  
    function console_log($output, $with_script_tags = true) {
        //facem o conversie astfel incat spre js pentru a folosi din js consolelog
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
        if ($with_script_tags) {
            // daca este adevarat atunci introducem in program script cu consola care sa afiseze ce am trimis
            $js_code = '<script>' . $js_code . '</script>';
        }
            echo $js_code;
        }
    
?>    