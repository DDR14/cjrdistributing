<?php 
include ('lead-details-proc.php');
// if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
//    echo 'Internet explorer';
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
//     echo 'Internet explorer';
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
//    echo 'Mozilla Firefox';
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
//    echo 'Google Chrome';
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
//    echo "Opera Mini";
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
//    echo "Opera";
//  elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
//    echo "Safari";
//  else
//    echo 'Something else';

$sort_handle = '<span role="button" class="glyphicon glyphicon-th-list" ></span>';
$sort_delete = '<a class="delete text-danger glyphicon glyphicon-remove" ></a>';

function addFieldValue($field = '', $value = '') {
    global $sort_handle, $sort_delete;
    return $sort_handle . '<input style="width:240px; display:inline-block" title="the character \';\' is invalid" '
            . 'pattern="[^;]+" type="text" class="small form-control" name="fields[]" value="' . $field . '" />'
            . '<input style="width: 240px; display: inline-block" title="the character \';\' is invalid" '
            . 'pattern="[^;]+" type="text" class="small form-control"name="values[]" value="' . $value . '"/>'
            . $sort_delete;
}

function addSingleField($field = '') {
    global $sort_handle, $sort_delete;
    return $sort_handle . '<input style="width:482px; font-weight: bold; display:inline-block" '
            . 'title="the character \';\' is invalid" pattern="[^;]+" type="text" '
            . 'class="small form-control" name="fields[]" value="' . $field . '" />'
            . '<input type="hidden" value="" name="values[]" />'
            . $sort_delete;
}

