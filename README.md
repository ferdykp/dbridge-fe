# Cara Hosting
Untuk cara hosting terdapat 2 cara yaitu dengan cara menggunakan panel dan terminal

## Hosting menggunakan panel
Setiap tampilan panel berbeda2 tapi untuk implementasinya seharusnya sama
1. Masuk ke panel
2. Buat website terlebih dahulu di tab website

![{8E4C5095-9451-41B9-8091-6D5DD23A4461}](https://github.com/user-attachments/assets/bd65f300-0e2b-4a78-b7b7-002575204754)


pastikan pada saat pembuatan website memilih versi php 8.3 atau terbaru

![{12A9EAC4-3CEE-4486-978A-493CA1AB8BDC}](https://github.com/user-attachments/assets/e97bbb11-49e6-4d16-b49c-99b006a75a1e)


4. Masuk ke document root atau tempat folder website diltekkan
5. Extract file zip
6. kemudian kembali ke tab website dan setting untuk site directory dan set ke folder public yang ada di folder yang sdh di extract
```
ex. umr-helpdesk-build/public
```
7. Kemudian pada config terdapat Url Rewrite ganti ke laravel


![{CA10569C-06A5-43F6-A054-BE8E93F02CC2}](https://github.com/user-attachments/assets/0098bc9d-7740-4cc9-b1ea-d2f065db9c70)


```
location / {  
	try_files $uri $uri/ /index.php$is_args$query_string;  
}
```
8. Buat database dengan nama umar dan username umar
9. Untuk Password biasanya di set secara otomatis oleh panel dan bisa di set sendiri
10. Masuk ke directory website
11. Ganti line DB_PASSWORD dan isi sesuai dengan password db anda
```
ex. DB_PASSWORD=password
```
12. Masuk ke server dan masuk ke directory website dan jalan kan perintah ini
   - composer install
   - php artisan migrate
   - php artisan db:seed --class=UserSeeder
