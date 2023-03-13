<!-- lFjfqsb1Y40BxJlgTPjnuQKtlKkewq5JzbUjtf7O1VX -->
    
<?php
    
        session_start();
        $secretkeyrecaptcha = "6LfF4XwkAAAAAEeYafV9ytHCVbIpxwWOeTo_dh8w";
        if(isset($_POST['g-recaptcha-response'])){
        $captcha = $_POST['g-recaptcha-response'];
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkeyrecaptcha."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if(!$captcha){
        $missinginputsecret = ["The response parameter is missing."];
        print_r($missinginputsecret[0]);}        
        }
        if(isset($_POST['submit'])  && $response['success'] == true){ 
        }
  
        $name = $_POST['name'];
        $email = $_POST['email'];
        $des = $_POST['des'];
    
    if($name ==""){
        $name = "ไม่ประสงค์ออกนาม";
    }
           
            $message = "\n".'จาก: '.$name."\n".'อีเมลล์: '.$email."\n".'ข้อความ: '.$des;

                sendlinemesg();
                header('Content-Type: text/html; charset=utf-8');
                $res = notify_message($message);
                
  
                function sendlinemesg() {
            
                    define('LINE_API',"https://notify-api.line.me/api/notify");
                    define('LINE_TOKEN','OxogYkz4Ha0PCpDCGVmNaZzt5qgPWNc5gmofSwSOIWD');
                
                    function notify_message($message){
                
                        $queryData = array('message' => $message);
                        $queryData = http_build_query($queryData,'','&');
                        $headerOptions = array(
                            'http'=>array(
                                'method'=>'POST',
                                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                        ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                        ."Content-Length: ".strlen($queryData)."\r\n",
                                'content' => $queryData
                            )
                        );
                        $context = stream_context_create($headerOptions);
                        $result = file_get_contents(LINE_API,FALSE,$context);
                        $res = json_decode($result);
                        return $res;
                
                    }
                
                }
        echo "<script type = 'text/javascript'>;
            window.history.back();;
            location.reload();
         </script>";
?>