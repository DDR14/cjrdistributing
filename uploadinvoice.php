<?php 

    if (isset($_POST['uploadInvForm'])) 
    {
    $invoice_number = mysqli_real_escape_string($treyanusers, $_POST['invoice_number']);


        if (isset($_FILES['upload_inv'])) 
        {
        $up_file = $_FILES['upload_inv']['name'];
        $errors= array();
        $file_name = $_FILES['upload_inv']['name'];
        $file_size =$_FILES['upload_inv']['size'];
        $file_tmp =$_FILES['upload_inv']['tmp_name'];
        $file_type=$_FILES['upload_inv']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['upload_inv']['name'])));
      
        $expensions= array("pdf");
      
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a PDF file.";
        }
      
        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }
      
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"uploads/upload_invoice/".$file_name);
             $insert_inv_sql = "UPDATE leads_purchase_form SET invoiceimg = '$file_name' WHERE invoicenumber = '$invoice_number'";
        mysqli_query($treyanusers, $insert_inv_sql);
        echo "<script>alert('successfully uploaded invoice!!')
         window.location = '../client/lead-details.php?".uniqid()."&article_id=$id#purchaseForm' 
        </script>";
        }else{
            print_r($errors);
        }
        }
    }

    if (isset($_POST['uploadBol'])) 
    {
    $invoice_number = mysqli_real_escape_string($treyanusers, $_POST['invoice_number']);
        if (isset($_FILES['upload_file'])) 
        {
        $up_file = $_FILES['upload_file']['name'];
        $folder = "..images/bol";
        // $folder=dirname(__DIR__)."\images\bol\\";
        $upload_image = substr(md5(rand(1, 99999)), 0, 6) . "." . $up_file;
        move_uploaded_file($_FILES['upload_file']['tmp_name'], $folder . $upload_image);
        }
        $insert_inv_sql = "UPDATE leads_purchase_form SET bol = '$upload_image' WHERE invoicenumber = '$invoice_number' AND id = '$id'";
        mysqli_query($treyanusers, $insert_inv_sql);
        echo "<script>alert('successfully uploaded invoice!!')
         window.location = '../client/lead-details.php?".uniqid()."&article_id=$id#purchaseForm' 
        </script>";
        
    }


 ?>




  <!-- modal invoice to upload on purchase form -->

    <div class="container-fluid">
        <div class="modal fade" id="uploadInvData" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="container modal-contain">
                <div class="well"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <form name="uploadInvForm" method="post" action="" enctype="multipart/form-data"> 
                        <h3>Please Check if upload invoice is the same in background * if you try to upload again this will over right existing file
                        </h3> 
                        <h2>Upload Invoice:</h2>
                        <label>Invoice #: </label><span style="color:red;font-size:8px;">*Required</span>
                        <input class="form-control" type="text" name="invoice_number" placeholder="Enter Invoice Number" required/><br/>
                            <br/>
                        <label>Select file to upload</label><span style="color:red;font-size:8px;">*Required</span>
                        <input type="file" name="upload_inv" class="form-control" required><br/><br/>
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="uploadInvForm">UPLOAD</button>
                    </form>
                </div>
            </div> <!-- container content -->
        </div> <!-- modalfade -->
    </div>

    

  <!-- modal invoice to upload bol from form -->

    <div class="container-fluid">
        <div class="modal fade" id="uploadBol" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="container modal-contain">
                <div class="well"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <form name="uploadBol" method="post" action="" enctype="multipart/form-data"> 
                        <h3>Pleas Check if invoice number is the same *</h3> 
                        <h2>Upload BOL:</h2>
                        <label>Invoice #: </label><span style="color:red;font-size:8px;">*Required</span>
                        <input class="form-control" type="text" name="invoice_number" placeholder="Enter Invoice Number" required/><br/>
                        <br/>
                        <label>Select file to upload</label><span style="color:red;font-size:8px;">*Required</span>
                        <input type="file" name="upload_file" required><br/><br/>
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="uploadBol">UPLOAD</button>
                    </form>
                </div>
            </div> <!-- container content -->
        </div> <!-- modalfade -->
    </div>
