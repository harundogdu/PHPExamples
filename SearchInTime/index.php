<?php require_once("class.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Tarih Uygulaması</title>
</head>

<body>
    <div class="arama-formu my-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th><a href="index.php?secim=bugun" class="text-white">Bugün</a></th>
                                <th><a href="index.php?secim=dun" class="text-white">Dün</a></th>
                                <th><a href="index.php?secim=buhafta" class="text-white">Bu Hafta</a></th>
                                <th><a href="index.php?secim=buay" class="text-white">Bu Ay</a></th>
                                <th><a href="index.php?secim=tum" class="text-white">Tüm Zamanlar</a></th>
                                <th colspan="3">
                                    <form action="index.php?secim=arama" method="post">
                                        <div class="input-group">
                                            <input type="date" name="tarih1" id="tarih1" class="form-control">
                                            <input type="date" name="tarih2" id="tarih2" class="form-control">
                                            <button type="submit" class="btn btn-danger" name="btnAra">Getir</button>
                                        </div>
                                    </form>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="mx-auto table table-bordered col-md-4 mt-4 text-center table-light table-striped">
                        <thead>
                            <tr>
                                <th colspan="4">Ürün Adı</th>
                                <th colspan="4">Ürün Fiyatı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['secim'])) :
                                $secim = $_GET['secim'];
                                switch ($secim):
                                    case 'bugun':
                                        $query = "SELECT * FROM tarih where tarih = CURRENT_DATE()";
                                        islemler::veriGetir($db, $query);
                                        break;
                                    case 'dun':
                                        $query = "SELECT * FROM tarih where tarih = DATE_SUB(CURRENT_DATE() , INTERVAL 1 DAY )";
                                        islemler::veriGetir($db, $query);
                                        break;
                                    case 'buhafta':
                                        $query = "SELECT * FROM tarih where YEARWEEK(tarih) = YEARWEEK(CURRENT_DATE)";
                                        islemler::veriGetir($db, $query);
                                        break;
                                    case 'buay':
                                        $query = "SELECT * FROM tarih where tarih >= DATE_SUB(CURRENT_DATE() , INTERVAL 1 MONTH)";
                                        islemler::veriGetir($db, $query);
                                        break;
                                    case 'tum':
                                        $query = "SELECT * FROM tarih";
                                        islemler::veriGetir($db, $query);
                                        break;
                                    case 'arama':
                                        if (isset($_POST['btnAra'])) :
                                            $tarih1 = $_POST['tarih1'];
                                            $tarih2 = $_POST['tarih2'];

                                            $query = "SELECT * FROM tarih WHERE tarih BETWEEN 
                                            '$tarih1' AND '$tarih2'";

                                            $sonuc = $db->prepare($query);
                                            $sonuc->execute();
                                            $last = $sonuc->get_result();

                                            while ($satir = $last->fetch_assoc()) :
                                                echo
                                                    '
                                                <tr>
                                                <td colspan="4">' . $satir["urun_ad"] . '</td>
                                                <td colspan="4">' . $satir["urun_fiyat"] . '</td>
                                                </tr>
                                                ';
                                            endwhile;

                                        endif;
                                        break;
                                    default:
                                        echo '<div class="alert alert-danger">Kayıt Bulunamadı</div>';
                                        break;
                                endswitch;
                            else :
                                $query = "SELECT * FROM tarih where tarih = CURDATE()";
                                islemler::veriGetir($db, $query);
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>


<?php








?>