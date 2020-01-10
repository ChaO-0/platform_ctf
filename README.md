# Platform CTF(Capture the Flag)
### Created By:
 * Christopher Hendratno(170030041)
 * Fajar Alnito Bagasnanda(170030083)

### Platform ini digunakan untuk orang-orang yang tertarik dengan **Cyber Security** atau **Hacking**.
### Platform ini digunakan sebagai playground untuk orang-orang yang ingin menguji kemampuannya untuk menemukan bug, Analysis, dan memanfaatkan bug untuk mendapatkan shell atau flag
<br>

# Explanation of Capture The Flag
Capture The Flag adalah ajang kompetisi dimana para peserta di-uji untuk mencari celah keamanan atau bug, melakukan **reverse engineering** pada sebuah program, analisis, dll.<br>
Tujuan dari permainan Capture The Flag ini adalah untuk mendapatkan sebuah string tertentu yang merupakan sebuah jawaban yang nantinya akan di-submit di platform, biasanya disebut dengan **FLAG**

### Capture The Flag memiliki beberapa category yaitu:
1. #### PWN / Binary Exploitation
    * PWN adalah category dimana peserta di-uji untuk melakukan analisis terhadap suatu binary dan menemukan celah dimana peserta dapat memanfaatkan celah / bug tersebut untuk mendapatkan **shell** atau **flag**. 
    * Untuk contoh soal **PWN** kami membuat contoh sebanyak 4 soal dan meng-include-kannya dengan tugas ini sebagai contoh untuk permainan **CTF** beserta dengan **exploit** script dan **flag**nya, bisa dilihat pada folder **challenges/uploads/**
2. #### Reverse Engineering
    * Reverse Engineering adalah category dimana peserta akan di-uji untuk melakukan sebuah analisis terhadap suatu binary. Namun tidak seperti **PWN**, dalam Reverse Engineering biasanya peserta akan dituntut untuk mencari **serial key** atau **password** yang terdapat pada suatu binary dengan cara melakukan **reverse** terhadap pengecekan password atau serial key. Terkadang peserta juga sering melakukan **brute force** pada category ini untuk mempermudah mencari **flag**. Namun tidak semua soal **RE** bisa di brute force
3. #### Cryptography
    * Cryptography adalah category dimana peserta diberikan **flag** atau **file** yang ter-enkripsi dan peserta dituntut untuk mencoba men-decrypt sebuah **file** atau **flag** yang ter-enkripsi tersebut dengan cara analisis terhadap script enkripsi. Dalam category Cryptography, biasanya script enkripsi akan diberikan sebagai acuan untuk melakukan analisis hingga akhirnya peserta dapat membuat script untuk decryption.
    * Untuk contoh soal Cryptography kami hanya menyediakan contoh 1 soal saja karena bidang kami yang merupakan **PWN** sehingga kami tidak terlalu bisa untuk membuat soal Crypto.<br> Untuk soal, kami include-kan bersamaan dengan tugas ini di folder **challenges/uploads/**
4. #### Forensic
    * Forensic adalah category dimana peserta diberikan sebuah file, dan peserta boleh bebas melakukan eksplorasi terhadap file tersebut misalnya untuk melihat metadata dari file tersebut dan melakukan hexdump, binwalk, foremost, exiftool, dll terhadap suatu file untuk mencari flag. biasanya soal ini juga memberikan file **.pcap** yang merupakan network capture dimana peserta juga harus melakukan analisis terhadap network traffic yang di capture untuk mendapatkan **flag**
    * Pada category ini juga sering dibilang sebagai **forenshit** karena biasanya pada category ini sangat **guessy** sehingga disebut sebagai category **Guess God**
5. #### Web Hacking
    * Pada category ini, biasanya ini **blackbox** dan tidak diberikan source code sehingga peserta perlu melakukan testing pada **web** untuk mendapatkan suatu celah tertentu misalnya **SQL injection**, **LFI(Local File Inclusion)**, dll untuk mendapatkan flag atau terkadang pun bisa **RCE(Remote Code Execution)** atau **Reverse Shell**.
6. #### Misc
    * Pada category ini biasanya tebak-tebakan dan peserta akan dituntut skill **Reconnaissance**-nya yaitu untuk mencari informasi terhadap target.
<br>

# WriteUps

Pada ajang Capture The Flag, biasanya di akhir lomba peserta diharuskan untuk membuat **Write Up** atau biasa dikenal dengan **POC(Proof Of Concept)** di kalangan umum.<br>
Untuk contoh writeup, kami sudah include-kan di-sini sebagai contoh untuk **Write Up** dan memperkenalkan apa itu **CTF**.<br>
Untuk contoh write up lain, bisa mengunjungi github salah satu dari kelompok kami di 
[link berikut](https://github.com/ChaO-0/WriteUps/blob/master/picoctf/2019/WU-WOY-picoCTF.pdf) untuk soal
**picoCTF** dan [link berikut](https://github.com/ChaO-0/WriteUps) Untuk writeup lainnya

# Capture The Flag Competitions

Di kampus **STIKOM** juga sering mengadakan lomba CTF untuk internal, yaitu pada event:

* GKSK
* GELATIK FastTekno

dan untuk umum nasional, pada event:

* SlashRoot CTF

Untuk event CTF nasional selain di-STIKOM ada:

* Hacktoday
* CSC CTF
* Arkavidia CTF
* Cyber Jawara
* Piala Presiden(2020)
* dll