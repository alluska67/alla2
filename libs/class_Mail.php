<?php

class Mail {
    static $subject = 'Default';
    static $from = 'alluska67@alluska67.zzz.com.ua';
    static $to = 'alluska67@gmail.com';
    static $text = "This mail is your's!";
    static $headers = '';

    static function send() {
        self::$subject = '=?utf-8?b?' . base64_encode(self::$subject) . '?=';
        self::$headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
        self::$headers .= "From: " . self::$from . "\r\n";
        self::$headers .= "MINE-Version: 1.0\r\n";
        self::$headers .= "Date: " . date('D,d M Y h:i:s') . "\r\n";
        self::$headers .= "Precedence: bulk\r\n";

        if(mail(self::$to, self::$subject, self::$text, self::$headers)){
            return'Письмо отправилось';
        }else{
            return 'Письмо не отправилось';
        }

    }

    static function testSend() {
        if(mail(self::$to,self::$subject,self::$text,self::$headers)){
            echo 'Письмо отправилось';
        }else{
            echo 'Письмо не отправилось';
        }
        exit();

    }

}


