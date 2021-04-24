<?php

$db = new mysqli("localhost", "root", "", "uygulama_crud") or die("Bağlanılamadı !");
if ($db != true) :
    echo "Bağlantı Hatası ! Hata Kodu : " . $db->connect_error;
else :
    $db->set_charset("utf8");
endif;

class islemler
{
    public static function filter($val)
    {
        $one    = htmlspecialchars($val);
        $two    = trim($one);
        $last   = addslashes($two);
        return $last;
    }
    public static function listele($veri)
    {

        $sqlSorgu = $veri->prepare("SELECT * from users");
        $sqlSorgu->execute();
        $sonuc = $sqlSorgu->get_result();


        if ($sonuc->num_rows == 0) :
            echo '<tr class="text-danger">
                    <td colspan="8">
                    <p class="text-danger">Kayıtlı Üye Yok </p>
                    </td>
                    </tr>';
        else :
            while ($satir = $sonuc->fetch_assoc()) :
                echo '<tr>
              <td>' . $satir['id'] . '</td>
              <td>' . $satir['ad'] . '</td>
              <td>' . $satir['soyad'] . '</td>
              <td>' . $satir['tc'] . '</td>
              <td>' . $satir['meslek'] . '</td>
              <td>' . $satir['aidat'] . '</td>
              <td>' . islemler::yetkiler($satir['yetki']) . '</td>
              <td>
                <a href="index.php?islem=guncelle&id=' . $satir['id'] . '" class="btn btn-info">Güncelle</a>
                <a href="index.php?islem=sil&id=' . $satir['id'] . '" class="btn btn-danger">Sil</a>
              </td>
            </tr>';
            endwhile;
        endif;
    }
    public static function yetkiler($veri)
    {
        $sondurum = null;
        if ($veri == 1) :
            return $sondurum = '<p class="text-danger">Normal Üye</p>';
        elseif ($veri == 2) :
            return $sondurum = '<p class="text-info">Özel Üye</p>';
        elseif ($veri == 3) :
            return $sondurum = '<p class="text-success">Vip</p>';
        endif;
    }
    public static function ekleVeri()
    {
        echo '
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="index.php?islem=eklesondurum" method="post">
                        <div class="form-group">
                            <h5 class="text-success">
                                Ekleme Menüsü
                            </h5>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ad" placeholder="Adınızı Giriniz.." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="soyad" placeholder="Soyadınızı Giriniz.." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="tc" placeholder="TC Giriniz.." required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="meslek" placeholder="Meslek Giriniz.." required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="aidat" placeholder="Aidat Giriniz.." required class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="yetki" id="yetki" class="form-control">
                                <option value="1">Normal Üye</option>
                                <option value="2">Özel Üye</option>
                                <option value="3">Vip Üye</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" name="btnAdd">Kullanıcı Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        ';
    }
    public static function ekleVeriSonDurum($veri)
    {
        if (isset($_POST['btnAdd'])) :
            $name = islemler::filter($_POST['ad']);
            $surname = islemler::filter($_POST['soyad']);
            $tcNo = islemler::filter($_POST['tc']);
            $profession = islemler::filter($_POST['meslek']);
            $aidat = islemler::filter($_POST['aidat']);
            $authority = islemler::filter($_POST['yetki']);

            $sql = $veri->prepare("INSERT INTO users (ad,soyad,tc,meslek,aidat,yetki) VALUES (?,?,?,?,?,?)");
            $sql->bind_param("ssisii", $name, $surname, $tcNo, $profession, $aidat, $authority);
            $sonuc = $sql->execute();
            if ($sonuc) :
                echo '<div class="bg-success text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarıyla Eklendi ! Otomatik Yönlendiriliyorsunuz </p></div>';
                header("refresh:2;url=index.php");
            else :
                echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
                header("refresh:2;url=index.php");
            endif;
        else :
            echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
            header("refresh:2;url=index.php");
        endif;
    }
    public static function silVeri($veri)
    {
        if (isset($_GET['id'])) :
            $id = islemler::filter($_GET['id']);
            $sql = $veri->prepare("DELETE from users where id = ?");
            $sql->bind_param("i", $id);
            $sonuc = $sql->execute();

            if ($sonuc) :
                echo '<div class="bg-success text-center p-4 text-white">
                <p class="lead font-weight-bold">
                Başarıyla Silindi Yönlendiriliyorsunuz
                </p>
                </div>';
                header("refresh:2;url=index.php");
            else :
                echo '<div class"bg-danger text-center p-4 text-white">
                <p class="lead font-weight-bold">
                Silme İşlemi Sırasında Bir Hata Oluştu ! Yönlendiriliyorsunuz
                </p>
                </div>';
                header("refresh:2;url=index.php");
            endif;
        else :
            echo '<div class"bg-danger text-center p-4 text-white">
            <p class="lead font-weight-bold">
            Silme İşlemi Sırasında Bir Hata Oluştu ! Yönlendiriliyorsunuz
            </p>
            </div>';
            header("refresh:2;url=index.php");
        endif;
    }
    public static function guncelleVeri($veri)
    {
        $id = islemler::filter($_GET['id']);
        $sql = $veri->prepare("SELECT * FROM users where id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $sonuc = $sql->get_result();
        $result = $sonuc->fetch_assoc();
?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="index.php?islem=guncelleSonDurum" method="post">
                        <div class="form-group">
                            <h5 class="text-info">
                                Güncelleme Menüsü
                            </h5>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ad" placeholder="Adınızı Giriniz.." class="form-control" required value="<?php echo $result['ad'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="soyad" placeholder="Soyadınızı Giriniz.." class="form-control" required value="<?php echo $result['soyad'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tc" placeholder="TC Giriniz.." required class="form-control" value="<?php echo $result['tc'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="meslek" placeholder="Meslek Giriniz.." required class="form-control" value="<?php echo $result['meslek'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="aidat" placeholder="Aidat Giriniz.." required class="form-control" value="<?php echo $result['aidat'] ?>">
                        </div>
                        <?php
                        $yetki = $result['yetki'];
                        if ($yetki == 1) :
                            echo '<div class="form-group">                    
                            <select name="yetki" id="yetki" class="form-control">
                                <option value="1" selected>Normal Üye</option>
                                <option value="2">Özel Üye</option>
                                <option value="3">Vip Üye</option>
                              </select>                        
                        </div>';
                        elseif ($yetki == 2) :
                            echo '<div class="form-group">                    
                            <select name="yetki" id="yetki" class="form-control">
                                <option value="1" >Normal Üye</option>
                                <option value="2" selected>Özel Üye</option>
                                <option value="3">Vip Üye</option>
                              </select>                        
                        </div>';
                        elseif ($yetki == 3) :
                            echo '<div class="form-group">                    
                            <select name="yetki" id="yetki" class="form-control">
                                <option value="1" >Normal Üye</option>
                                <option value="2" >Özel Üye</option>
                                <option value="3" selected>Vip Üye</option>
                              </select>                        
                        </div>';
                        endif;
                        ?>
                        <div class="form-group text-center">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" class="btn btn-info" name="btn" value="Güncelle"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    public static function guncelleVeriSonDurum($veri)
    {
        if (isset($_POST['id'])) :
            $id = islemler::filter($_POST['id']);
            $name = islemler::filter($_POST['ad']);
            $surname = islemler::filter($_POST['soyad']);
            $tcNo = islemler::filter($_POST['tc']);
            $profession = islemler::filter($_POST['meslek']);
            $aidat = islemler::filter($_POST['aidat']);
            $authority = islemler::filter($_POST['yetki']);

            $sql = $veri->prepare("UPDATE users SET ad = ?,soyad=?,tc=?,meslek=?,aidat=?,yetki=? WHERE id = ? ");
            $sql->bind_param("ssisiii", $name, $surname, $tcNo, $profession, $aidat, $authority, $id);
            $sonuc = $sql->execute();

            if ($sonuc) :
                echo '<div class="bg-success text-white p-4 text-center"><p class="lead font-weight-bold">Başarıyla Güncellendi ! Otomatik Yönlendiriliyorsunuz </p></div>';
                header("refresh:2;url=index.php");
            else :
                echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
                header("refresh:2;url=index.php");
            endif;
        else :
            echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
            header("refresh:2;url=index.php");
        endif;
    }
    public static function form($veri)
    {
    ?>
        <div class="container mt-4 text-center p-2 font-weight-bold">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-success">
                        <div class="col-md-8 mx-auto my-3">
                            <thead>
                                <tr>
                                    <th colspan="9">
                                        <div class="col-md-6 ml-auto">
                                            <?php islemler::aramaForm(); ?>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </div>
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>TC</th>
                                <th>Meslek</th>
                                <th>Aidat</th>
                                <th>Yetki</th>
                                <th>İşlemler</th>
                                <th><span><a href="index.php?islem=ekle" class="btn btn-success">Ekle</a></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php islemler::listele($veri) ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    public static function araSonuc($veri)
    {
    ?>
        <div class="container mt-4 text-center p-2 font-weight-bold">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-success">
                        <div class="col-md-8 mx-auto my-3">
                            <thead>
                                <h5 class="text-left"><a href="index.php" style="color:#141414;"><i class="fas fa-home">Ana Sayfaya Dön</i></a></h5>
                                <tr>
                                    <th colspan="9">
                                        <div class="col-md-6 ml-auto">
                                            <?php islemler::aramaForm(); ?>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </div>
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>TC</th>
                                <th>Meslek</th>
                                <th>Aidat</th>
                                <th>Yetki</th>
                                <th>İşlemler</th>
                                <th><span><a href="index.php?islem=ekle" class="btn btn-success">Ekle</a></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['btnAra'])) :

                                $araSecenek = islemler::filter($_POST['araSecenek']);
                                $kelime = islemler::filter($_POST['kelime']);
                                $btnAra = islemler::filter($_POST['btnAra']);

                                if ($btnAra) :
                                    if ($araSecenek == "ad" || $araSecenek == "soyad" || $araSecenek == "meslek") :

                                        $sqlSorgu = $veri->prepare("SELECT * FROM users WHERE $araSecenek LIKE '%$kelime%'");
                                        $sqlSorgu->execute();
                                        $b = $sqlSorgu->get_result();

                                        if ($b->num_rows != 0) :
                                            while ($satir = $b->fetch_assoc()) :
                                                echo '<tr>
                                  <td>' . $satir['id'] . '</td>
                                  <td>' . $satir['ad'] . '</td>
                                  <td>' . $satir['soyad'] . '</td>
                                  <td>' . $satir['tc'] . '</td>
                                  <td>' . $satir['meslek'] . '</td>
                                  <td>' . $satir['aidat'] . '</td>
                                  <td>' . islemler::yetkiler($satir['yetki']) . '</td>
                                  <td>
                                    <a href="index.php?islem=guncelle&id=' . $satir['id'] . '" class="btn btn-info">Güncelle</a>
                                    <a href="index.php?islem=sil&id=' . $satir['id'] . '" class="btn btn-danger">Sil</a>
                                  </td>
                                </tr>';
                                            endwhile;
                                        else :
                                            echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
                                            header("refresh:2;url=index.php");
                                        endif;
                                    else :
                                        // Diğer Kriterler

                                        $sorgu = "SELECT * FROM users WHERE $araSecenek LIKE '$kelime'";
                                        $sonuc = $veri->prepare($sorgu);
                                        $sonuc->execute();
                                        $b = $sonuc->get_result();

                                        if ($b->num_rows != 0) :
                                            while ($satir = $b->fetch_assoc()) :
                                                echo '<tr>
                                      <td>' . $satir['id'] . '</td>
                                      <td>' . $satir['ad'] . '</td>
                                      <td>' . $satir['soyad'] . '</td>
                                      <td>' . $satir['tc'] . '</td>
                                      <td>' . $satir['meslek'] . '</td>
                                      <td>' . $satir['aidat'] . '</td>
                                      <td>' . islemler::yetkiler($satir['yetki']) . '</td>
                                      <td>
                                        <a href="index.php?islem=guncelle&id=' . $satir['id'] . '" class="btn btn-info">Güncelle</a>
                                        <a href="index.php?islem=sil&id=' . $satir['id'] . '" class="btn btn-danger">Sil</a>
                                      </td>
                                    </tr>';
                                            endwhile;
                                        else :
                                            echo '<div class="bg-danger text-white p-4 text-center"><p class="lead font-weight-bold">İşlem Başarısız Oldu ! Otomatik Yönlendiriliyorsunuz !</p></div>';
                                            header("refresh:2;url=index.php");
                                        endif;
                                    endif;
                                endif;
                            else :
                                echo "Durmuş";
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    public static function aramaForm()
    {
    ?>
        <form action="index.php?islem=ara" method="post">
            <div class="input-group">
                <select name="araSecenek" id="araSecenek" class="form-control w-15">
                    <option value="ad">Ad</option>
                    <option value="soyad">Soyad</option>
                    <option value="tc">Tc</option>
                    <option value="meslek">Meslek</option>
                    <option value="aidat">Aidat</option>
                    <option value="yetki">Yetki</option>
                </select>
                <input type="text" placeholder="Ara.." class="form-control w-50" required name="kelime">
                <input type="submit" value="Ara" name="btnAra" class="btn btn-danger">
            </div>
        </form>
<?php
    }
}