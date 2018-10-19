<?php
session_start();
$base_path = $_SERVER['DOCUMENT_ROOT'] . '/cjrdistributing/';
require_once 'config.php';
require_once 'meta-title1.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $auto_table_beam_desc; ?>">
        <meta name="keywords" content="<?php echo $auto_table_beam_keyw; ?>">
        <meta name="author" content="<?php echo $author; ?>">
        <title><?php echo $auto_table_beam_title; ?></title>
        <?php
        echo $auto_table_beam_cano;
        require_once "head.php";
        require_once "analytics.php";
        ?>
    </head>
    <body>
        <?php
        require_once "inc/inc.navbar.php";
        require_once "inc/inc.press-list.php";
        ?>
        <section class="auto-table-beam-press page machine" id="auto-table-beam-press">
            <div class="container">
                <h1>Auto Table and CNC Beam Press</h1>
                <?php getClickerPresses('Auto Table Beam Press'); ?>
            </div>
        </section>
        <?php
        $page = "auto-table";
        require_once "inc/inc.footer.php";
        require_once "script.php";
        ?>
    </body>
</html>