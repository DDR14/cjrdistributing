<?php 


$bought_sql = "SELECT * FROM bought WHERE id = '$id'";
$result_bought = mysqli_query($treyanusers, $bought_sql);
$result_bought2 = mysqli_query($treyanusers, $bought_sql);
?>
<div class="col-xs-12 contain-print">
        <div class="container-fluid">
            <ul class="nav nav-tabs" role="tablist">
<?php
while($row_bought2 = mysqli_fetch_assoc($result_bought2)){
echo '<li role="presentation"><a href="#orderPress'.$row_bought2['bought_id'].'" aria-controls="history" role="tab" data-toggle="tab">'.$row_bought2['invoice_number'].'</a></li>';
}      
?>
</ul>
<div class="tab-content">
<?php
while($row_bought=mysqli_fetch_assoc($result_bought)){
echo '<div role="tabpanel" class="tab-pane" id="orderPress'.$row_bought['bought_id'].'">';
$id=$row_bought['bought_id'];
$show_sql = "SELECT * FROM `add_note_registers` WHERE `id` = '$id' AND notes_type = 2";
$result_war = mysqli_query($treyanusers, $show_sql);
?>

    <div class="form_temp container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <input type="radio" style="vertical-align:middle;margin:0px;" value="1year" name="rad_warranty" checked /><label>1 Year Warranty</label>    
            </div>
            <div class="col-sm-6">
                <input type="radio" style="vertical-align:middle;margin:0px;" value="2years" name="rad_warranty" /><label>2 Year Warranty</label>
            </div>
        </div> 
        <label><?php echo $id;?>@</label>
        <input type="text" name="war_start" value="<?php
        if ($row_bought['dateSold'] == "") {
            echo "";
        } else {
            echo date('D, M d, Y', strtotime($row_bought['dateSold'] . '+10days'));
        }
        ?>"size="22" style="font-size:9px;" disabled />
        <label> Days Left:</label>
        <input type="text" name="days_left" size="22" style="font-size:9px;" disabled value="<?php
        if ($row_bought['dateSold'] == "") {
            echo "";
        } else {
            $day_b = strtotime($row_bought['dateSold'] . '+1year' . '+10days');
            $day_c = time();
            $diff = $day_b - $day_c;
            $countdown = floor($diff / (60 * 60 * 24));
            if ($countdown > 0) {
                echo $countdown;
            } else {
                echo "Warranty Expired";
            }
        }
        ?>" />
        <form method="post" name="notes_warranty" action="">
            <input type=hidden name=user_id value='<?php echo $row_bought['id'];?>'>
            <input type=hidden name=id value='<?php echo $row_bought['bought_id'];?>'>
            <label>Write Note Here :</label>
            <br/>
            <div id="add_Warranty_text">
                <textarea rows="2" cols="40" name="notes_warranty"></textarea>  
            </div>
            <button style="margin-bottom:10px;margin-top:10px;" class="btn btn-primary btn-xs" type="submit" name="add_warranty" id="add_Warranty">Save Note</button>                   
        </form>
        <div class="display_notes" name="note">
        <?php           
            if (mysqli_num_rows($result_war) > 0) {
                while ($row_war = mysqli_fetch_assoc($result_war)) {
                    echo date('g:i A D, M d, Y', strtotime($row_war['notes_date_added'])) ."| <a href='lead-details.php?article_id=$id&deletewar={$row_war["notes_id"]}'><img src='Trash-can-icon.png'></a><br/>" . $row_war['note'] . "<br/><hr>";
                }
            }else{
                echo "NO NOTES ADDED";
            }
        ?>
        </div>
    </div>
</div>

<?php 
}

?>
</div>
</div>
</div>

