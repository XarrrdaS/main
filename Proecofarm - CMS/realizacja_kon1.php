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
    <link rel="stylesheet" href="CSS/bootstrap_kon1.min.css">
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-lights">
        <div class="collapse navbar-collapse" id="navbarResponsive">
                
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">Kontrast
                    </a>
                </li>
                </ul>
                <form action="realizacja.php">
                    <button type="submit" title="Tryb domyślny" class="text-black">Tryb domyślny</button>
                    </form>
                    <form action="realizacja_kon.php">
                    <button type="submit" title="Wysoki kontrast - tryb czarny i biały" class="text-black">Aa</button>
                    </form>
                    <form action="realizacja_kon1.php">
                    <button type="submit" title="Wysoki kontrast - tryb czarny i żółty" style="background-color:	#070707" class="text-warning">Aa</button>
                    </form>
                    <form action="realizacja_kon2.php">
                    <button type="submit" title="Wysoki kontrast - tryb żółty i czarny" style="background-color:	#FFFF00">Aa</button>
                </form>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container color-text">
            <a class="navbar-brand" href="index_kon1.php">
                <img src="Images/logo/logo1.png" height="75" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index_kon1.php#cel">Cel Operacji
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_kon1.php#opis">Opis Operacji</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Aktualności
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="realizacja_kon1.php">Realizacja projektu</a>
                            <a class="dropdown-item" href="index_kon1.php#galeria">Galeria</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_kon1.php#informacje">Informacje</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <?php
                       require 'baza/db.php';
                       //$db = new mysqli('localhost', 'root', '', 'cms');
                       $sql = "SELECT * FROM posts";
                       $result = $db->query($sql);
                       $row = $result->fetch_assoc();
                       $title = $row['title'];
                       $heading = $row['heading'];
                       $content_poczatek = $row['content_poczatek'];
                       $content_main = $row['content_main'];
                       $content_main2 = $row['content_main2'];
       
                           echo '
                           <section id="cel" class="text-warning">
                           <div class="container" >
                               <div class="row">
                                   <div class="col text-left ">
                                       <h3 class="text-center">'.nl2br(wordwrap($title, 25, " ", 1)).'</h3>
                                       <h4>'.nl2br(wordwrap($heading, 25, " ", 1)).'</h4>
                                       <p style="text-align: justify">
                                           &nbsp&nbsp&nbsp '.nl2br(wordwrap($content_poczatek, 25, " ", 1)).'
                                       </p>
                                  
                           </div>
                       </section>
                       <section class="section3">
                               <div class="container  text-warning">
                                  <div class="row">
                                      <div class="col-md-5">
                                          <div class="imgAbt">';
                           ?>
                                          
                                          <?php
           $query = " select * from image ";
           $result = mysqli_query($db, $query);
    
           while ($data = mysqli_fetch_assoc($result)) {
           ?>
               <img width=100% height=100% src="../admin/image/<?php echo $data['filename']; ?>">
    
           <?php
           }
           ?>
                       <?php
                              echo
                                          '</div>
                                      </div>
                                      <div class="col-md-7">
                                       <p style="text-align: left">
                                       &nbsp&nbsp&nbsp '.nl2br(wordwrap($content_main, 25, " ", 1)).'
                                       </p>
                                      </div>
                                  </div>
                                  <div class="row">
                                   <div class="col-md-5">
                                      
                                   </div>
                   
                   
                                   <p style="test-align: left">
                                   &nbsp&nbsp&nbsp '.nl2br(wordwrap($content_main2, 25, " ", 1)).'
                                   </p>
                               </div>
                              </div>
                           </div>
                       </section>
                           ';
                       mysqli_close($db);
                   ?>
  

    
    <footer class="page-footer font-small special-color-dark" class="text-warning">
        <div class="footer-copyright">
            <div class="text-warning">
            <div class="text-white text-center py-3">© <span id="current_date"></span> Copyright: ProEcoFarm
                    </div>
            </div>
        </div>
    </footer>
    </section>
</header>
<script src="JS/jquery.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/jquery.min.js"></script>
<script src="JS/main.js"></script>
<script src="JS/smooth-scroll.js"></script>
<script>
        date = new Date();
        year = date.getFullYear();
        document.getElementById("current_date").innerHTML = year;
        </script>
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