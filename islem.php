<?php
extract($_GET);

include("db_baglanti.php"); // Veritabanı bağlantısı

$bayan_adet = explode(",",$bayan_elemanlar); // gelen bayları virgüllerini kaldırıp diziye atıyor
$bay_adet = explode(",",$bay_elemanlar);// gelen bayanları virgüllerini kaldırıp diziye atıyor
if (empty($ad) || empty($soyad) || empty($tc) || empty($toplam_kisi)) 
    {
        echo "Lütfen boş değer girmeyiniz.";
    }
    else if (strlen($tc)!=11)
    {
        echo 'Tc kimlik numaranız hatalı.';
    }
    else
    {
        foreach ($bayan_adet as $bayan_eleman)
        {
            if ($bayan_eleman!='') 
            {
                $guncelle = $db->prepare("UPDATE otobus_rez SET yolcu_ad =? , yolcu_soyad=? , yolcu_tc=? , yolcu_cinsiyet=? , onay=? WHERE koltuk_no=?");
                $guncelle->execute(array($ad,$soyad,$tc,"Bayan",'1',$bayan_eleman));
                $guncelle=$guncelle->fetchAll();
                if (!$guncelle)
                            {
                                echo '
                                <div>
                                    <table border="1" width="300" height="200">
                                        <tr>
                                            <td>Ad :</td>
                                            <td>'.$ad.'</td>
                                        </tr>
                                        <tr>
                                            <td>Soyad:</td>
                                            <td>'.$soyad.'</td>
                                        </tr>
                                        <tr>
                                            <td>Koltuk No:</td>
                                            <td>'.$bayan_eleman.'</td>
                                        </tr>
                                        <tr>
                                            <td>Tc Kimlik No:</td>
                                            <td>'.$tc.'</td>
                                        </tr>
                                        <tr>
                                            <td>Bilet Saati:</td>
                                            <td>22:01:1995</td>
                                        </tr>                                        
                                    </table>
                                </div><br>
                                '; //Guncelleme basarili
                            }
            }
        }
        foreach ($bay_adet as $bay_eleman)
        {
            if ($bay_eleman!='') 
            {
                $guncelle = $db->prepare("UPDATE otobus_rez SET yolcu_ad =? , yolcu_soyad=? , yolcu_tc=? , yolcu_cinsiyet=? , onay=? WHERE koltuk_no=?");
                $guncelle->execute(array($ad,$soyad,$tc,"Bay",'1',$bay_eleman));
                $guncelle=$guncelle->fetchAll();
                if (!$guncelle)
                            {
                                echo '
                                <div>
                                    <table border="1" width="300" height="200">
                                        <tr>
                                            <td>Ad :</td>
                                            <td>'.$ad.'</td>
                                        </tr>
                                        <tr>
                                            <td>Soyad:</td>
                                            <td>'.$soyad.'</td>
                                        </tr>
                                        <tr>
                                            <td>Koltuk No:</td>
                                            <td>'.$bay_eleman.'</td>
                                        </tr>
                                        <tr>
                                            <td>Tc Kimlik No:</td>
                                            <td>'.$tc.'</td>
                                        </tr>
                                        <tr>
                                            <td>Bilet Saati:</td>
                                            <td>22:01:1995</td>
                                        </tr>
                                    </table>
                                </div><br>
                                '; //Guncelleme basarili
                            }
            }
        }  
    }
    echo '<a href="index.php" style="color:blue">Anasayfa</a>';
    
