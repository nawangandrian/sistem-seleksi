<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * Email pengirim
     */
    public $fromEmail = 'andrian.wang127@gmail.com'; // Ganti dengan email Anda

    /**
     * Nama pengirim
     */
    public $fromName = 'BLK Kudus';

    /**
     * Penerima
     */
    public $recipients;

    /**
     * User Agent
     */
    public $userAgent = 'CodeIgniter';

    /**
     * Menggunakan protokol SMTP
     */
    public $protocol = 'smtp';

    /**
     * Path ke sendmail (jika menggunakan sendmail)
     */
    public $mailPath = '/usr/sbin/sendmail';

    /**
     * Host SMTP (Gmail, Mailtrap, dsb.)
     */
    public $SMTPHost = 'smtp.gmail.com'; // Ganti sesuai penyedia email

    /**
     * Username SMTP
     */
    public $SMTPUser = 'andrian.wang127@gmail.com'; // Email pengirim

    /**
     * Password SMTP
     */
    public $SMTPPass = 'wxxd szej rbjs xlst'; // Gunakan App Password jika memakai Gmail oyee ubkp dmwf celc , dzim lszw clht gcni

    /**
     * Port SMTP
     */
    public $SMTPPort = 587; // Gunakan 465 jika menggunakan SSL

    /**
     * Timeout SMTP
     */
    public $SMTPTimeout = 10;

    /**
     * Gunakan koneksi tetap?
     */
    public $SMTPKeepAlive = false;

    /**
     * Metode enkripsi SMTP (ssl/tls)
     */
    public $SMTPCrypto = 'tls';

    /**
     * Aktifkan word-wrap
     */
    public $wordWrap = true;

    /**
     * Panjang karakter untuk word-wrap
     */
    public $wrapChars = 76;

    /**
     * Format email (text atau html)
     */
    public $mailType = 'html';

    /**
     * Charset email
     */
    public $charset = 'UTF-8';

    /**
     * Validasi alamat email?
     */
    public $validate = true;

    /**
     * Prioritas email (1=tinggi, 3=normal, 5=rendah)
     */
    public $priority = 3;

    /**
     * Karakter newline
     */
    public $CRLF = "\r\n";

    /**
     * Karakter newline
     */
    public $newline = "\r\n";

    /**
     * Mode BCC Batch
     */
    public $BCCBatchMode = false;

    /**
     * Ukuran batch BCC
     */
    public $BCCBatchSize = 200;

    /**
     * Aktifkan Delivery Status Notification
     */
    public $DSN = false;
}
