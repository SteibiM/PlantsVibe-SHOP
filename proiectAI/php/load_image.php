<?php include('dbh.inc.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload.css">
    <title>UPLOAD IMAGINI</title>
</head>
<body>
    <!-- trimitem datele din form ca tranzacti post HTTP plus ca au avantajul ca nu aveam o limita de marire iar data nu se afla in url ci in corpul cereri -->
    <!-- enctype se poate folosi doar impreuna cu post , iar multipart/form-data este necesar daca dorim sa facem upload prin fisier -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fname">Nume produs:</label>
        <input type="text" name="fname"><br><br>
        <label for="fdescriere">Descriere:</label>
        <textarea name="fdescriere" cols="50" rows="5"> </textarea><br><br>
        <label for="fprice">Pret produs:</label>
        <input type="number" name="fprice"><br><br>
        <label for="ftag">Tip:</label>
        <input type="text" name="ftag"><br><br>
        <input type="file" name="image"><br><br>
        <button type="submit" name="submit">UPLOADE DATA</button>
        <p>Aceasta pagina este pentru incarcarea pozele produselor pe phpMyAdmin!</p>
    </form>
   
</body>
</html>