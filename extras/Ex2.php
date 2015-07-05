<?php
include("./Yaps.inc.php");

$yps=new Yapser();
$yps->Open(""); // Create temporary file in the YTMP_DIR directory (see Yaps.inc.php file)
$yps->BeginPage(595,842);
// Uncomment these lines to insert images
//$yps->ShowImage("/www/htdocs/www/pro/pdfreports/interakt.jpg",0,842);
//$yps->ShowImage("/www/htdocs/www/pro/pdfreports/yaps.jpg",100,780);
$yps->SetFont("Helvetica",8);
$yps->SetColor(0.5,0.5,0.5);
$yps->SetLineWidth(0.5);
$text="This is an example, showing the capabilities of ShowBoxed function.\nThe only caracter accepted as word-wrapping separator is the space character \" and the EOL character \"";
$yps->SetColor(0.7,0,0); 
$yps->SetAlign("left");
$yps->SetUnderline("true");
$yps->Rectangle(10, 700, 200, -95);
$yps->ShowBoxed($text, 10, 700, 200, 95);
$yps->SetColor(0.7,0.7,0); 
$yps->SetAlign("center");
$yps->SetUnderline("false");
$yps->Rectangle(230, 720, 130, -135);
$yps->ShowBoxed($text, 230, 720, 130, 135);
$yps->SetColor(0,0,0.7); 
$yps->SetAlign("right");
$yps->SetUnderline("true");
$yps->Rectangle(380, 700, 200, -95);
$yps->ShowBoxed($text, 380, 700, 200, 95);
$yps->EndPage();
$yps->Close();
$yps->CloseWeb();
?>