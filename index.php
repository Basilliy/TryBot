<?php
/**
 * Telegram Bot access token и URL.
 */
 
$access_token = '246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA';
$url = 'https://api.telegram.org/bot' . $access_token;
$output = json_decode(file_get_contents('php://input'), true);
$chat_id = $output['message']['chat']['id'];
$message = $output['message']['text'];
$fp = json_decode(file_get_contents('user.json'), true);

//$say = file_get_contents("https://evilinsult.com/generate_insult.php?lang=en");
//file_put_contents("errors.txt",$say);


if(isset($output['inline_query'])){
  $id = $output['inline_query']['from']['id'];
  //$wr = json_encode($id);
 // file_put_contents("errors.txt",$id);
  $inline_lang = checkLanguageInline($fp,$id);
  //file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendMessage?chat_id=".$id."&text=hey&parse_mode=HTML");
  
    $input_context = array(
                           "message_text" => "russik is cool"
                          );
//$fuck = file_get_contents("errors.txt");
    $say = file_get_contents("https://evilinsult.com/generate_insult.php?lang=".$inline_lang);
    $gen = array( "type" => "article",
                  "id" => "2",
                  "title" => "Generate",
                  "input_message_content" => array("message_text"=>$say)
                  );
    $home = array( "type" => "article",
                  "id" => "1",
                  "title" => "Home Page",
                  "input_message_content" => array("message_text"=>'<a href="https://evilinsult.com/">Visit our web site</a>',
                                                    "parse_mode" => "HTML"),
                  //"reply_markup" => array("inline_keyboard" => $opz) **** подключить в случае необходимости
                  );
                 // $all = [$rus,$russik];
    $drug = json_encode([$gen,$home]);
    
    file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/answerInlineQuery?inline_query_id=".$output['inline_query']['id']."&results=".$drug."&cache_time=1"); 
}

function checkLanguageInline($mass,$chat_id){
    $language = 'en';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }
    return $language;
}

$botanToken = 'ue7xV8Wl5Q2QgHD7yGWfPApy_WBC1Hp8';
file_get_contents("https://api.botan.io/track?token=".$botanToken."&uid=".$chat_id."&name=search");
file_get_contents("https://api.botan.io/track?token=".$botanToken."&uid=".$chat_id."&name=search%20californication");
function _incomingMessage($output) {
    $messageData = $output['message'];
    $botan = new Botan($this->access_token);
    $botan->track($messageData, 'Start');
}
if(isset($output['callback_query']['data'])){
if (checkUser($fp, $output['callback_query']['message']['chat']['id']) != false) {
            foreach ( $fp as $key=> $value) {
              if($key==$output['callback_query']['message']['chat']['id']){
                 $fp[$key] = $output['callback_query']['data'];
              }
             }
             $arr3 = json_encode($fp);
             file_put_contents('user.json', $arr3);
          }
          else{
           AddUserLanguage($output['callback_query']['message']['chat']['id'],$fp,$output['callback_query']['data']);
          }
file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendMessage?chat_id=".$output['callback_query']['message']['chat']['id']."&text=Language successfully changed to: ".($output['callback_query']['data'])."&parse_mode=HTML");//exit();
exit();
            
}

