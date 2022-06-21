<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="prefetch" href="roll.gif">
    <style>
        
        *{
            overflow: hidden;   
        }
        
        body{
            height: 100vh;
            background: linear-gradient(rgb(84, 84, 113), rgb(116, 108, 116));
        }

        img {
            height: 60vh;
        }

        h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-family: 'Radio Canada', sans-serif;
        }
        .center{
            background-color: white;
            opacity: 0.9;
            border-radius: 10px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700&family=Radio+Canada&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://nikas.com.np/cascadelib/center.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IP Address phishing</title>
</head>

<body>
    <div class="center">
        <h1>KEEP CALM AND</h1>
        <img src="roll.gif">
        <h1>GET ROLLED</h1>
    </div>
</body>

</html>

<?PHP

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();



//PUTTING IN FILE

file_put_contents("ip.html", "<div class='ip'>", FILE_APPEND | LOCK_EX);
file_put_contents("ip.html", $user_ip, FILE_APPEND | LOCK_EX);
file_put_contents("ip.html", "</div>", FILE_APPEND | LOCK_EX);


?>