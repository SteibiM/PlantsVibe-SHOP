<?php
    include_once 'php/dbh.inc.php';
    include("php/card.php");
    include("php/code.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructe&Legume</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

     <div class="grid-container">
         <div class="item1">
              <h3>-Legume&Fructe-</h3>
              <a target="_blank" href="index.php"><img class="logo" src="poze/poza.png" alt="logo/css"></a>
             
        </div>
     
      
         <div class="item3">         
                    <div class="category-bar">
                        <ul>
                            <li class="dropdown">
                                <button class="dropbtn">
                                    Fructe <i class="fa fa-apple"></i>
                                </button>
                                <div class="dropdown-content">
                                    <div class="header">
                                        <h1>Fructe</h1>
                                    </div>  
                                    <div class="row">
                                        <div class="colum">
                                          <h3>Fructe tropicale</h3>
                                          <a href="#">Citrice</a>
                                          <a href="#">Fructe zaharoase</a>
                                          <a href="#">Fructe uleioase </a>
                                          <a href="#">Fructe acidulate</a>
                                        </div>
                                        <div class="colum">
                                          <h3>Fructe din Romania</h3>
                                          <a href="#">Fructe astringente </a>
                                          <a href="#">Fructe zaharoase</a>
                                          <a href="#">Fructe uleioase </a>
                                          <a href="#">Fructe acidulate</a>
                                        </div>
                                        
                                </div>
                            </li>
                            <li class="dropdown">
                                <button class="dropbtn">
                                    Legume <i class="fa fa-leaf"></i>
                                </button>
                                <div class="dropdown-content">
                                    <div class="header">
                                        <h1>Legume</h1>
                                    </div>  
                                    <div class="row">
                                        <div class="colum">
                                          <h3>Legume de sezon</h3>
                                          <a href="#">Rădăcinoase</a>
                                          <a href="#">Salate</a>
                                          <a href="#">Legume Crucifere</a>
                                        </div>
                                        <div class="colum">
                                          <h3>Legume din Romania</h3>
                                          <a href="#">Rădăcinoase</a>
                                          <a href="#">Legume cu frunze</a>
                                          <a href="#">Legume cu Tuberculi</a>
                                        </div>
                                        
                        
                                </div>
                            </li>
                            <li class="dropdown">
                                <button class="dropbtn">
                                    Coș <i class="fa fa-shopping-cart"></i>
                                </button>
                                <div class="dropdown-content">
                                    <div class="header">
                                        <h1>Coș</h1>
                                    </div>  
                                    <div class="col">
                                        <div class="rand">
                                          <h3>Lista</h3>
                                          <div class="element">

                                               <a class="car-name-row" href="#">Mar</a>
                                               <div class="input_box">
                                                    <input class="input__b remove-btn" type="button"  value="X" >
                                                    <input class="input__b cantitate-btn" type="button" value="-">
                                                    <input class="input__t cantitate-text" type="text"   value="5">
                                                    <input class="input__b cantitate-btn" type="button" value="+">
                                              </div>
                                                <div class="totalp">5 lei/5</div>
                                               
                                         </div>
                                         <div class="element">
                                          <a class="car-name-row" href="#">Coș Vitamine</a>
                                          <div class="input_box">
                                            <input class="input__b remove-btn" type="button"   value="X" >
                                            <input class="input__b cantitate-btn" type="button" value="-">
                                            <input class="input__t cantitate-text" type="text"   value="1">
                                            <input class="input__b cantitate-btn" type="button" value="+">
                                         </div>
                                            <div class="totalp">20 lei/1</div>
                                        </div>
                                        <div class="element">
                                          <a  class="car-name-row" href="#">Kaki</a>
                                          <div class="input_box">
                                            <input class="input__b remove-btn" type="button"  value="X" >
                                            <input class="input__b cantitate-btn" type="button" value="-">
                                            <input class="input__t cantitate-text" type="text"   value="3">
                                            <input class="input__b cantitate-btn" type="button" value="+">
                                         </div>
                                        <div class="totalp">14 lei/3</div>
                                        </div>
                                        </div>
                                        <div class="rand">
                                          <div class="tab">
                                            <a href="cos.html">Vezi coș</a>
                                         </div>
                                          
                                        </div>
                                     
                        
                                </div>
                            </li>
                        </ul>
                    </div>
                        
                    <div class="container">
                        <?php  foreach ($vector_date_db as $item){ ?>
                                    <div class="grid-item"> 
                                        <div class="image"> 
                                      <img class="image__img" src="php/up/<?php echo $item->get_image();?>"/>
                                            <div class="image__overlay">
                                                <div class="image__title"><?php echo $item->get_name(); ?></div>
                                                <div class="image__description"><p><?php echo $item->get_descriere(); ?></p></div>
                                            </div>
                                        </div>
                                        <div class="input__box">
                                            <div class="price"><?php echo $item->get_amount(); ?> lei/kg</div>
                                            <input class="input__b cantitate-btn" type="button"  value="-">
                                            <input class="input__t cantitate-text" type="text"   value="0">
                                            <input class="input__b cantitate-btn" type="button" value="+">
                                            <button class="cos btn-cart">
                                                
                                                <div class="text"><p>Add</p></div>
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </div>    
                        <?php }?>   
                       
                    </div>
                    <div class="paginare-bottom">
                        <ul class="paginare-lista">
                           
                            <li class="p-number active"><a href="#" >1</a></li>
                            <li class="p-number"><a href="#" >2</a></li>
                            <li class="p-number"><a href="#" >3</a></li>
                            <li class="p-number"><a href="#" >4</a></li>
                           
                        </ul>
                    </div>
            </div>
    
         <div class="item4">	&copy;2021 Privacy Policy · Plants Vibe · </div>
    </div>
    <script src="JavaScript/script.js"></script>
</body>
</html>