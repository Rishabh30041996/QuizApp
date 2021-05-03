<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
    header("location: login.php");
}

?>

<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--CSS file path-->
    <link rel="stylesheet" href="css/style.css">

    <title>Login system</title>

  </head>

  <body>

      <!--Menu Sidebar-->
      <section>
        <div class="home">
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="#">Home</a>
                <a href="#">Topics</a>
                <a href="#">About Us</a>
                <a href="#">Contact</a>
            </div>

            <div id="main">

                <button class="openbtn" onclick="openNav()">☰</button>
                <img src="css/images/logo.png" alt="LoGo" height="80px" width="100px" style="margin-left: 28%;">
                <span class="dlLogo"><strong> Demon Lord Academy</strong></span>
                <div class="buttons d-grid gap-3 d-md-flex">

                  <a class="users nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>

                  <!--Logout Button-->
                  <button type="button" class="btn btn-outline-primary" onclick="document.location='http://localhost/quizApp/logout.php'">LOGOUT</button>  
                    
                </div>
            </div>

        </div>

        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
        <br>

        <!--Website info-->
        <div class="info">
            <h1 style="font-family: Euphoria Script;">Welcome To Demon Lord Academy</h1> <br>

            <div class="thought">

                <p class="message"><img src="css/images/rishabh.png" alt="" height="100px" width="100px"
                        style="float: left; margin:auto 10px;">Here you will not only practise quiz but also learn how to
                    solve quiz in given period of time. It will help you in boosting your knowledge
                    and also increases speed of solving quiz. <br>
                    <span style="float: right; font-weight: light;"><em> Rishabh Singh Panwar</em></span>
                </p>

            </div>

        </div>

    </section>

    <br>
    <hr>
    <br>

                                    <!--Quiz Section-->

    <section class="white-section" id="pricing">
        <div class="demo">
            <h2 style="font-family: arapey; font-weight: bolder;">Demo Test</h2>
            <p style="font-weight: merriweather;">Here are some demo quiz, give it a try and test your knowledge.</p>
        </div>


        <!--Javascript Quiz-->
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col1 pricing-column col-lg-4 col-md-6">
                <div class="card w3-animate-top">
                    <div class="backcolor1 card-header">
                        <h3>Javascript</h3>
                    </div>
                    <div class="backg card-body">
                        <h2>DEMO</h2>
                        <p>Number of Question: 10</p>
                        <p>Time alloted: 5 min.</p>
                        <p>Negative Marking: No</p>
                        <button class="btncolor btn btn-lg btn-block btn-outline-dark" type="button" onclick="document.location='http://localhost/quizApp/quizBack/javascriptmain.php'">START</button>
                    </div>
                </div>
            </div>


            <!--HTML Quiz-->
            <div class=" col1 pricing-column col-lg-4 col-md-6">
                <div class="card">
                <div class="card w3-animate-zoom">
                    <div class="backcolor2 card-header">
                        <h3>HTML</h3>
                    </div>
                    <div class="backg card-body">
                        <h2>DEMO</h2>
                        <p>Number of Question: 10</p>
                        <p>Time alloted: 5 min.</p>
                        <p>Negative Marking: No</p>
                        <button class="btncolor btn btn-lg btn-block btn-dark" type="button" onclick="document.location='http://localhost/quizApp/quizBack/main.php'">START</button>
                    </div>
                </div>
                </div>
            </div>


            <!--CSS Quiz-->
            <div class="col1 pricing-column col-lg-4 col-md-12">
                <div class="card">
                <div class="card w3-animate-bottom">
                    <div class="backcolor3 card-header">
                        <h3>CSS</h3>
                    </div>
                    <div class="backg card-body">
                        <h2>DEMO</h2>
                        <p>Number of Question: 10</p>
                        <p>Time alloted: 5 min.</p>
                        <p>Negative Marking: No</p>
                        <button class="btncolor btn btn-lg btn-block btn-dark" type="button" onclick="document.location='http://localhost/quizApp/quizBack/cssmain.php'">START</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>


                                  <!--Footer Section-->
                                  
    <footer class="white-section" id="footer">
        <i class="social-icon fab fa-facebook-f"></i>
        <i class="social-icon fab fa-twitter"></i>
        <i class="social-icon fab fa-instagram"></i>
        <p>© Copyright 2021 DL-Academy</p>
    
    </footer>
 
  </body>
</html>