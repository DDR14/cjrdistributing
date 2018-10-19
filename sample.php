
<?php
$headers2 = "MIME-Version: 1.0" . "\r\n";
			$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers2 .= "Cc: michael.r@cjrtec.com". "\r\n";
            $headers2 .= "Bcc: michael.r@cjrtec.com". "\r\n";
            $headers2 .= 'From: sample <kaelreyes12@hotmail.com>' . "\r\n";

			
			mail('chris@cjrtec.com, michael.r@meristone.com','sample','sample',$headers2);
			?>
