<?php
ob_start();
error_reporting(0);
date_default_timezone_set("Asia/Tashkent");

include_once("tarjimon1.php");
include_once("lot.php");



define('API_KEY','6719540477:AAFsBc9xv13nQ3hHi5REWbRgOHwdEK3j_oM');
$soat = date('H:i');
$sana = date('d.m.Y');



function bot($method,$steps=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$steps);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}



$update = json_decode(file_get_contents('php://input'));
$callid = $update->callback_query->id;
$type = $update->message->chat->type;
$bot = bot('getMe')->result->username;
$ccid = $callback->message->chat->id;
$data = $update->callback_query->data;
$data = $update->callback_query->data;
$cmid = $callback->message->message_id;
$botdel = $update->my_chat_member->new_chat_member;
$botdel_id = $update->my_chat_member->from->id;
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$reply_text = $message->reply_to_message->text;
$user_id = $message->from->id;
$id = $message->from->id;
$admin = 929060249;
$reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
$userstatus = $botdel->status;
if(!empty($update->message)){
if(!empty($update->message->text)){
$text = $update->message->text;
}
if(!empty($update->message->chat->id)){
$cid = $update->message->chat->id;
}
if(!empty($update->message->from->id)){
$from_id = $update->message->from->id;
}
if(!empty($update->message->message_id)){
$mid = $update->message->message_id;
}
if(!empty($update->message->chat->first_name)){
$first_name = $update->message->chat->first_name;
}
if(!empty($update->chat->first_name)){
$first_name = $message->chat->first_name;
}
if(!empty($update->message->chat->username)){
$user_name = $update->message->chat->username;
}
if(!empty($update->chat->username)){
$user_name = $message->chat->username;
}
}
if(!empty($update->callback_query)){
if(!empty($update->callback_query->data)){
$callback = $update->callback_query->data;
}
if(!empty($update->callback_query->message->chat->id)){
$cid = $update->callback_query->message->chat->id;
}
if(!empty($update->callback_query->from->id)){
$from_id = $update->callback_query->from->id;
}
if(!empty($update->callback_query->message->message_id)){
$mid = $update->callback_query->message->message_id;
}
if(!empty($update->callback_query->from->first_name)){
$first_name = $update->callback_query->from->first_name;
}
}

mkdir("apii");
mkdir("trans");
mkdir("step");
mkdir("sp");
$userstr = file_get_contents("trans/$cid.txt");
$step = file_get_contents("step/$cid.txt");
$spe = file_get_contents("sp/$cid.txt");
$userstrap = file_get_contents("apii/$cid.txt");


$home = json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[['text'=>"🔁 Tarjima Qilish",'callback_data'=>"tarjima"],['text'=>"⏸ Speech to Text",'callback_data'=>"spech"]],[['text'=>"✏️ Lotin-К,Крил-L",'callback_data'=>"lk_kl"]],
]
]);

$lk_kl = json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[['text'=>"✏️ Lotin-Cril",'callback_data'=>"lotin"],['text'=>"✏️ Cril-Lotin",'callback_data'=>"cril"]],
]
]);

// [['text'=>"✏️ Lotin-Cril",'callback_data'=>"lotin"],['text'=>"✏️ Cril-Lotin",'callback_data'=>"cril"]],

if($text == "/start" or $text == "Бекор қилиш"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🌟 Assalomu alaykum xurmatli foydalanuvchi!</b>

<i>🔁 Tarjima qilmoqchi o'lgan matningiz yoki so'zingizni yuboring!</i>",
'parse_mode'=>'html',
'reply_markup'=>$home,
]);
exit();
}

        if($callback == "lk_kl"){
file_put_contents("step/$cid.txt","lk_kl");
   bot('sendMessage',[
    'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"Tanlang!",
'parse_mode'=>"html",
    'reply_markup'=>$lk_kl
        ]);

        }

        if($callback == "spech"){
file_put_contents("step/$cid.txt","spech");
   bot('sendMessage',[
    'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"Endi menga ovozli xabar ayting!",
'parse_mode'=>"html",
    'reply_markup'=>$ok
        ]);

        }


        
        if($callback == "tarjima"){
file_put_contents("step/$cid.txt","tarjima");
   bot('sendMessage',[
    'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"Endi menga xabar jonating!",
'parse_mode'=>"html",
    'reply_markup'=>$ok
        ]);
        }


if(mb_stripos($callback, "trans=")!==false){
$ex = explode("=",$callback);
$tr_dav = $ex[1];
$trans_matn=file_get_contents("https://u13121.xvest2.ru/lotin/trapi.php?text=".urlencode($userstr)."&tr=$tr_dav");
bot('answerCallbackQuery',[
'callback_query_id'=>$callid,
'text'=>"Tarjima qilinmoqda...",
'show_alert'=>false,
]);
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$trans_matn",
'parse_mode'=>'html',
]);
unlink("trans/$cid.txt");
exit();
}



if(isset($update->message->text) and $step != "Cril" and $step != "Lotin" and $step != "spech" and $step == "tarjima"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🇺🇿 Matnni qaysi tilga tarjima qilish kerak?
🇷🇺На какой язык переводить текст?
🇬🇧 Which language should the text be translated into?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🇺🇿 O'zbek tiliga",'callback_data'=>"trans=uz"],['text'=>"🇬🇧 Ingiliz tiliga",'callback_data'=>"trans=gb"],['text'=>"🇷🇺 Rus tiliga",'callback_data'=>"trans=ru"]],
[['text'=>"🇫🇷 Fransuz tiliga",'callback_data'=>"trans=fr"],['text'=>"🇩🇪 German tiliga",'callback_data'=>"trans=de"]],
[['text'=>"🇹🇷 Turk Tiliga",'callback_data'=>"trans=tr"],['text'=>"🇸🇦 Arab tiliga",'callback_data'=>"trans=ar"]],
[['text'=>"🇰🇷 Koreys Tiliga",'callback_data'=>"trans=ko"],['text'=>"🇪🇸 Ispan tiliga",'callback_data'=>"trans=es"]],
[['text'=>"🇦🇿 Azarbaijan Tiliga",'callback_data'=>"trans=az"]],
]
])
]);
file_put_contents("trans/$cid.txt", $text);
exit();
}
