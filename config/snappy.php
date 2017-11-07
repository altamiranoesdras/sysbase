<?php
$binaryPdf = env('APP_ENV')=='local' ? '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"' : '"/opt/wkhtmltox/bin/wkhtmltopdf"';
$binaryImg = env('APP_ENV')=='local' ? '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage"' : '"/opt/wkhtmltox/bin/wkhtmltoimage"';

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => $binaryPdf,
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => $binaryImg,
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);