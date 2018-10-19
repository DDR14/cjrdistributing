<?php
//show new information table
$newinfo_sql = "SELECT * FROM `newinfo_tbl` WHERE `newinfo_id` = '$id'";
$mysql_new_query = mysqli_query($treyanusers, $newinfo_sql);
$row_new = mysqli_fetch_assoc($mysql_new_query);
//show register database
$oldinfo_sql = "SELECT * FROM `registers` WHERE `id` = '$id'";
$mysql_old_query = mysqli_query($treyanusers, $oldinfo_sql);
$row_old = mysqli_fetch_assoc($mysql_old_query);
?>                    
<div class="form_temp container-fluid"> 
    <form action="#" method="post">        
        <div class="row"> 
            <div class="col-sm-6">   
                <b>Last Logon: </b> <?php echo ($row_old["last_logon"] == '0000-00-00 00:00:00') ? 'N/A' : date('m/d/Y g:i A', strtotime($row_old["last_logon"])); ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Company  :</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" size="22" name="company" value="<?php echo $row_old["company"]; ?>" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Contact  :</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="contact" value="<?php echo $row_old["name"]; ?>" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Lead Website  :</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="website" value="<?php echo $row_old["site"]; ?>" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Position  :</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="newinfo_position" value="<?php echo $row_new['newinfo_position']; ?>" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Cust Website  :</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text"name="cust_website" value="<?php echo $row_old['cust_website']; ?>" class="form-control" />
                    </div>
                </div>
                <h4>Address</h4>  
                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Street:</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="add_line1" value="<?php echo $row_old["line1"]; ?>" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>City:</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="city" value="<?php echo $row_old["city"]; ?>" class="form-control"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="pull-left">
                            <label>Country:</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="country" value="<?php echo $row_old["country"]; ?>" class="form-control"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>State:</label> 
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="state" value="<?php echo $row_old["state"]; ?>" class="form-control" />
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="row">
                            <div class="col-sm-4">
                                <label>Zip:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="zip" value="<?php echo $row_old["zip_code"]; ?>" class="form-control" />
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Phone:</label>
                                <?php
                                $phone = $row_old["phone"];
                                $numbers_only = preg_replace("/[^\d]/", "", $phone);
                                $phone_mask = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
                                ?> 
                            </div>
                            <div class="col-sm-8">
                                <input placeholder='000-000-0000' type="text" class="phone onlyNum form-control" name="phone" value="<?php echo $phone_mask; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="row">
                            <div class="col-sm-4">
                                <label>Ext:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="onlyNum form-control" name="newinfo_ext" value="<?php echo $row_old["zip_code"]; ?>">
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Mobile:</label> 
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control onlyNum" name="newinfo_mobile" value="<?php echo $row_new['newinfo_mobile']; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Fax:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control onlyNum" name="newinfo_fax" value="<?php echo $row_new['newinfo_fax']; ?>">
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Email:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="<?php echo $row_old["email"]; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <a class="btn btn-block btn-success" role="button" href="<?php echo 'mailto:' . $row_old["email"]; ?>">Mail</a>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-sm-6">

                <h4><b>Additional Contacts</b></h4>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Password:</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="password" value="<?php echo $row_old["password"]; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Name1:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="newinfo_name_add1" value="<?php echo $row_new['newinfo_name_add1']; ?>">
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Phone1:</label> 
                            </div>
                            <div class="col-sm-8">
                                <input placeholder='000-000-0000' type="text" class="form-control phone onlyNum" name="newinfo_phone1" value="<?php echo $row_new['newinfo_phone1']; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-5">

                        <div class="row">
                            <div class="col-sm-5">
                                <label>Ext1:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control onlyNum" name="newinfo_ext1" value="<?php echo $row_new['newinfo_ext1']; ?>">
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Name2:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="newinfo_name_add2" value="<?php echo $row_new['newinfo_name_add2']; ?>">
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Phone2:</label> 
                            </div>
                            <div class="col-sm-8">
                                <input placeholder='000-000-0000' type="text" class="form-control phone onlyNum" name="newinfo_phone2" value="<?php echo $row_new['newinfo_phone2']; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-5">

                        <div class="row">
                            <div class="col-sm-5">
                                <label>Ext2:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control onlyNum" name="newinfo_ext2" value="<?php echo $row_new['newinfo_ext2']; ?>">
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Name3:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="newinfo_name_add3" value="<?php echo $row_new['newinfo_name_add3']; ?>">
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Phone3:</label> 
                            </div>
                            <div class="col-sm-8">
                                <input placeholder='000-000-0000' type="text" class="form-control phone onlyNum" name="newinfo_phone3" value="<?php echo $row_new['newinfo_phone3']; ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-5">
                                <label>Ext3:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control onlyNum" name="newinfo_ext3" value="<?php echo $row_new['newinfo_ext3']; ?>">
                            </div> 
                        </div>
                    </div>
                </div>

                <h4><b>Other Details</b></h4>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Machine:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="machine" class="form-control" value="<?php echo $row_old['machine']; ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Site:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="site" class="form-control" value="<?php echo $row_old["site"]; ?>" />
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-4">
                        <label for="note">Notes:</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="display_notes form-control" style="height:30px;" name="notes" cols="40" rows="8" class="widebox" id="note"><?php
                            if ($row_old['notes'] == '') {
                                echo $row_old['machine'] . '  ' . $row_old['size'] . '   ' . $row_old['company'];
                            } else {
                                echo $row_old['notes'];
                            }
                            ?>
                        </textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="newinfo_submit">Update</button>
            </div>
        </div>

    </form> 
    <?php
