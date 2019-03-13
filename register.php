<?php

/*Local server*/
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "wangimationDB";



//skapa connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

session_start();

//Skicka till email address data till myphpadmin
if(!empty($_POST['mail'])){

$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
$sql = "INSERT INTO mailList (email)
VALUES ('$mail')";


if ($conn->query($sql) === TRUE) {
    $text = '<h2>Thank you for subscribing!<br>You will get the weekly newsletter from us';
      
    //auto mail
  date_default_timezone_set('Europe/Stockholm');
  mb_language("English");
  mb_internal_encoding("UTF-8");

//header
$header  = 'MINE-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html;charset=UTF-8' . "\r\n";
$header .= "From: Wangimation <noreply@wangimation>\n";
$header .= "Reply-To: Wangimation <noreply@wangimation>\n";

  $subject = "Thank you for subscribing (auto mail)";
  
//mail innehåll
$body_msg = "
<html>
<head>
    <title>Newsletter</title>
</head>
</style>
<body>
<a data-flickr-embed='true'  href='https://www.flickr.com/photos/162650176@N03/47263820812/in/dateposted-public/' title='newsletter'><img src='https://farm8.staticflickr.com/7918/47263820812_0e197b5158_b.jpg' width='500' height='333' ></a><script async src='//embedr.flickr.com/assets/client-code.js' charset='utf-8'></script>
                    <h2>Thank you!</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis sed dignissimos nisi assumenda in adipisci accusantium odit, consequuntur aspernatur quidem, quo ratione iste veritatis eveniet eius maiores necessitatibus dolores eligendi?</p>   
                 <footer>
                     <h4>Wangimation wedding photography</h4>
                 </footer>
</body>
</html>
";

/*Skicka mail*/
$success = mail($mail, $subject, $body_msg, $header);
    
} else {
    $text = '<h2>Oops! Something went wrong!<br>Sorry, You can write your email address again';
    // "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); // Stänga av server

}
else{
    $text = '<h2>You need to write your email address.<br>Please try again<h2>';
}



    session_destroy();
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400|Pinyon+Script|Playfair+Display+SC" rel="stylesheet">
    <title>Wangimation wedding photography</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body{
            font-family: 'Cormorant Garamond', serif;
        }

       h2{
           font-size:0.8em;
           text-align:center;
       }

       .back a{
        display: inline-block;
        text-decoration: none;
        border: 1px solid black;
        color: rgb(0, 0, 0);
        padding: 0.5em 1em;
        letter-spacing: 0.1em;
        margin-top: 6px;
        font-size: 0.6em;
       }

       .back a:hover {
       color: white;
       background-color: #b89671;
      }

      .thanks-container{
        margin: 0;
        padding: 2.5em 1em;
        max-width: 100%;
      }

      .thanks{
        position: relative;
        max-width: 100%;
        min-height: 20em; 
      }

      .bg-img-thanks{
    background-image: url(./img/thankyou.jpg);
    position: absolute;
    width: 100%;
    height: 100%;
    top:0;
    left: 0;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
      }

      .text{
        position: absolute;
    background-color: white;
    top: 50%;
    left: 7%;
    -ms-transform: translateY(-50%);
    -webkit-transform : translateY(-50%);
    transform : translateY(-50%);
    width: 86%;
    padding: 1em;
    display: flex;
    flex-direction: column;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    text-align: center;
      }

     /*Ipad*/
@media screen and (min-width: 768px){
    .thanks{
        min-height: 33em;
    }

    .text{
        width:48%;
        padding: 3em;
    }
    
    h2{
        font-size: 1em;
    }
} 

@media screen and (min-width: 1024px){
    .thanks{
        min-height: 42em;
    }
    
    .text{
        padding: 1em;
    }

    h2{
        font-size: 1.8em;
    }
    .back a{
        font-size: 1em;
    }
}

@media screen and (min-width: 1440px){
    
    .text{
        width:42%;
        padding: 2em;
    }
}

@media screen and (min-width: 1700px){
    .thanks{
        min-height: 50em;
        }
                        
        .text{
        padding: 2em;
        }
    </style>
      
</head>
<body>
   <div class="thanks-container">
       <div class="thanks">
                  <div class="bg-img-thanks"></div>
                  <div class="text">

                      <h2><?php echo $text; ?></h2>
                      <div class="back"><a href="./index.html#subscribe">Back</a></div>
                    </div>
        </div>
       
    </div>
</body>
</html>








    