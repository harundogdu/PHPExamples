<?php require_once("class.php"); ?>
<!doctype html>
<html lang="tr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <script src="https://kit.fontawesome.com/0f1de822a3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Basit CRUD İşlemleri</title>
</head>

<body>

  <?php

  if (isset($_GET['islem'])) :

    $islem = $_GET['islem'];

    switch ($islem):
      case 'ekle':
        islemler::ekleVeri();
        break;
      case 'eklesondurum':
        islemler::ekleVeriSonDurum($db);
        break;
      case 'sil':
        islemler::silVeri($db);
        break;
      case 'guncelle':
        islemler::guncelleVeri($db);
        break;
      case 'guncelleSonDurum':
        islemler::guncelleVeriSonDurum($db);
        break;
      case 'ara':
        islemler::araSonuc($db);
        break;
      default:
        islemler::form($db);
        break;
    endswitch;
  else :
    islemler::form($db);
  endif;
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>