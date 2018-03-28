<html>
    <head>
    <title>Otobüs Rezervasyon</title>
    <meta charset="UTF-8"> 
    </head>
    <style>
        @import url("css.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<body>
    <h1 class="baslik">Otobüs Rezervasyon </h1>
    <h2 class="baslik">Sefer 22/01/1995</h2>
<div class ="panel_div">
    <div class="rezerve_et"><h3>Bilet Al</h3>
        <form method="POST" action="">
            <table width="300"  height="300">
                <tr>
                    <td width="150">Ad:</td>
                    <td><input type="textbox" name="rez_ad" class="rez_ad"></input></td>
                </tr>
                <tr>
                    <td>Soyad :</td>
                    <td><input type="textbox" name="rez_soyad" class="rez_soyad"></input></td>
                </tr>
                <tr>
                    <td>TC Kimlik No:</td>
                    <td><input type="textbox" name="rez_tc" class="rez_tc" placeholder="11 karakter"></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Rezerve Et" name="rez_gonder" class="rez_button"></input></td>   
                </tr>
                <label class="label_gizli" value=""></label>  
            </table>
        </form>
    </div>
    
    <div class="otobus"><br>
    <?php
        include 'db_baglanti.php';
        $sec = $db->prepare("SELECT * FROM otobus_rez");
        $sec ->execute();
        $sec = $sec->fetchAll();
        foreach($sec as $veri)
        {   
            $kontrol =$db->prepare("SELECT * FROM otobus_rez WHERE onay = ? && koltuk_no =?");
            $kontrol ->execute(array(0,$veri['koltuk_no']));
            $kontrol = $kontrol ->fetchAll();
            if($kontrol)
            {
                echo '
                    <button class="koltuk" id="koltuk_sira" value="0" data-index='.$veri['koltuk_no'].'>'.$veri['koltuk_no'].'</button>              
            ';
            }
            else{
                if ($veri['yolcu_cinsiyet']=="Bay") 
                {
                    echo '<button class="koltuk_2" data-index='.$veri['koltuk_no'].' disabled>'.$veri['koltuk_no'].'</button>';
                }
                else
                {
                    echo '<button class="koltuk_3" data-index='.$veri['koltuk_no'].' disabled>'.$veri['koltuk_no'].'</button>';
                }
            }   
        }  
    ?>
        
    <script>
        $(document).ready(function(){
            $(".koltuk").click(function(){
               function hexc(colorval) {
                    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                    delete(parts[0]);
                    for (var i = 1; i <= 3; ++i) {
                        parts[i] = parseInt(parts[i]).toString(16);
                        if (parts[i].length == 1) parts[i] = '0' + parts[i];
                    }
                    color = '#' + parts.join('');
                }
                
                var color =$(this).css('backgroundColor'); 
                hexc(color);

                var koltuk_no = $(this).html();//koltuk_no = basılanın koltuk numarası
                var yan_koltuk_no = $(this).html();
                var karar = koltuk_no%2;
                if(karar ===1)
                {
                    yan_koltuk_no++;
                    var yan_koltuk_renk = $("button[data-index="+yan_koltuk_no+"]").css("backgroundColor");
                    hexc(yan_koltuk_renk);
                    //color artık yan_koltuk rengi
                    var engel_durum = $("button[data-index="+yan_koltuk_no+"]").attr("disabled");
                    
                    if(engel_durum=="disabled")
                    {
                       if(color =="#42a5f5") //mavi
                        {
                            var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#42a5f5")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                            else
                            {
                                $(this).css("backgroundColor","#42a5f5");
                                $(this).val(1);
                            }
                        }
                        else if(color =="#ce93d8") //pembe
                        {
                            var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#ce93d8")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                            else
                            {
                                $(this).css("backgroundColor","#ce93d8");
                                $(this).val(2);
                            }
                        }
                        else if(color =="#ffffff")
                        {
                                var yeni_renk = $(this).css("backgroundColor");
                                hexc(yeni_renk);
                                if(color==="#ffffff")
                                {
                                    $(this).css("backgroundColor","#42a5f5");
                                    $(this).val(1);
                                }
                                else if(color=="#42a5f5")
                                {
                                    $(this).css("backgroundColor","#ce93d8");
                                    $(this).val(2);

                                }
                                else if(color=="#ce93d8")
                                {
                                    $(this).css("backgroundColor","#ffffff");
                                    $(this).val(0);
                                }
                        } 
                    }
                    else
                    {
                        var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#ffffff")
                            {
                                $(this).css("backgroundColor","#42a5f5");
                                $(this).val(1);
                            }
                            else if(color=="#42a5f5")
                            {
                                $(this).css("backgroundColor","#ce93d8");
                                $(this).val(2);
                            }
                            else if(color=="#ce93d8")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                    }
                }
                else
                {
                   yan_koltuk_no--;
                    var yan_koltuk_renk = $("button[data-index="+yan_koltuk_no+"]").css("backgroundColor");
                    hexc(yan_koltuk_renk);
                    //color artık yan_koltuk rengi
                    var engel_durum = $("button[data-index="+yan_koltuk_no+"]").attr("disabled");
                    
                    if(engel_durum=="disabled")
                    {
                       if(color =="#42a5f5") //mavi
                        {
                            var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#42a5f5")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                            else
                            {
                                $(this).css("backgroundColor","#42a5f5");
                                $(this).val(1);
                            }
                        }
                        else if(color =="#ce93d8") //pembe
                        {
                            var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#ce93d8")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                            else
                            {
                                $(this).css("backgroundColor","#ce93d8");
                                $(this).val(2);
                            }
                        }
                        else if(color =="#ffffff")
                        {
                                var yeni_renk = $(this).css("backgroundColor");
                                hexc(yeni_renk);
                                if(color==="#ffffff")
                                {
                                    $(this).css("backgroundColor","#42a5f5");
                                    $(this).val(1);
                                }
                                else if(color=="#42a5f5")
                                {
                                    $(this).css("backgroundColor","#ce93d8");
                                    $(this).val(2);

                                }
                                else if(color=="#ce93d8")
                                {
                                    $(this).css("backgroundColor","#ffffff");
                                    $(this).val(0);
                                }
                        } 
                    }
                    else
                    {
                        var yeni_renk = $(this).css("backgroundColor");
                            hexc(yeni_renk);
                            if(color==="#ffffff")
                            {
                                $(this).css("backgroundColor","#42a5f5");
                                $(this).val(1);
                            }
                            else if(color=="#42a5f5")
                            {
                                $(this).css("backgroundColor","#ce93d8");
                                $(this).val(2);
                            }
                            else if(color=="#ce93d8")
                            {
                                $(this).css("backgroundColor","#ffffff");
                                $(this).val(0);
                            }
                    }
                }      
            });
            $(".rez_button").click(function(){
                var ad = $(".rez_ad").val(); // alıcı adı
                var soyad = $(".rez_soyad").val(); // alıcı soyad
                var tc = $(".rez_tc").val(); // alıcı tc
                
                //POST GİRİŞİ TAMAMLANDI
                var bay = $("button[value=1]").length; // seçilen baylar sayısı
                var bayan = $("button[value=2]").length; // seçilen bayanların sayısı
                var bay_elemanlar = []; //bay dizi
                var bayan_elemanlar =[]; //bayan dizi
                $("button[value=1]").each(function(index){
                   bay_elemanlar[index]=$(this).html();
                });
                $("button[value=2]").each(function(index){
                   bayan_elemanlar[index]=$(this).html();
                });
                var toplam_kisi = bay+bayan; // toplam seçilen kişi
                
                $.post(
                   'islem.php',{ad : ad,soyad:soyad,tc:tc,toplam_kisi:toplam_kisi,bay:bay,bayan:bayan,bay_elemanlar:bay_elemanlar,bayan_elemanlar:bayan_elemanlar},function(data)
                   {    
                       window.location = "islem.php?ad=" +ad+"&soyad="+soyad+"&tc="+tc+"&toplam_kisi="+toplam_kisi+"&bayan_eleman_sayisi="+bayan+"&bay_eleman_sayisi="+bay+"&bayan_elemanlar="+bayan_elemanlar+"&bay_elemanlar="+bay_elemanlar;
                   }
                ).fail(function(){
                   alert("olmadı"); 
                });
                return false;
            });
        });
    </script>  
</div>
</div>
<div class="button_aciklama">
<h3>Button Açıklaması</h3>
    <div class="koltuk_enable" style="background-color:#CE93D8"></div>
    <span class="aciklama">Bayan</span>
    
    <div class="koltuk_enable" style="background-color:#42A5F5"></div>
    <span class="aciklama">Bay</span>
    
    <div class="koltuk_enable" style="background-color:#ffffff"></div>
    <span class="aciklama">Müsait / Alınabilir</span>
    
</div>
<form method="POST">    
    <input class="temizle_button" name="temizle_button" type="submit" value="Tüm Koltukları Boşalt(Seferi Yenile)"></input>
</form>
   <?php
    include 'db_baglanti.php';
    @$temizle_button =$_POST['temizle_button'];
    if(isset($temizle_button))
    {   
        $upd = $db->prepare("UPDATE otobus_rez SET yolcu_ad =? , yolcu_soyad=? , yolcu_tc=? , yolcu_cinsiyet=? , onay=? where onay =?");
        $upd ->execute(array(NULL,NULL,NULL,NULL,0,1));
        $upd =$upd->fetchAll();
        if($db)
        {
            echo '<script type="text/javascript">
                alert("Tüm kayıtlar silindi.")
                window.location = "index.php";
            </script>';            
        }
    }
   ?>

</body>
</html>
