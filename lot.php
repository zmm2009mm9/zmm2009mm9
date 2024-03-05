<?php

include_once("indexnewu.php");


if($callback == "lotin"){
file_put_contents("step/$cid.txt","Lotin");
   bot('sendMessage',[
    'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"Endi menga xabar jonating!
Lotin => Crilga o'giraman",
'parse_mode'=>"html",
    'reply_markup'=>$ok
        ]);
        }

if($callback == "cril"){
file_put_contents("step/$cid.txt","Cril");
   bot('sendMessage',[
    'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"Endi menga xabar jonating!
Cril => Lotinga o'giraman",
'parse_mode'=>"html",
    'reply_markup'=>$ok
        ]);
        }

if($step=="Cril"){
if(mb_stripos($text,"✏️ ")!==false or mb_stripos($text,"📝")!==false or mb_stripos($text,"/")!==false){
}else{
    $text = str_replace('Ш','Sh​',$text);
    $text = str_replace('Ч','Ch​',$text);
    $text = str_replace('Ш','SH​',$text);
    $text = str_replace('Щ','Sh​',$text);
    $text = str_replace('щ','sh​',$text);
    $text = str_replace('Ч','CH​',$text);
    $text = str_replace('ш','sh​',$text);
    $text = str_replace('ч','ch',$text);
    $text = str_replace('ғ','g\'​',$text);
    $text = str_replace('ў','o\'​',$text);
    $text = str_replace('Ғ​','G\'',$text);
    $text = str_replace('Ў','O\'',$text);
    $text = str_replace('Ц','S',$text);
    $text = str_replace('ц','​s',$text);
    $text = str_replace('A','А​',$text);
    $text = str_replace('Б','B',$text);
    $text = str_replace('Д','D​',$text);
    $text = str_replace('Е','E​',$text);
    $text = str_replace('Ф','F​',$text);
    $text = str_replace('Г​','G',$text);
    $text = str_replace('Ҳ','H',$text);
    $text = str_replace('И','I​',$text);
    $text = str_replace('Ж','J',$text);
    $text = str_replace('К','K​',$text);
    $text = str_replace('Л','L',$text);
    $text = str_replace('M','М',$text);
    $text = str_replace('Н','N',$text);
    $text = str_replace('О','O​',$text);
    $text = str_replace('П','P​',$text);
    $text = str_replace('Қ','Q​',$text);
    $text = str_replace('​Р','R',$text);
    $text = str_replace('С','S',$text);
    $text = str_replace('T','Т​',$text);
    $text = str_replace('У','U',$text);
    $text = str_replace('В','V',$text);
    $text = str_replace('X','X​',$text);
    $text = str_replace('Й','Y​',$text);
    $text = str_replace('З','Z​',$text);
    $text = str_replace('а','а​',$text);
    $text = str_replace('б','b',$text);
    $text = str_replace('д','d​',$text);
    $text = str_replace('е','e​',$text);
    $text = str_replace('ф','f​',$text);
    $text = str_replace('г','g​',$text);
    $text = str_replace('ҳ','h​',$text);
    $text = str_replace('и','i​',$text);
    $text = str_replace('ж','j',$text);
    $text = str_replace('к','k​',$text);
    $text = str_replace('л','l',$text);
    $text = str_replace('м','m',$text);
    $text = str_replace('н','n',$text);
    $text = str_replace('о','о​',$text);
    $text = str_replace('п','p',$text);
    $text = str_replace('қ','q​',$text);
    $text = str_replace('р','​r',$text);
    $text = str_replace('с','s',$text);
    $text = str_replace('т','t​',$text);
    $text = str_replace('у','u',$text);
    $text = str_replace('в','v',$text);
    $text = str_replace('х','x​',$text);
    $text = str_replace('й','y​',$text);
    $text = str_replace('з','z​',$text);
$text = str_replace('я','​ya',$text);
$text = str_replace('Я','​YA',$text);
$text = str_replace('ю','​yu',$text);
$text = str_replace('Ю','​YU',$text);
$text = str_replace('Ы','​I',$text);
$text = str_replace('ы','​i',$text);
$text = str_replace('Ъ','​',$text);
$text = str_replace('ъ','​',$text);
$text = str_replace('Ь','​',$text);
$text = str_replace('ь','​',$text);
bot("sendMessage",[
'chat_id'=>$cid,
'text'=>$text,
'parse_mode'=>'html',
]);
}}

if($step=="Lotin"){
if(mb_stripos($text,"✏️ ")!==false or mb_stripos($text,"📝")!==false or mb_stripos($text,"/")!==false){
}else{
$text = str_replace('YA','​Я',$text);
$text = str_replace('ya','​я',$text);
$text = str_replace('YU','​Ю',$text);
$text = str_replace('yu','​ю',$text);
$text = str_replace('Sh','Ш​',$text);
$text = str_replace('Ch','Ч​',$text);
$text = str_replace('SH','Ш​',$text);
$text = str_replace('CH','Ч​',$text);
$text = str_replace('sh','ш​',$text);
$text = str_replace('ch','ч',$text);
$text = str_replace('g\'','ғ​',$text);
$text = str_replace('o\'','ў​',$text); 
$text = str_replace('G\'','Ғ​',$text);
$text = str_replace('O\'','Ў',$text);
$text = str_replace('A','А​',$text);
$text = str_replace('B','Б',$text);
$text = str_replace('D','Д​',$text);
$text = str_replace('E','Е​',$text);
$text = str_replace('F','Ф​',$text);
$text = str_replace('G','Г​',$text);
$text = str_replace('H','Ҳ​',$text);
$text = str_replace('I','И​',$text);
$text = str_replace('J','Ж',$text);
$text = str_replace('K','К​',$text);
$text = str_replace('L','Л',$text);
$text = str_replace('M','М',$text);
$text = str_replace('N','Н',$text);
$text = str_replace('O','О​',$text);
$text = str_replace('P','П​',$text);
$text = str_replace('Q','Қ​',$text);
$text = str_replace('R','​Р',$text);
$text = str_replace('S','С',$text);
$text = str_replace('T','Т​',$text);
$text = str_replace('U','У',$text);
$text = str_replace('V','В',$text);
$text = str_replace('X','Х​',$text);
$text = str_replace('Y','Й​',$text);
$text = str_replace('Z','З​',$text);
$text = str_replace('a','а​',$text);
$text = str_replace('b','б',$text);
$text = str_replace('d','д​',$text);
$text = str_replace('e','е',$text);
$text = str_replace('f','ф​',$text);
$text = str_replace('g','г​',$text);
$text = str_replace('h','ҳ​',$text);
$text = str_replace('i','и​',$text);
$text = str_replace('j','ж',$text);
$text = str_replace('k','к​',$text);
$text = str_replace('l','л',$text);
$text = str_replace('m','м',$text);
$text = str_replace('n','н',$text);
$text = str_replace('o','о​',$text);
$text = str_replace('p','п​',$text);
$text = str_replace('q','қ',$text);
$text = str_replace('r','​р',$text);
$text = str_replace('s','с',$text);
$text = str_replace('t','т​',$text);
$text = str_replace('u','у',$text);
$text = str_replace('v','в',$text);
$text = str_replace('x','х​',$text);
$text = str_replace('y','й​',$text);
$text = str_replace('z','з​',$text);
bot("sendMessage",[
'chat_id'=>$cid,
'text'=>$text,
'parse_mode'=>'html',
]);
}}

?>