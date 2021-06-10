
<?php 
 
// Recipient 
$to = 'informes@eurekalibros.com.pe'; 
 
// Sender 
$fromName = $_POST["nombre"];
$from = $_POST["correo"];
$colegio = $_POST["colegio"];
$telefono = $_POST["telefono"];
$dropp1 = $_POST["dropp1"];
$nomdropp1 = $_POST["nomdropp1"];
$dropp2 = $_POST["dropp2"];
$nomdropp2 = $_POST["nomdropp2"];
$mensaje = $_POST["mensaje"];
$subject =  "nuevo colegio";

 
// Email body content 
$htmlContent = " 
    <h2>Nuevo Colegio </h2> 
   <p>Hola, Soy $fromName </p> 
     
"; 
$htmlContent0 = " 
    
   <p>Del colegio: $colegio</p> 
     
";
$htmlContent1 = 
    
 "  <p>Con el telefono: $telefono </p> 
     "
; 
$htmlContent2 = 
    
  "<p> $dropp1 </p> ".
  "<p> $nomdropp1 </p> "
 ;
$htmlContent3 =  
 "  <p> $dropp2 </p> ".
 "  <p> $nomdropp2 </p> "
; 
$htmlContent4 = 
  " <p>consulta: $mensaje</p> "
; 

// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent ."\n\n" . $htmlContent0  . "\n\n". $htmlContent1 . "\n\n". $htmlContent3 . "\n\n". $htmlContent4 . "\n\n". $htmlContent2 ;  
 
// Preparing attachment 

$returnpath = "-f" . $from; 
 
try
{
   // Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
if($mail){
 echo "<script>alert('Correo enviado.')</script>";
  echo "<script>setTimeout(\"location.href='https://appsitecinfo.com/FINALELE/Contactanos.html'\",100)</script>";

} 
}
catch (Throwable $t)
{
  echo "Captured Throwable: " . $e->getMessage() ;
}
catch (Exception $e)
{
  echo "Captured Exception: " . $e->getMessage() ;
}

 
?>