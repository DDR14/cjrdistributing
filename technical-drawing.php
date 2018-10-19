<?php
    session_start();

$base_path = $_SERVER['DOCUMENT_ROOT'] . '/cjrdistributing/';
require_once  'config.php';
require_once 'meta-title1.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $clickerpress_desc; ?>">
        <meta name="keywords" content="<?php echo $clickerpress_keyw; ?>">
        <meta name="author" content="<?php echo $author; ?>">
        <title><?php echo $clickerpress_title; ?></title>
        <?php
        echo $clickerpress_cano;
        require_once  "head.php";
        require_once "analytics.php";
        ?>
        <script type="text/javascript">
        function getAccess(){
            var access = document.getElementById(access).value;
            console.log(access);
        }
    </script>
    <style>
        .modal {
          background-color: #dbd9d9;
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          width: 400px;
          height: 200px;
          margin-left: -200px;
          margin-top: -150px;
          padding: 50px;
          border-radius: 5px;
          border-color: #FFAB3D;
          border: 1px;
          z-index: 10;
          box-shadow: 0 0 0 99999px rgba(0, 0, 0, 0.7);

        }
        .modal1 {
          background-color: #dbd9d9;
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          width: 400px;
          height: 200px;
          margin-left: -200px;
          margin-top: -150px;
          padding: 50px;
          border-radius: 5px;
          border-color: #FFAB3D;
          border: 1px;
          z-index: 10;
          box-shadow: 0 0 0 99999px rgba(0, 0, 0, 0.7);

        }
        .close-modal {
          color:  #000;
          text-decoration: none;
          float: right;
          position: absolute;
          top: 10px;
          right: 20px
        }
    </style>
    </head>
    <body>
        <?php
        require_once  "inc/inc.navbar.php";
        ?>
       
        
        <div class="modal">
            <CENTER>
                <div>You are requesting to access information that is only accessible to CJR Customers. If you are existing customer, please contact CJR for access by calling 800 733 2302</div>
                </br>
                <a class="btn btn-warning" href="registration.php">Register or Login</a>
                <a class="btn btn-info access-code" >Input Access Code</a>
            </CENTER>
        </div>

        <div class="modal1">
            <CENTER>
                <div>Please Input Access Code</div>
                </br>
                <input type="text" placeholder="Access Code" id="access" class="form-control"><BR>
                <input type="submit"  class="btn btn-info access-code" value="Submit" onclick="getAccess();"></input>
            </CENTER>
        </div>

        <section class="clickerpress page machine" id="clickerpress">        
            <div class="container-fluid">
                <h1>Technical Drawing</h1>
                <BR>
                <CENTER>
                  <div class="col-md-2">
                  </div>
                  <div class="col-md-8">
                    <div class="col-md-3 col-xs-6"><a href="#"><h3 style="color:#FFAB3D">Front View</h3></a></div>
                    <div class="col-md-3 col-xs-6"><a href="#"><h3 style="color:#269abc">Front View</h3></a></div>
                    <div class="col-md-3 col-xs-6"><a href="#"><h3 style="color:#269abc">Front View</h3></a></div>
                    <div class="col-md-3 col-xs-6"><a href="#"><h3 style="color:#269abc">Front View</h3></a></div>
                    <embed src="10-ton-press-technical-drawing.pdf" width="1000" height="500">
                  </div>
                  <div class="col-md-2">
                  </div>
                </CENTER>
            </div>
        </section>
        <?php

        $page = "clicker-press";
        require_once  "inc/inc.footer.php";
        require_once  "script.php";
        ?>
        <script type="text/javascript">
           
            var modal = $('.modal');
                $(window).load(function() {
                 modal.fadeIn();
                });

             var modal1 = $('.modal1');
                $('.access-code').click(function() {
                 modal1.fadeIn();
                });
                $('.close-modal').click(function() {
                 modal1.fadeOut();
                });
        </script>
    </body>
</html>