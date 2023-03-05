<!DOCTYPE html>
<html lang="PL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- dodac polkskie tagi -->
    <meta name="Description" content="Pozyskiwanie najwyższej jakości wołowiny kulinarnej w oparciu o żywienie pastwiskowe bydła sterowane za pomocą systemu IoT">
    <meta name="author" content="Vivende">
    <!-- dodac tłumaczenie dla słów kluczowych -->
    <meta name="keywords" content="wołowina kulinarna, zywienie pastwiskowe bydła, opaski,ARIMR, IoT, opaski, jedzenie, mamki, bydlo, pastwiska, IT, nowoczesne rolnicwtwo, Vivende, ZODR, Poznań, Zielona góra.">
    <title>Pozyskiwanie najwyższej jakości wołowiny kulinarnej </title>
    <!-- CSS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2EH7XHP4FX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2EH7XHP4FX');
</script>
    <link rel="stylesheet" href="CSS/main_kon.css">
    <link rel="stylesheet" href="CSS/gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://blog.compsoul.pl/tmp/cache/stylesheet_combined_504e3d3a7eaa0757c0c6107145604802.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/bootstrap_kon2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="shortcut icon" href="Images/logo/ikona.ico">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2EH7XHP4FX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2EH7XHP4FX');
</script>
</head>
<!--/head-->

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="collapse navbar-collapse" id="navbarResponsive">
                
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">Kontrast
                    </a>
                </li>
                </ul>
        <form action="index.php">
        <button type="submit" title="Tryb domyślny" class="text-black">Tryb domyślny</button>
        </form>
        <form action="index_kon.php">
        <button type="submit" title="Wysoki kontrast - tryb czarny i biały" class="text-black">Aa</button>
        </form>
        <form action="index_kon1.php">
        <button type="submit" title="Wysoki kontrast - tryb czarny i żółty" style="background-color:	#070707" class="text-warning">Aa</button>
        </form>
        <form action="index_kon2.php">
        <button type="submit" title="Wysoki kontrast - tryb żółty i czarny" style="background-color:	#FFFF00">Aa</button>
    </form>
      </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning sticky-top">
        <div class="container color-text">
            <a class="navbar-brand" href="#">
                <img src="Images/logo/logo1.png" height="75" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#cel">Cel Operacji
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#opis">Opis Operacji</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Aktualności
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="realizacja_kon2.php">Realizacja projektu</a>
                            <a class="dropdown-item" href="index.php##galeria">Galeria</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#informacje">Informacje</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <header>
        <!--1-->
        <section>
            <div class="container">
                <img src="Images/slider/logotyp.png" class="img-fluid" alt="logotyp_projektu">
            </div>

        </section>

        


        <?php
                    require 'baza/db.php';
                    //$db = new mysqli('localhost', 'root', '', 'cms');
                    $sql = "SELECT * FROM main";
                    $result = $db->query($sql);
                    $row = $result->fetch_assoc();
                    $cel_operacji = $row['cel_operacji'];
                    $tytul_zdj = $row['tytul_zdj'];
                    $opis_operacji = $row['opis_operacji'];
                    $sklad_grupy = $row['sklad_grupy'];
                    $budzet = $row['budzet'];
    
                        echo '<section id="cel">
                        <div class="container">
                            <div class="row">
                                <div class="col text-left">
                                    <h3 class="text-center">Cel Operacji:</h3>
                                    <p>'.nl2br(wordwrap($cel_operacji, 25, " ", 1)).'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col text-left">
                                    <h4 class="text-center">'.nl2br(wordwrap($tytul_zdj, 25, " ", 1)).'</h4>

                                    
                                    <img src="admin/main_img/proecofarm.png" class="img-fluid" alt="Opaski dla bydła – wirtualne ogrodzenie">


                        </div>
            </div>
            </div>
            
                    </section>
                    <section id="opis" class="accordion-section clearfix mt-3" aria-label="Question Accordions">
                        <div class="container">
                            <div class="row">
                                <div class="col text-left">
                                    <h3 class="text-center">Opis Operacji:</h3>
                                    <p>'.nl2br(wordwrap($opis_operacji, 25, " ", 1)).'
                                    </p>
                                </div>
                            </div>
                    </section>
            
            
            
            
            
                    <section id="galeria">
                        <div class="container">
                            <div class="row">
                                <div class="col text-left">
                                    <h3 class="text-center">Galeria</h3>
                                    <div class="gallery-content">'; ?>
                                    <?php
                                    require 'baza/db.php';
                                    //$db = new mysqli('localhost', 'root', '', 'cms');
                                    $query = " select * from gallery_img ";
                                   $result = mysqli_query($db, $query);
                                  $row = $result->fetch_assoc();
            
                                   while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <a class="gallery" href="admin/img_gallery/<?php echo $data['img_name']; ?>"><img id='small_img' src="admin/img_gallery/<?php echo $data['img_name']; ?>"></a>
            
             
                                  <?php
                                    }
                                    ?>
                                    <?php echo'
                                    </div>
                                
            
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="informacje">
                        <div class="container">
                            <div class="row">
                                <div class="col text-left">
                                    <h3 class="text-center">Informacje o projekcie:</h3>
                                    <h4>Skład Grupy Operacyjnej:</h4>
                                    <p> '.nl2br(wordwrap($sklad_grupy, 25, " ", 1)).'</p>
                                    <h4>Budżet Operacji:</h4>
                                    <p>
                                    '.nl2br(wordwrap($budzet, 25, " ", 1)).'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                        ';
                    mysqli_close($db);
                   ?>
        
        
        
        
        <footer class="page-footer font-small special-color-dark">
            <div class="footer-copyright">
                <div class="text-center">
                <div class="text-white text-center py-3">© <span id="current_date"></span> Copyright: ProEcoFarm
                    </div>
                </div>
            </div>
        </footer>
        </section>
    </header>
    <script>
        date = new Date();
        year = date.getFullYear();
        document.getElementById("current_date").innerHTML = year;
        </script>
    <script src="JS/jquery.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/smooth-scroll.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <script>
        myID = document.getElementById("bttp");

        var myScrollFunc = function() {
            var y = window.scrollY;
            if (y >= 1200) {
                myID.className = "btt show"
            } else {
                myID.className = "btt hide"
            }
        };
        window.addEventListener("scroll", myScrollFunc);
    </script>
    <script src="comp.js"></script>
    <script src="gallery.js"></script>
    <script>
        (function($) {
            $(".gallery").gallery();
        })(Comp);
    </script>
</body>

</html>