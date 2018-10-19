<?php 
require_once('./treyanusers.php');
mysqli_select_db($treyanusers, $database_treyan);
require_once  ('./invoice.php');
      ?>
<html>
 <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <!-- <base href="http://www.cjrdistributing.com" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='js/example.js'></script>
  <link rel='stylesheet' type='text/css' href='css/style.css' media="screen" />
  <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 </head>  
 <body>
  <div class="container">
   <!-- Header Section -->
   <table>
   <tr>
   <td class="td_hidden_border">
        <img src="cjr_logo.png" alt="cjrtec" width="300" height="100">
   </td>
   <td class="td_hidden_border">     
    <form action="" name="print" method="post">
       <h3><strong>INVOICE</strong></h3> <br>
       <label><h4>Invoice #: <?php echo $_GET['invoice']; ?> </h4></label><br>
       <label><h4>Date: <?php if (isset($row['r_date_issued'])=="") {
         echo $date;
       }else{echo date('M d, Y',strtotime($row['r_date_issued']));} ?> </h4></label>    
   </td>
   </tr>
   </table>
       <table>
         <th class="td_hidden_border">
            <h4><strong>Seller: </strong></h4>
         </th>
         <th class="td_hidden_border">
           <h4><strong>Buyer: </strong></h4>
         </th>
         <tbody>
           <tr>
             <td width="50%" class="td_hidden_border">
               <h5>CJR Distributing</h5>
              <p>441 W. 12300 S.  Ste A600</p>
              <p>Draper, Utah  84020</p>
              <p>P. 800 733 2302 F. 888 368 4111</p>
             </td>
             <td width="50%" class="td_hidden_border">
               <h5> <?php echo $company; ?> </h5> 
              <p> <?php echo $name; ?> </p>
              <p> <?php echo ucfirst(strtolower($city)) . " " . $zip;?> </p>
              <p> <?php echo $add; ?> </p>
             </td>
           </tr>
         </tbody>
       </table>
