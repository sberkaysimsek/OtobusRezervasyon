# OtobusRezervasyon
//Berkay Şimşek<br>
//26.03.2018 <br>
//sberkaysimsek_95@hotmail.com

<u><h2>Otobüs Rezervasyon Sistemi</h2></u>
    <p>Bu oluşturduğum kod, otobüsteki bilet satışlarının nasıl gerçekleştiğini gösteren, fikir amacıyla yapılmış bir proje.</p>

<p><b>Kodun anlaşılması için bilmeniz gereken diller :</b></p>
<ul>
        <li>HTML</li>
        <li>CSS</li>
        <li>JS/JQ</li>
        <li>PHP</li>
        <li>SQL</li>
        <li>AJAX</li>    
    </ul>
    <p>Projeyi anlatmadan ne işe yaradığından ufak bir bahsetmek istiyorum. Genelde otobüs rezervasyon sistemlerinde asıl yapılan veritabanına veri eklemek ,silmek veya güncellemek.
    Bu prejemde de aslında tek yaptığım bu.Yaparken beni uğraştıran tek nokta butonlardaki cinsiyet ayrımları.Bilirsiniz ülkemizde bir kural mevcut.
    Mecburi olmadıkça bay ile bayan yan yana oturamıyor.Bunu ayırt etmek için jquery kullandım.Buton tıklandığında sorgular çalışıyor ve yandaki
    koltuk cinsiyetine göre bir seçim işlemi uyguluyor.</p>
    <p>Alışılagelmişin dışında bu proje de AJAX kullandım. Sayfa içindeki seçimleri dinamik olarak post etmek için. Aslında konuya gerçekten hakimseniz buna ihtiyaç
    olmadığını zaten anlıcaksınız. Bu proje benim AJAX 'ı öğrenme evreme denk geldi diyebilirim.Ufaktan proje detaylarına geçelim.</p>
    <p>Aşağıda projenin görseli mevcut. Dediğim gibi benim asıl amacım AJAX ve JQuery'yi öğrenmek olduğu için tasarıma önem vermedim.</p>
    
  ![11](https://user-images.githubusercontent.com/35598516/38035196-87d7c792-32ac-11e8-8f18-c3f1a57091c4.PNG)
    
  <p>Projenin en önemli kısmı koltuk dedim. Koltuk seçimi biliyoruz ki ülkemizde aşağıdaki gibi.</p>
  <ul>
        <li>Yan koltuk boş ise : Bay veya Bayan</li>
        <li>Yan koltuk Bay ise : Yalnızca Bay</li>
        <li>Yan koltuk Bayan ise : Yalnızca Bayan seçilebiliyor.</li>
    </ul>
    
   <u><h2>Veritabanı Bağlantısı :PDO</h2></u>
    
   <p>Bağlantıyı PDO kullandım. Daha güncel ve daha esnek olduğu için. Aşağıda veritabanının görseli mevcut.</p>
    
  ![vs](https://user-images.githubusercontent.com/35598516/38035657-89b6ba04-32ad-11e8-8e78-5b8335f34442.PNG)

   <p>Gördüğünüz gibi gayet basit ve açık.Açıklanacak tek satır onay diyebilirim. Onay sütunu da kod içinde koltuğun dolu olup olmadığını kontrol ediyor.</p>
   <p>Geri kalan yerlerini zaten kod blokları arasında anlattım.</p>
   <p><b>İletişim : sberkaysimsek_95@hotmail.com</b></p>