// SHOW NOTES HISTORY
    if (isset($_GET['notetype'])) {
        $notetype = $_GET['notetype'];
    } else {
        $notetype = 1;
    }


    $show_sql = "SELECT * FROM `add_note_registers` WHERE `id` = '$id' AND notes_type = '$notetype' ORDER BY notes_id DESC";
    $result_call_notes = mysqli_query($treyanusers, $show_sql);
    $row_f_c = mysqli_fetch_assoc($result_call_notes);
    ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4">
                    <label>Sales Contact:</label>    
                </div>
                <div class="float-right">
                    <label class="radio-inline"><input required type="radio" name="sales" value="JR">JR</label>                    
                    <label class="radio-inline"><input required type="radio" name="sales" value="MR">MR</label>
                    <label class="radio-inline"><input required type="radio" name="sales" value="BM">BM</label>
                    <label class="radio-inline"><input required type="radio" name="sales" value="S1">S1</label>
                    <label class="radio-inline"><input required type="radio" name="sales" value="S2">S2</label>                    
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="group-inline">
                <div class="col-sm-4">
                    <label>First Contact:</label>    
                </div>
                <div class="col-sm-8">
                    <input class="form-control" type="text" value="<?php
                    if (isset($row_f_c['notes_date_added']) == "") {
                        echo "";
                    } else {
                        echo date('g:i A D, M d, Y', strtotime($row_f_c['notes_date_added']));
                    }
                    ?>" name="" disabled>  
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="group-inline">
                <div class="col-sm-4">
                    <label>Follow up: </label>
                </div>
                <div class="col-sm-8">
                    <input class="form-control" type="text" value="<?php
                    if (isset($row_f_c['follow_up']) == "") {
                        echo "";
                    } else {
                        echo date('g:i A D, M d, Y', strtotime($row_f_c['follow_up']));
                    }
                    ?>" name="" disabled> 
                </div>
            </div>

        </div>
    </div>
    <div class="row-fluid">
        <div class="col-sm-6">
            <!--             <form method="post" action="" name="add_notes">
            -->            <div class="group-sac">
                <label>ADD NOTES HERE:</label>
                <?php echo ($notetype == '1' ? 'checked' : ''); ?>
                <textarea class="form-control" id="notes"></textarea>    
            </div>

            <div class="group-inline" style="margin-bottom: 10px;">
                <label>NOTES HISTORY:</label>
                &nbsp;&nbsp;<input type="checkbox"  name="customer"  id='customer' class="example" >Customer</input>
                &nbsp;&nbsp;<input type="checkbox" name="system" id='system' class="example" >Leave Message</input>
                <div class="display_notes" style="height: 300px;">
                    <?php
                    if (mysqli_num_rows($result_call_notes) > 0) {
                        mysqli_data_seek($result_call_notes, 0);
                        while ($row_call_notes = mysqli_fetch_assoc($result_call_notes)) {
                            if ($row_call_notes['rad_followup'] == true) {
                                $rad = "No Need to Follow up";
                            } else {
                                $rad = "Follow up";
                            }
                            $date = date('h:i A  D, M d, Y', strtotime($row_call_notes['notes_date_added']));

                            if ($row_call_notes['follow_up'] == '') {
                                $date_f = date('h:i A  D, M d, Y', strtotime($row_call_notes['notes_date_added'] . '+2days'));
                            } else {
                                $date_f = date('h:i A  D, M d, Y', strtotime($row_call_notes['follow_up']));
                            }

                            echo '<div class="call_back_notes"><strong>Start Date : </strong> ' . $date . "   <span class='notes_id'>" . $row_call_notes['notes_id'] . "</span> | <a href='lead-details.php?article_id=$id&deletecall={$row_call_notes["notes_id"]}'><img src='Trash-can-icon.png'></a> | " . "<u><strong>" . $row_call_notes['sales'] . "</strong></u> | For <span style='color:red;'><strong>" . $rad . "</strong> </span>| <br/> <br/><span class='notes_text'><strong>" . $row_call_notes['note'] . "</strong></span><br/>
                            <hr style='margin:0px;margin-bottom:5px;'></div>";
                        }
                    } else {
                        echo "No Notes Added Yet!";
                    }
                    ?>
                </div>

            </div>
            <div class="form-group">
                
                    <form>
                        <fieldset id="radio1">
                        <label>Talked</label>
                        <input type="radio" name="radio1"> 
                        <label>Did not talked</label>
                        <input type="radio"  name="radio1">
                        </fieldset>
                
                    </form>
                
            </div>
            <div class="row">
                <div class="group-inline">
                    <div class="col-sm-6">
                        <button class="btn btn-warning btn-md" name="save" id="save">SAVE NOTE W/OUT REMINDER</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-success btn-md" name="notify" id="notify">SAVE NOTE WITH REMINDER</button>
                    </div>
                </div>                
            </div>
            <!--             </form>
            -->        </div>

        <div class="col-sm-6">
            <div class="group-inline">
                <label>SET FOLLOW UP DATE:</label>
                <div class="row-fluid" id="reminders">
                </div>   
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input class="form-control" placeholder="REMINDER DATE" type="text" name="" id="reminderDate">
                    <input type="hidden" name="" class="userId" id="<?= $id; ?>">
                </div>
            </div>
            <div class="group-inline">
                <label>UNSUBSCRIBERS:</label>
                <div class="row-fluid">
                    <form method="post" action="" id="unsub">
                        <?php
                        $val_ser = 'value=' . '"' . $row_old['unsubscribers'] . '"';
                        $val_rep = $val_ser . 'checked';
                        $val_targ = '
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="Sold">  SOLD.<br/> 
                    </div>    
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="fake registration">  Fake registration.<br/> 
                    </div>
                        <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="We\'re not buying right now.">  Not buying right now.<br/> 
                    </div>
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="Our purchase is dependant on an acceptance of a ontract qoute.">  Waiting on contract.<br/>
                    </div>
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="We Bought NEW from someone else.">  Bought NEW from elsewhere.<br/>
                    </div>
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="We Bought USED from someone else.">  Bought USED from elsewhere.<br/>
                    </div>
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="We decided not to buy a Clicker Press.">  Decided not to buy a Clicker Press.<br/> 
                    </div>
                    <div class="form-inline">
                        <input type="radio" class="unsubUsers" style="vertical-align:middle;margin:0px;" name="unsubscribe" value="No Response"> Wont Return Calls or Emails<br/> 
                    </div>
                    <div class="form-inline">
                    <input name="unsubscribe" value="others" type="radio" style="vertical-align:middle;margin:0px;" id="others">OTHERS
                                    
                        
                    ';
                        $uns = str_replace($val_ser, $val_rep, $val_targ);

                        echo $uns;
                        ?>    
                        <input type="text" id="othersText" value="<?= $row_old['unsubOthers']; ?>" name="unsubOthers" style="margin-bottom: 10px;">
                        </div>
                        <div>
                            <button class="btn btn-md btn-warning" type="submit" name="unsubscribers">Release</button>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>