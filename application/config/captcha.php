<?php
// BotDetect PHP Captcha configuration options

$config = array(
    // Captcha configuration for review page
    'CakeCaptcha' => array(
        'UserInputID' => 'CaptchaCode',
        'ImageWidth' => 250,
        'ImageHeight' => 50,
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
        'ImageStyle' => ImageStyle::AncientMosaic,
    ),

);