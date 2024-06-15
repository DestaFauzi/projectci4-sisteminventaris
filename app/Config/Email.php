<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'destafauzi279@gmail.com';
    public $fromName = 'Peminjam';
    public $SMTPDebug = 0;
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'destafauzi279@gmail.com';
    public $SMTPPass = 'Miegoreng7.';
    public $SMTPPort = 465;
    public $SMTPCrypto = 'ssl';
    public $mailType = 'html';
    public $charset = 'utf-8';
    public $wordWrap = true;
    public $newline = "\r\n";
    public $validate = true;
    public $CRLF = "\r\n";
}