<table id="items">
      <tr>
          <th>Tonnage</th>
          <th>Machine Type</th>
          <th>Unit Cost</th>
          <th>Quantity</th>
          <th>Price</th>
      </tr>
      <?php 
      $id = $_GET['article_id'];
      $inv = $_GET['invoice'];
      $sql = "SELECT * FROM invoiced_machine a
              INNER JOIN registers b 
              ON a.id = b.id 
              WHERE a.id = '$id'
              AND a.invoice_number = '$inv'";

      $result = mysqli_query($treyanusers,$sql);
      if (mysqli_num_rows($result)>0) {

        while ($row = mysqli_fetch_assoc($result)) {
          
          ?>
      <tr class="item-row">
          <td class="item-name"><div class="delete-wpr"></div>
          <textarea name="tonnage[]"><?php echo $row['tonnage']; ?></textarea></td>
          <td class="description"><textarea name="machine_type[]"><?php echo $row['machine_type']; ?></textarea></td>
          <td><textarea name="unit_price[]" class="cost">$<?php echo $row['unit_price']; ?></textarea></td>
          <td><textarea name="qty[]" class="qty"><?php echo $row['quantity']; ?></textarea></td>
          <td><textarea name="price[]" class="price">$<?php echo $prc[] = $row['unit_price'] * $row['quantity']; ?></textarea></td>
      </tr>
          <?php 
          
      }
    }
        $sql_inv = "SELECT * FROM invoice WHERE id = $id";
        $res_inv = mysqli_query($treyanusers, $sql_inv);
        $ro = mysqli_fetch_assoc($res_inv);

        $sql_comment = "SELECT * FROM invoiced_machine WHERE invoice_number = $inv";
        $com_query = mysqli_query($treyanusers, $sql_comment);
        $row_com = mysqli_fetch_assoc($com_query);
        $ar_sum = array_sum($prc);
       ?>
      <tr id="hiderow">
        <td colspan="5"></td>
      </tr>
      
      <tr>
          <td colspan="2" class="blank"><center style='color:red;'><input class="form-control" type="text" name="comment_1" value="<?php echo $row_com['comment_1'];?>"></center> </td>
          <td colspan="2" class="total-line">Subtotal</td>
          <td class="total-value"><textarea name="sub_total" id="subtotal">$<?php if ($inv == "") {
            echo "";
          }else{echo $ar_sum;}?></textarea></td>
      </tr>
      <tr>
          <td colspan="2" class="blank">  <center style='color:red;'><input class="form-control" type="text" name="comment_2" value="Deposit of 50% required at signing"></center></td>
          <td colspan="2" class="total-line">Total</td>
          <td class="total-value"><textarea name="total" id="total">$<?php if ($inv =="") {
            echo "";
          }else{echo $ar_sum;}?></textarea></td>
      </tr>
      <tr>
          <td colspan="2" class="blank"><center style='color:red;'><input class="form-control" type="text" name="comment_3" value="<?php echo $row_com['comment_3'];?>"></center> </td>
          <td colspan="2" class="total-line">Amount Tax: $</td>
          <td class="total-value"><textarea name="tax" id="paid"><?php if ($inv =="") {
            echo "";
          }else{echo $ro['r_taxation'];}?></textarea></td>
      </tr>
      <tr>
          <td colspan="2" class="blank"><center style='color:red;'><input class="form-control" type="text" name="comment_4" value="<?php echo $row_com['comment_4'];?>"></center> </td>
          <td colspan="2" class="total-line balance">Grand Total: $</td>
          <td class="total-value balance"><strong><textarea name="tax" id="paid"><?php if ($inv =="") {
            echo "";
          }else{echo $ro['r_taxation']+$ar_sum;}?></textarea></td>
      </tr>
    </table>
    <div id="terms">
      <h5>Terms</h5>
    </div>
        <table>
      <div class="td_hidden_border follow">
        <a href="#" style="text-decoration:none;"><button onClick="window.print();return false" type="button" name="print" class="btn btn-success btn-lg">Print Invoice</button></a>
      </div>
  </form>  
          <tbody>
              <tr>
                <td width="50%" class="td_hidden_border pad_mid">
                  <strong>Specifications</strong>
        <p>Machine Specifications can be seen HERE</p>
        <strong>In Stock Machine</strong>
        <p>As of the date of this invoice, This machine is currently in stock  in our     
        CA Center /  Utah Center.  </p>
        <p>IN STOCK machines may have multiple invoices out awaiting final decisions for purchase. All presses are sold on a first come basis. 
        Although the press is available at this time, it may be sold at any time. The build time for non-stock machines is aproximately 65 days.</p>
        <p>Unless you are placing your order today, please  contact us to verify press availability when you're ready to purchace.</p> 
        <strong>Custom Built Machine</strong>
        <p>This machine is not in stock and will require a build time of approximately 65 days 
        from the date of reciept of original signed INVOICE and payment.</p>
        <strong>Payments</strong>
        <p>Seller accepts payment by check, wire or money order.</p>
        <p style="color:#ff0000;">We do not accept credit card payments.</p>
        <strong>Shipping</strong> 
        <p>Seller will assist Buyer  with everything needed to arrange shipping, however, 
        it is the Buyers responsibility to arrange and pay for shipping  from the Lindon Utah Warehouse.</p>
                </td>
                <td width="50%" class="td_hidden_border pad_mid">
                  <strong> Universal Terms of Purchase. </strong>
        <p>In addition to this INVOICE, this purchase will be goverened by the conditions represented in the UNIVERSAL TERMS of PURCHASE available  at: </p>  
        <p>
          <a href="http://www.cjrterms.com">www.cjrterms.com</a>
        </p>
        <p>Buyer should make a copy of the terms and include them with this invoice for their records.
        </p>
        <strong>Authorized Signature</strong>
        <p>The signer of this Agreement warrants that by nature of their position, they are authorized to sign on behalf of and bind the company.</p> 
        <p>Recieved By    ____________________________________</p>
        <p>Signature   ______________________________________</p>
        <p>Date __________________________________</p>
                </td>
              </tr>
          </tbody>
        </table>
   </div> 
 </body>
</html>
 