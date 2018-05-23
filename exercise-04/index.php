<?php

echo "md5 is hashed, it's main you have a tring into encrypt data <br>";
echo md5("demo");
echo "<br><br>";

echo "This does the same but longer ! <br>";
echo sha1("demo");
echo "<br><br>";

echo "Show the date! <br>";
echo date('Y-m-d');
echo "<br><br>";

echo "Show more detalils <br>";
$date = date_create();
echo date('Y-m-d H:i:s');
echo "<br><br>";



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo "Generate Random String <br>";
echo generateRandomString();
?>