function addSpace() {
    global $sort_handle, $sort_delete;
    return $sort_handle . '<input class="disabled form-control" disabled style="width:482px; '
            . 'display:inline-block" /><input type="hidden" value="" name="values[]" />'
            . '<input type="hidden" value="" name="fields[]" />'
            . $sort_delete;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CJR DISTRIBUTING CLICKER PRESS</title>
        <meta name="description" content="Largest CLICKER PRESS supplier in America. Guaranteed best prices for new machines with 1 year warranty. Parts and service available"/>
        <meta name="keywords" content="clicker press, swing arm clicker press, swing arm press, Beam Press, Traveling head press"/>
        <meta http-equiv="Cache-control" content="no-cache">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/mystyles.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/AdminLTE.min.css">
        <link rel="stylesheet" href="css/skins/_all-skins.min.css">
        <?php 
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
            echo '<link rel="stylesheet" type="text/css" href="css/printchrome.css">';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
            echo '<link rel="stylesheet" type="text/css" href="css/printchrome.css">';
        else
            echo '<link rel="stylesheet" type="text/css" href="css/printfire.css">';
         ?>
        
            <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
            <script src="js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
            <script type="text/javascript" src="css/jquery-ui.js"></script>
            <script type="text/javascript" src="js/my_js.js"></script>
            <script type="text/javascript" src="js/presses_js.js"></script>
            <script src='tinymce/js/tinymce/tinymce.min.js'></script>
           <?php 
                $sort="SELECT * FROM suppliers_machine WHERE invoice_number='$id'";
                $sortquery=mysqli_query($treyanusers, $sort);
                while($sortrow=mysqli_fetch_assoc($sortquery)){
                    $sortid=$sortrow['id'];


            echo '<script>';
            echo '$(function () {';
                echo '$("#sortable'.$sortid.'").sortable({placeholder: "ui-state-highlight"});';
                echo '$("#sortable'.$sortid.'").disableSelection();';
                echo '$("#sortable'.$sortid.'").on("click", "a.delete", function () {';
                    echo '$(this).parent().fadeOut(400, function () {';
                        echo '$(this).remove();';
                    echo '});';
                echo '});';
                echo '$(".adder").click(function (e) {';
                    echo 'e.preventDefault();';
                    echo 'var text = "";';
                    echo 'switch ($(this).attr("id")) {';
                        echo 'case "fieldvalue":';
                            echo 'text = "<?= addslashes(addFieldValue()); ?>";';
                            echo 'break;';
                        echo 'case "singlefield":';
                            echo 'text = "<?= addslashes(addSingleField()); ?>";';
                            echo 'break;';
                        echo 'case "spacefield":';
                            echo 'text = "<?= addslashes(addSpace()); ?>";';
                            echo 'break;';
                    echo '}';
                    echo 'var $li = $("<li/>").html(text);';
                    echo '$("#sortable'.$sortid.'").append($li);';
                    echo '$("#sortable'.$sortid.'").sortable("refresh");';
                echo '});';
            echo '});';

        echo '</script>';
    }
        ?>
          
    </head>
    <body>
        <div class="container">
            <?php
            include "header.php";
            ?>
            
            <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#supplierInvoice" aria-controls="home" role="tab" data-toggle="tab">Invoice</a></li>
                <?php
                $press_number=1;
                $sql1="SELECT * FROM suppliers_machine WHERE invoice_number='$id'";
                $query1=mysqli_query($treyanusers, $sql1);
                while($row1=mysqli_fetch_assoc($query1)){
                if($row1['sn']!=''){
                    $sn=$row1['sn'];
                }else{
                    $sn='Press '.$press_number;
                }

                ?>
                <li role="presentation"><a href="#orderPress<?php echo $row1['id'];?>" aria-controls="history" role="tab" data-toggle="tab"><?php echo $sn;?></a></li>

                <?php  $press_number++; } ?>
                <li role="presentation"><a href="#addpress" aria-controls="home" role="tab" data-toggle="tab">+ Press</a></li>
              </ul>
              
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="supplierInvoice">
                    <?php include 'supplier_invoice.php'; ?>
                </div>
                <?php
                $press_number=1;
                $sql1="SELECT * FROM suppliers_machine WHERE invoice_number='$id'";
                $query1=mysqli_query($treyanusers, $sql1);
                while($row1=mysqli_fetch_assoc($query1)){
                $supplier_machine_id=$row1['id'];
                echo '<div role="tabpanel" class="tab-pane" id="orderPress'.$supplier_machine_id.'">';
                $sql3 = "SELECT * FROM `suppliers_machine` WHERE `id` = '$supplier_machine_id'";
                $query3 = mysqli_query($treyanusers, $sql3);
                $row3 = mysqli_fetch_assoc($query3);
                include 'supplier_machine.php'; 
                echo '</div>';
                echo '</div>';
                $press_number++; 
                }
                ?>
                <div role="tabpanel" class="tab-pane active" id="addpress">
                    <?php include 'add_press.php'; ?>
                </div>
            </div>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <!-- InstanceEndEditable -->
            <div class="clearfix"></div>
            <br/><br/>
            <!-- <p><a href="http://cjrtec.com/links.php">LINKS</a></p> -->
        </div>
    </body>
    <script type="text/javascript">
    $(function(){
        $('#hot_leads').on('change',function(){
            var hot = 'yes';
            var hot_id = '<?php echo $id; ?>';
            var hot_not = '';
            if ($(this).is(':checked')) {
                $.ajax({
                    type: 'POST',
                    url: 'hot_leads_proce.php',
                    data: {hot: hot, hot_id: hot_id}
                })
                .done(function( msg ) {
                    alert( "Update Success: " + msg );
                });

                var z = parseInt($('.hot_lead').text(),10);
                $('.hot_lead').text(z+1);
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'hot_leads_proce.php',
                    data: {hot: hot_not, hot_id: hot_id},
                    // success:function(data) {
                    //      return data; 
                    // }
                })
                .done(function( msg ) {
                    alert( "Update Success: " + msg );
                });
                var z = parseInt($('.hot_lead').text(),10);
                $('.hot_lead').text(z-1);
            }
        });
    });
    </script>
    <script type="text/javascript">
        
        //anchor script

        $("#theSelect").on("change", function () {
        $("#link").prop("href", "view_invoice.php?article_id=<?php echo $id; ?>&invoice=" + this.value);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if(location.hash) {
                $('a[href=' + location.hash + ']').tab('show');
            }
            $(document.body).on("click", "a[data-toggle]", function(event) {
                location.hash = this.getAttribute("href");
            });

        });
        $(window).on('popstate', function() {
            var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
            $('a[href=' + anchor + ']').tab('show');
        });

$('input.example').on('change', function() {
     if(document.getElementById('system').checked){
        window.location='http://www.cjrtec.com/client/lead-details.php?<?php echo uniqid();?>&article_id=<?php echo $id;?>&&&notetype=0&&#callHistory';
        return false;
    }if(document.getElementById('customer').checked){
        window.location='http://www.cjrtec.com/client/lead-details.php?<?php echo uniqid();?>&article_id=<?php echo $id;?>&&&notetype=1&&#callHistory';
        return false;
    }
    $('input.example').not(this).prop('checked', false);  
});

function checkvalue(val)
{
    if(val!=""){
        var val = val;
        $.ajax({
        type: 'POST',
        url: 'getmachine.php',
        data: {val: val},
        dataType:'JSON', 
        success: function(response){
            $("div.well").html("");
            $.ajax({
            type: 'POST',
            url: 'displaymachine.php',
            data: {field: response.fields, values: response.values},
            success: function(html) {
            $("div.well").append(html);
            }
            });
        }
        });

        
    }else{
        $("div.well").html("");
        $.ajax({
            type: 'POST',
            url: 'displaymachine.php',
            success: function(html) {
            $("div.well").append(html);
            }
            });
    }
}


    </script>

<!-- InstanceEnd -->