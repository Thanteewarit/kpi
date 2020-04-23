<?php 
function RandomString($length = 10)
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charactersLength = strlen($characters);
        $randomString = "";
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
function TokenGen($data, $secret)
    {
        $ran = RandomString(5);
        //$header = json_encode(["typ" => "JWT", "alg" => "HS256", "domain" => $GLOBALS["_DOMAIN"]]);
        //$payload = json_encode($data);
        //$base64UrlHeader = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($ran . $header));
        //$base64UrlPayload = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($ran . $payload));
        //$signature = hash_hmac("sha256", $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        //$base64UrlSignature = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($signature));
        //return $base64UrlHeader . $ran . $base64UrlPayload . $ran . $base64UrlSignature . $ran;
    }

//function TokenVerify($token, $secret)
//    {
//        $tokentemp = explode(substr($token, -5), $token);
//        $signature = hash_hmac("sha256", $tokentemp[0] . "." . $tokentemp[1], $secret, true);
//        $base64UrlSignature = str_replace(["+", "/", "="], ["-", "_", ""], base64_encode($signature));
//        if ($base64UrlSignature == $tokentemp[2]) {return substr(base64_decode($tokentemp[1]), 5);} else {return false;}
//    }

echo $i=base64_encode("iiiii");
echo "<br>";
echo base64_decode($i);
echo "<br>";
echo RandomString(5);
echo "<br>";
?>
<?php
$a = 1;
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
} 

Sum();
echo $b;
?>

