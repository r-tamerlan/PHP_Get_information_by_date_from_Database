<?php
$db= new mysqli("localhost","root","","uyeler") or die("Servere baglana bilmədi!");

$db->set_charset("utf8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Rüstəmov Tamerlan">
    <title>MYSQL TARİX</title>
    <link rel="stylesheet" href="boost.css" >

</head>
<body>

<table class="table table-bordered col-md-10 mx-auto mt-4 text-center table-active">
    <thead style="line-height: 40px">
    <tr>
        <td><a href="index.php?tar=bugun">Bugün</a></td>
        <td><a href="index.php?tar=dun">Dünən</a></td>
        <td><a href="index.php?tar=hafta">Bu həftə</a></td>
        <td><a href="index.php?tar=ay">Bu ay</a></td>
        <td><a href="index.php?tar=tum">Bütün qeydlər</a></td>
        <td>
             <form action="index.php?tar=arama" method="post">
             <input type="date" name="tarih1" class="form-control col-md-10" /> </td>
        <td> <input type="date" name="tarih2" class="form-control col-md-10" /> </td>
        <td> <input type="submit" name="buton" value="Gətir" class="btn btn-info" /> </form></td>
    </tr>
    </thead>
</table>

<table class="table table-bordered col-md-4 mx-auto mt-4 text-center table-light table-striped">
    <thead>
    <tr>
        <th>Məhsulun adı</th>
        <th>Məhsulun qiyməti</th>
    </tr>
    </thead>

    <tbody>
<?php

function tablo ($sorgu,$db) {

    $sor=$db->prepare($sorgu);
    $sor->execute();
    $sonuc=$sor->get_result();
    while ($sonucum=$sonuc->fetch_assoc()):
        echo '
                <tr>
                <td>'.$sonucum["urunad"].'</td>
                <td>'.$sonucum["urunfiyat"].'</td>
                </tr>     
          ';
    endwhile;

}

@$tarix=$_GET["tar"];

switch ($tarix):
    case "bugun":
        $sorgu="select * from rapor where tarih = current_date()";
        tablo($sorgu,$db);
    break;

    case "dun":
        $sorgu="select * from rapor where tarih = DATE_SUB(current_date(), interval 1 day)";
        tablo($sorgu,$db);
    break;

    case "hafta":
        $sorgu="select * from rapor where YEARWEEK(tarih) = YEARWEEK(current_date)";
        tablo($sorgu,$db);
    break;

    case "ay":
        $sorgu="select * from rapor where tarih >= DATE_SUB(current_date(), interval 1 month )";
        tablo($sorgu,$db);
    break;

    case "tum":
        $sorgu="select * from rapor";
        tablo($sorgu,$db);
    break;

    case "arama":
          $tarih1=$_POST["tarih1"];
          $tarih2=$_POST["tarih2"];

          echo '<div class="alert alert-info text-center">'.$tarih1.' ----- '.$tarih2.' arasi </div>';

           $sorgu="select * from rapor where DATE(tarih) BETWEEN '$tarih1' AND '$tarih2'";
           $sor=$db->prepare($sorgu);
           $sor->execute();
           $sonuc=$sor->get_result();
        while ($sonucum=$sonuc->fetch_assoc()):
        echo '
                <tr>
                <td>'.$sonucum["urunad"].'</td>
                <td>'.$sonucum["urunfiyat"].'</td>
                </tr>     
          ';
        endwhile;
    break;

    default:
        $sorgu="select * from rapor where tarih = current_date()";
        tablo($sorgu,$db);
endswitch;

?>
    </tbody>
</table>
</body>
</html>