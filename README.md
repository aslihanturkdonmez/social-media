
# Sosyal Medya Sitesi w/Laravel

Uygulamaya göz geçirmek için:<a href="http://btulendin.herokuapp.com/">BTUlendin sitesini ziyaret edebilirsiniz</a>

BTUlendin bir sosyal medya projesidir. Proje içerisinde:
<ul>
  <li>Kullanıcı giriş/doğrulama/kayıt işlemleri</li>
  <li>Arkadaş ekleme/silme</li>
  <li>Gönderi Paylaşımı</li>
  <li>Beğeni ve Yorum Atma</li>
  <li>Etkinlik oluşturma ve etkinliğe katılım sağlama</li>
</ul>
gibi işlemler gerçekleştirilebilmektedir.

## Teknolojiler
<ul>
    <li><a href="https://laravel.com/">Laravel 8</a></li>
  <li><a href="https://laravel-livewire.com/">Livewire 2.0</a></li>
  <li><a href="https://jetstream.laravel.com/2.x/introduction.html">Jetstream 2.0</a></li>
</ul>

## Gereksinimler

<ul>
  <li><a href="https://getcomposer.org/">Composer</a></li>
  <li>PHP</li>
  <li>MySQL</li>
</ul>

&emsp;**NOT:** PHP ve MySQL gereksinimlerini XAMPP/WAMP vb. bir web sunucusu kullanarak karşılayabilirsiniz.

## Kurulum

Aşağıdaki komutu uygulamanızı kurmak istediğiniz dizinde çalıştırın.

```bash
git clone https://github.com/aslihanturkdonmez/social-media.git
```
<ul>
  <li> <code>.env.example</code> dosyasının adını <code>.env</code> olarak değiştirin</li>
  <li>Kullanacağınız isimde veritabanı oluşturun (Veritabanına tablo eklemeyin)</li>
  <li>env dosyasını projenize göre düzenleyin. Örneğin: <code>Veritabanı adı, DB_PORT...</code></li>
  <li>node modül komutları <br>
    <pre>npm i
npm watch</pre>
  <li>Composer Komutları <br>
      <pre>composer install
composer dump-autoload</pre></li>
    <li>Artisan Komutları
    <pre>php artisan key:generate
php artisan migrate --seed
php artisan storage:link</pre> </li>
</ul>

**NOT:** Proje içerisinde mail doğrulama aktif durumdadır. Kapatmak için <a href="https://jetstream.laravel.com/2.x/features/registration.html#email-verification">burayı</a> inceleyebilirsiniz. 
Eğer mail doğrulama ile çalışacaksanız fake smtp sunucusu sağlayan <a href="https://mailtrap.io/">Mailtrap</a>'i kullanabilirsiniz. *Mailtrap gerçek mail göndermez, gidecek mailleri test etmenizi sağlar.* 
Mailtrap'e kayıt olduktan sonra gerekli bilgileri aşağıdaki gibi <code>.env</code> dosyasına giriniz. 
<pre>MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=aaaa //KULLANIZI ADINIZI GİRİNİZ
MAIL_PASSWORD=1111 //ŞİFRENİZİ GİRİNİZ
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME=Example</pre>

Eğer manuel olarak kullanıcı doğrulama işlemi gerçekleştirmek isterseniz, kullanıcı kaydından sonra veritabanından *users* tablosunun *email_verified_at* sütununu doldurunuz. Bu işlemden sonra giriş yaptığınızda doğrulama ekranına yönlendirilmeyeceksiniz.

## Görünümler
![Screenshot_1](https://user-images.githubusercontent.com/43846857/132924166-90f53ce2-ec7d-4634-9489-8793e582a638.png)
![Screenshot_2](https://user-images.githubusercontent.com/43846857/132924170-2e7a6709-671b-4cbe-aee5-134e8abcdf95.png)
![Screenshot_3](https://user-images.githubusercontent.com/43846857/132924172-bac5f25e-7598-4f57-99ae-468fca25edb9.png)
![Screenshot_4](https://user-images.githubusercontent.com/43846857/132924175-d7ecc9c0-2ff9-487e-ac9c-c7f605bd103b.png)

## Lisans
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