$emoji = array(
  'preload' => json_decode('"\ud83d\udc79"')
);
switch ($message) {
    case '/start':
        $message = 'Welcome To The Evil Insult Generator Telegram Bot!'. $emoji['preload'] ;
    sendMessage($chat_id,$message.printKeybord());
        break;
    case 'Language':
         $message = 'Choose language.';
    sendMessage($chat_id,$message.inlineKeybord());
        break;
    case '/language':
         $message = 'Choose language.';
    sendMessage($chat_id,$message.inlineKeybord());
        break;
     case 'Genegate Insult':
        checkLanguage($fp,$chat_id);
        break;
    case 'Homepage':
        $message='';
          sendMessage($chat_id,forURL());
        break;
       case 'secret Keyboard':
             $message = 'You found my secret';
        sendMessage($chat_id, $message.secretKeyboard());
         break;
         case 'Generate Secret':
                FuckYou($chat_id);
         break;
         case 'Go Back':
             $message = "Welcome back";
        sendMessage($chat_id,$message.printKeybord());
         break; 
    default:
     if(!isset($output['inline_query'])){
       checkLanguage($fp, $chat_id);
     }
}
function FuckYou($chat_id){
    $number = rand(1, 4);
    switch($number){
            case 1:
                $photo = "AgADAgADs6cxGy1h7g_4CyeuCcFzkJMjcQ0ABBH8Y3MeW8w5aUsAAgI";
            sendPhoto($chat_id, $photo);
            break;
            case 2:
                $photo = "AgADAgADsqcxGy1h7g8dBdAETGyaUaMrcQ0ABKgghyjXUQayzkoAAgI";
            sendPhoto($chat_id, $photo);
            break;
            case 3:
                $photo = "AgADAgADsacxGy1h7g9KAiIu5zjfv8g1cQ0ABGrlstN4Rt0s-0wAAgI";
            sendPhoto($chat_id, $photo);
            break;
            case 4:
                $photo = "AgADAgADsKcxGy1h7g_J-P6O8n0Gv7ogcQ0ABPODhNMNWhfrF04AAgI";
            sendPhoto($chat_id, $photo);
            break;
    }
    
}
function genegateInsult($chat_id,$lang){
    $fuck = file_get_contents("https://evilinsult.com/generate_insult.php?lang=".$lang);
    sendMessage($chat_id, $fuck);
}
function sendMessage($chat_id, $message) {
    file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendMessage?chat_id=".$chat_id."&text=".$message.printKeybord()."&parse_mode=HTML");
}
function checkUser($mass,$chat_id){
    $is = false;
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $is = true;
        }
    }
    return $is;
}
function AddUserLanguage($chat_id,$mass,$message){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
}
function AddUser($chat_id,$mass,$message){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
    genegateInsult($chat_id,$message);
}
function secretKeyboard(){
        $reply_markup = '';
    $buttons = [['Go Back'],['Generate Secret']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => false,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard;
    
    return $reply_markup;
}
function checkLanguage($mass,$chat_id){
    $language = 'en';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }
    genegateInsult($chat_id,$language);
}

function printKeybord(){
    
$host = 'upperl.mysql.ukraine.com.ua'; // адрес сервера 
$database = 'upperl_vadik'; // имя базы данных
$user = 'upperl_vadik'; // имя пользователя
$password = '2shmpzez'; // пароль
$link = mysqli_connect($host, $user, $password,$database)
    or die('Не удалось соединиться: ' . mysql_error());
//echo 'Соединение успешно установлено';
// Выполняем SQL-запрос
$query = 'SELECT * FROM menu';
$result = $link->query($query) or die('Запрос не удался: ' . mysql_error());
//print_r($result);
$rows = $result->fetch_assoc();
//print_r($rows['ButtonsName']);
//$mystring = 'Generate Insult,Language,Homepage';
$findme   = ',';
$button = explode($findme, $rows['ButtonsName']);
for($i = 0; $i < count($button); $i++){
    echo '<br>';
    //print_r($button["$i"]);
    
}
// Закрываем соединение
$link->close();

        $reply_markup = '';
     $buttons = [$button];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => false,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard . '';
    
    return $reply_markup;
}
function inlineKeybord(){ //create a text description that will be passed to the server
$reply_markup = '';
$x1 = array('text'=>'en','callback_data'=>"en");
$x2 = array('text'=>'de','callback_data'=>"de");
$x3 = array('text'=>'ru','callback_data'=>"ru");
$x4 = array('text'=>'fr','callback_data'=>"fr");
$x5 = array('text'=>'es','callback_data'=>"es");
$x6 = array('text'=>'pt','callback_data'=>"pt");
$x7 = array('text'=>'cn','callback_data'=>"cn");
$x8 = array('text'=>'sw','callback_data'=>"sw");
//You should create a new variable $xn(next6 number), and you should describe about it in the field "text" and add "callback_data", 
//which will return to the server
///Displays only message
$opz = [[$x1,$x2,$x3,$x4],[$x5,$x6,$x7,$x8]];
$keyboard=array("inline_keyboard"=>$opz);
$keyboard = json_encode($keyboard,true);
     $reply_markup = '&reply_markup=' . $keyboard;
    return $reply_markup;
}
function sendPhoto($chat_id, $photo){
    file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendphoto?chat_id=".$chat_id."&photo=".$photo);
}
function forURL(){
    $HTML='<a href="https://evilinsult.com/">http://evilinsult.com/</a>';
    return $HTML;
}
