<?php 
include('dbh.inc.php'); 
//verificam daca sa apasat submit
if(isset($_POST['submit'])){
    // $_FILES este o variabila gloabala care ia toate informatile din file atunci cand dorim sa incarcam folosind un input dintr un form
    // acest lucru ne ofera o groaza de informati sub forma unui Array asociativ primul al fi numele,type (ex:image/jpeg),tmp_name ->
    //nume temporar adica locatia temporara a fisierului pentru ca momentan nu am facut upload la fiseir si este salvat undeva in PC temporar
    //inainte sa fie upload,error => daca are asociat 0 inseamna ca fost incarcat si size are asociat marimea
  
    // $file=$_FILES['image'];
 
    //date extrase din formular 
    $produsName=$_POST['fname'];
    $produsDescriere=$_POST['fdescriere'];
    $produsPret=$_POST['fprice'];
    $produsTip=$_POST['ftag'];
     


    $fileName=$_FILES['image']['name'];
    // foarte important
    $fileTmpName=$_FILES['image']['tmp_name'];
    $fileSize=$_FILES['image']['size'];
    $fileError=$_FILES['image']['error'];
    $fileType=$_FILES['image']['type'];

   //acum o sa permitem doar pozelor de dip jpeg sa fie permise
    //explode este o functie care ne permite sa spargem un string intr-un vector cu o anumita limita de elemente daca vrem 
    $fileExtensie=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExtensie));
    //ce fel de fisier vrem sa lasam sa incarcam
    $allowed=array('jpg','jpeg','png','pdf');
    //verificam daca exista extensia noastra in vectorul de extensi pe care le dorim sa le incarcam
    if(in_array($fileActualExt, $allowed)){
        if($fileError===0){
            if($fileSize<700000){
                //facem upload la file folosind atribuirea unui id unic ,acesta va fi unic de fiecare data 23lungime
                //dorim sa facem asta pentru ca nu dorim sa facem o suprascriere de fisiere si astfel le atribuim un id unic
                //practic am creat creat numle pozei cu un nume nou 
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination='up/'.$fileName;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "Succes";

                // insert data in database

                $sqli="INSERT INTO produsetable(produs_nume,descriere,amount,images,tag) 
                    VALUE('$produsName','$produsDescriere','$produsPret','$fileName',' $produsTip')";
                mysqli_query($conn,$sqli);
                echo "Loaded!";
            }else{
                echo "File este prea mare!";
            }
        }else{
            echo "Este o eroare la incarcare!";
        }
    }else{
        echo " Nu poti sa faci upload de acest tip!";
    }


}


?>