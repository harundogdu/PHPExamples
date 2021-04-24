<?php

$db = new mysqli("localhost", "root", "", "uygulama_tarih") or die("Bağlanamadı");
if ($db) :
    $db->set_charset("utf8");
endif;

class islemler
{
    public static function veriGetir($database, $query)
    {

        $sonuc = $database->prepare($query);
        $sonuc->execute();
        $last = $sonuc->get_result();

        while ($satir = $last->fetch_assoc()) :
            echo '
            <tr>
            <td colspan="4">' . $satir['urun_ad'] . ' </td>
            <td colspan="4">' . $satir['urun_fiyat'] . '</td>
            </tr>     
            ';
        endwhile;
    }
    public static function veriForm()
    {
        echo '';
    }
}
