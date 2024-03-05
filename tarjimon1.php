<?php

//include_once("indexneu.php");
include_once("lot.php");
include_once("panel.php");

$update = json_decode(file_get_contents('php://input'));

$message = $update->message;         //Telegram serveridan kelgan xabardan message'ni ajratib olish

$text = $message->text;           //Kelgan message ichidan text'ni ajratib olish
$chat_id = $message->chat->id;           //Xabar yuboruvchisining telegram id'sini ajratib olish
$message_id  = $message->message_id;          //Xabar yuboruvchi xabarining message id'sini ajratib olish

// agar xabar ovozli xabar bo'lsa.....
if(isset($message->voice)){

    $voice_file_id = $message->voice->file_id;      //xabardan ovozli xabarni ajratib olish

    $file_path = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$voice_file_id), true)['result']['file_path'];     // ovozli xabarning url manzilini aniqlab olish

    $voice_file = file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$file_path);   // url manzilni tayyor qilish

$file_ur = "https://api.telegram.org/file/bot6719540477:AAFsBc9xv13nQ3hHi5REWbRgOHwdEK3j_oM/$file_path";
    file_put_contents('voicee/voice_message.ogg', $voice_file);     // shu fayl ichiga ovozli xabarni joylashtirish




// mohir.ai dan olingan api_key
$api_key = '60890719-e02b-44ed-a10d-48cd7ab8af30:9cda9312-b9f4-436a-ba3f-0dc05a5e0a3e';   

// ovozli xabar turgan joy
$file_path = 'voicee/voice_message.ogg';

// Initialize cURL session
$curl = curl_init();
// ovozli xabarni matnga aylantirish
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://mohir.ai/api/v1/stt',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('return_offsets' => 'false','run_diarization' => 'false','blocking' => 'true','webhook_notification_url' => 'https://u13121.xvest2.ru/lotin/callback.php','file'=> new CURLFILE($file_path)),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: multipart/form-data',
    'Authorization: '.$api_key
  ),
));

$response = curl_exec($curl);

curl_close($curl);



// tayyor matnni foydalanuvchiga yuborish
if ($response === false){
    bot("sendmessage", [
'chat_id'=>$chat_id,
'text'=>curl_error($curl)
    ]);
}elseif(isset($update->message->voice) and $step != "Cril" and $step != "Lotin" and $step != "tarjima" and $step == "spech"){

    $js = json_decode($response);

file_put_contents("trans/$cid.txt", $js->result->text);

bot("sendmessage", [
'chat_id'=>$chat_id,
'text'=>$js->result->text,
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🇺🇿 Uzbek to 🇬🇧 English",'callback_data'=>"trans=gb"]],
]
])
]);

}


}