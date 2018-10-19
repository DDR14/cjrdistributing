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
        require_once  "inc/inc.press-list.php";
        ?>
       
        
        <div class="modal">
            <a class="close-modal" href="#">X</a>
            <CENTER>
                <div>You are requesting to access information that is only accessible to CJR Customers. If you are existing customer, please contact CJR for access by calling 800 733 2302</div>
                </br>
                <a class="btn btn-warning" href="registration.php">Register or Login</a>
                <a class="btn btn-info" href="protected.pdf">Input Access Code</a>
            </CENTER>
        </div>

        <section class="clickerpress page machine" id="clickerpress">        
            <div class="container-fluid">
                <h1>All Presses</h1>
                <?php getClickerPresses(); ?>
            </div>
        </section>
        <?php

        $page = "clicker-press";
        require_once  "inc/inc.footer.php";
        require_once  "script.php";
        ?>
        <script type="text/javascript">
            var modal = $('.modal');
                $('.show-modal').click(function() {
                 modal.fadeIn();
                });

                $('.close-modal').click(function() {
                 modal.fadeOut();
                });
        </script>
    </body>
</html>