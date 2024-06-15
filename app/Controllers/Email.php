<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'destafauzi279@gmail.com'; // Ganti dengan email Anda
    public $SMTPPass = 'Mieayam7.'; // Ganti dengan password email Anda
    public $SMTPPort = 587;
    public $SMTPCrypto = 'tls';
    public $mailType = 'html';
    public $charset = 'utf-8';
    public $newline = "\r\n";
}
