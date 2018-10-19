<?php
session_start();
$base_path = $_SERVER['DOCUMENT_ROOT'] . '/cjrdistributing/';
require_once $base_path.'config.php';
require_once 'meta-title1.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $kiss_cut_press_desc; ?>">
        <meta name="keywords" content="<?php echo $kiss_cut_press_keyw; ?>">
        <meta name="author" content="<?php echo $author; ?>">
        <title><?php echo $kiss_cut_press_title; ?></title>
        <?php
        echo $kiss_cut_press_cano;
        require_once $base_path."head.php";
        require_once "analytics.php";
        ?>
    </head>
    <body>
        <?php
        require_once $base_path."inc/inc.navbar.php";
        require_once $base_path."inc/inc.press-list.php";
        ?>
        <section class="kiss-cut-press page machine" id="kiss-cut-press">
            <div class="container-fluid">
                <h1>Kiss Cutting Press</h1>
                <?php getClickerPresses('Kissing Press'); ?>
            </div>
        </section>
        <?php
        $page = "kiss-cut-press";
        require_once $base_path."inc/inc.footer.php";
        require_once $base_path."script.php";
        ?>
    </body>
</html>