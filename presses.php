<?php
require_once('./treyanusers.php');
mysqli_select_db($treyanusers, $database_treyan);

if (isset($_POST['submitted'])){
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="Cache-Control" content="no-cache" />
            <meta http-equiv="Pragma" content="no-cache" />
            <meta http-equiv="Expires" content="0" />
            <title>CJR DISTRIBUTING CLICKER PRESS</title>
            <meta name="description" content="Largest CLICKER PRESS supplier in America. Guaranteed best prices for new machines with 1 year warranty. Parts and service available"/>
            <meta name="keywords" content="clicker press, swing arm clicker press, swing arm press, Beam Press, Traveling head press"/>

            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
            <link rel="stylesheet" type="text/css" href="css/mystyles.css" />
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
            <link rel="stylesheet" href="css/AdminLTE.min.css" />
            <link rel="stylesheet" href="css/skins/_all-skins.min.css" />
            <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
            <script src="js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
            <script type="text/javascript" src="css/jquery-ui.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script> 
            <script type="text/javascript" src="js/my_js.js"></script>
            <script type="text/javascript" src="js/presses_js.js"></script>
            <script type="text/javascript" src="sorter/jquery.tablesorter.js"></script>
            
    </head>
    <body>
        <div class="container">
            <?php include "header.php"; ?>
            <h1>Press Machines List</h1>
            <a class='btn-lg btn-success pull-right' href=presses_new.php?<?= uniqid(); ?>>New Press</a>
            <div class='clearfix'></div>
            <div class="container-fluid table-responsive">
            Query string: <span></span>
                <table class='table table-bordered table-striped tablesorter table-responsive' border=1 >
                    <tr>
                        <thead>
                            <th>New Machine Id</th>
                            <th>MODEL NUMBER</th>
                            <th>Machine Type</th>                            
                            <th>Ordered Price</th>
                            <th>In Stock Price</th>
                            <th>Img Main</th>
                            <th>Action</th>
                            <th>In-Stock</th>
                            <th>Ads Banner</th>
                        </thead>
                    </tr>
                    <tbody id="sortable">
                    <?php                    
                    $result = mysqli_query($treyanusers, "SELECT * FROM `machines` order by machine_number ASC") or trigger_error(mysqli_error());
                    while ($row = mysqli_fetch_array($result)) {
                        foreach ($row AS $key => $value) {
                            $row[$key] = stripslashes($value);
                        }
                        echo "<tr id='item-".$row['new_machine_id']."'>";                        
                        echo "<td valign='top'>" . nl2br($row['machine_number']) . "</td>";
                        echo "<td valign='top'>" . $row['machine_tonnage'] . '-' 
                                . $row['type_abbr'] . '-' 
                                . $row['cnc'] . '-' 
                                . $row['factory'] . '-' 
                                . $row['customized'] . "</td>";
                        echo "<td valign='top'>" . nl2br($row['machine_type']) . "</td>";                        
                        echo "<td valign='top'>" . nl2br($row['ordered_price']) . "</td>";
                        echo "<td valign='top'>" . nl2br($row['in_stock_price']) . "</td>";
                        echo "<td valign='top'><img src='http://www.cjrtec.com/images/uploads/" . nl2br($row['img_main']) . "' style='height:50px' /></td>";
                        echo "<td valign='top'><a href=presses_edit.php?id={$row['new_machine_id']}>Edit</a><br/><br/>
                                                <a href='delete_press.php?".uniqid()."&id={$row['new_machine_id']}'>Delete</a></td>";
                       ?>

                       <td><input type="checkbox" name="instock" <?php echo ($row['status']=='In-Stock'? 'checked' : '');?> id="instock" value="yes" onclick="save_checkbox('to_print',<?php echo $row['new_machine_id'];?>)"  ></td>

                       <?php
                       echo "<td valign='top'><img src='http://www.cjrtec.com/images/uploads/" . nl2br($row['ads']) . "' style='height:50px' /></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody></table>
                    
            </div>
            <a href="#" id="back-to-top" title="Back to top"><span class="glyphicon glyphicon-arrow-up"></span></a>
        </div>
    </body>
</html>
<script type="text/javascript">
    $('tbody').sortable({
         axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');

        // POST to server using $.post or $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: 'editsortable.php',
             dataType:'JSON', 
            success: function(response){
                if (response.success=1){
                    location.reload();
                    alert(response.blablabla);
                }
                console.log(response.success);
        // put on console what server sent back...
    }
        });
    }
});
</script>