<?php
include("./Yaps.inc.php");

$yps=new Yapser();
$yps->Open("");
$yps->BeginPage(595,842);
$yps->SetLineWidth(20);
$yps->SetDash("",0);
$yps->SetLineCap(2);
$yps->SetLineJoin(1);
$yps->SetColor(1,0,0);
$yps->Line(0,0,500,800);
$yps->SetLineWidth(10);
$yps->Rectangle(200,100,100,50);
$yps->SetLineWidth(1);
$yps->Circle(200,700,100);
$yps->Disc(200,700,50);
$yps->Arc(200,700,75,10,80);
$yps->SetColor(0,0,1);
$yps->SetLineWidth(10);
$yps->Pie(200,700,40,10,80);
$yps->FullPie(200,700,25,110,180);
$yps->SetColor(0.5,0.5,1);
$yps->Bar(100,400,200,50);
$yps->SetColor(0.5,0.5,1);
$yps->SetFont("Courier-Bold",14);
$yps->SetLineWidth(1);
$yps->Translate(300, 700);
$yps->Rotate(10);
$yps->ShowAt("Ciuffy",0,0);
$yps->Rotate(-10);
$yps->Translate(-300, -700);
$yps->MoveTo(0,0);
$yps->LineTo(595,842);
$yps->EndPage();
$yps->Close();
$yps->CloseWeb();
?>