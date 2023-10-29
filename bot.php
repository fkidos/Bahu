<?php
set_time_limit(0);
ob_start();

define('API_KEY','توکن');// ربات
//---------------Source_Home-----------------//
function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".API_KEY."/".$method;
	$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true)
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function Forward($kojashe, $azkoja, $kodommsg){
	bot('forwardmessage',[
	'chat_id'=>$kojashe,
	'from_chat_id'=>$azkoja,
	'message_id'=>$kodommsg
	]);
}
function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function IranTime(){
        date_default_timezone_set("Asia/Tehran");
        return date('H:i:s');
    }
//----------------//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
mkdir("data/$chat_id");
mkdir("data");
$message_id = $message->message_id;
$from_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;
$textmassage = $message->text;
$reply = $update->message->message_id;
$replyy = $update->message->reply_to_message->forward_from->id;
$message_id2 = $update->callback_query->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$c_id = $message->forward_from_chat->username;
$m_id = $message->forward_from_message_id;
$ADMIN = 000000000;//آیدی عددی ادمین
$bonlist = file_get_contents("data/$from_id/pen.txt");
$codeban = file_get_contents("data/$from_id/codeban.txt");
$admins = file_get_contents("data/$from_id/admins.txt");
$adminlist = file_get_contents("data/$from_id/adminlist.txt");

$channel = file_get_contents("taaban.txt");
$channel1 = file_get_contents("cheban.txt");
$zaman = IranTime();
$token = API_KEY;
$basetime = file_get_contents("http://one-code.ir/time/");
$getchat = json_decode($basetime,true);
$time = $getchat["FAtime"];
$date = $getchat["FAdate"];
$ali  = file_get_contents("data/$from_id/ali.txt");
$sendb  = file_get_contents("data/$from_id/sendb.txt");
$sendba  = file_get_contents("data/$from_id/sendba.txt");
$chlok = file_get_contents("chlok.txt");
$ghav = file_get_contents("ghav.txt");

$ersalbyph = file_get_contents("ersalbyph.txt");
$tanask = file_get_contents("tanask.txt");

$adtik1 = file_get_contents("adtik1.txt");
$adtik2 = file_get_contents("adtik2.txt");
$adtik3 = file_get_contents("adtik3.txt");
$adtik4 = file_get_contents("adtik4.txt");

$tanmatask = file_get_contents("tanmatask.txt");
$ersaltomatn = file_get_contents("ersaltomatn.txt");
$jkr = file_get_contents("jkr.txt");
$sabtmb = file_get_contents("sabtmb.txt");
$tchq = $forchannelq->result->status;
//--------------Source_Home-------------//
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@".$chlok."&user_id=".$from_id); 
if(strpos($inch , '"status":"left"') == true ) { 
	file_put_contents("data/$from_id/ali.txt","none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ شما عضو کانال ما نیستید ⛔

💠 برای ادامه کار با ربات باید عضو کانال ربات بشوید .

🚫 جهت عضویت روی دکمه زیر کلیک کنید و دوباره /start رو ارسال کنید.
",
'reply_markup'=>json_encode(
'inline_keyboard'=>[
[
['text'=>"📢 عضویت در کانال",'url'=>"https://t.me/$chlok"]
],
[
['text'=>"بررسی عضویت 🔍",'callback_data'=>'lockch']
],
]
])
]);


return true;
} 
if ($bonlist == 'yes') {
        SendMessage($chat_id,"شما از ربات مسدود شدید لطفا دیگر پیام ندید");
        return ;
}
//=======
elseif($textmassage == "/start"){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($from_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $from_id."\n";
file_put_contents('Member.txt',$add_user);
file_put_contents('users.txt', $add_user);
    }
$startm = file_get_contents("startm.txt");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$startm
سلام $name عزیز 🌺

📲 به ربات بنردهی فونت ادیت خوش اومدی .

💎 برای اینکه اسم پروفایلتو زیبانویسی کنی باید به بنر ما 50 سین بزنی برای این کار روی دریافت بنر بزن .

⏰ ساعت عضویت شما: $zaman

⚜ @Source_Home
",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"✥دریافت بنر(عکسی)📥✥"],['text'=>"✥دریافت بنر(متنی)📥✥"]
],
[
['text'=>"✥تحویل بنر📤✥"]
],
[
['text'=>"✥پشتیبانی👨‍💻✥"],['text'=>"✥‼️قوانین✥"]
],
]
])
]);
}

elseif($textmassage == "برگشت ↪"){
	
	file_put_contents("jkr.txt","none");
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/ali.txt","none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🎈 به منوی اصلی برگشتیم 

🎇 لطفا انتخاب کنید
",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"✥دریافت بنر (عکسی)📥✥"],['text'=>"✥دریافت بنر(متنی)📥✥"]
],
[
['text'=>"✥تحویل بنر📤✥"]
],
[
['text'=>"✥پشتیبانی👨‍💻✥"],['text'=>"✥‼️قوانین✥"]
],
]
])
]);
}
elseif($textmassage == "✥دریافت بنر (عکسی)📥✥" and $ersalbyph != 'on'){
		SendMessage($chat_id,"این بخش غیر فعال میباشد");
		}
elseif($textmassage == "✥دریافت بنر (عکسی)📥✥" and $ersalbyph == 'on'){
	/*if ($ersalbyph != 'on'){
		SendMessage($chat_id,"این بخش غیر فعال میباشد");
		}*/
date_default_timezone_set('Asia/Tehran');
        $date1 = date('Ymd');
        $gettime = file_get_contents("data/$from_id/dates.txt");
        
	file_put_contents("data/$from_id/dates.txt",$date1);
$dt = json_decode(file_get_contents("https://api.mostafa-am.ir/date-time/"));
$date = $dt->date_fa;
$sabtmb = file_get_contents("sabtmb.txt");
$lower = range('a','z');
$upper = range('A','Z');
$digit = range(0,9);
$sp = ['!','@','#','$','%','^','&','*'];
$total = array_merge($lower,$upper,$digit,$sp);
$pass = $lower[rand(0,25)] . $upper[rand(0,25)] . $digit[rand(0,9)];
for ($i=0;$i<5;$i++) {
    $pass .= $total[rand(0,69)];
    $a = str_split($pass);
}
shuffle($a);
var_dump(implode("",$a));
file_put_contents("data/$from_id/codeban.txt","$pass");
$send = bot('SendPhoto',[
'chat_id'=>$channel1,
 'photo'=>$tanask,
'caption'=>"$tanmatask
🆔 #$from_id
زمان دریافت بنر⏰:$zaman
Bcode:$pass"
]);
$sgid = $send->result->message_id;
Forward($chat_id,$channel1,$sgid);
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"‌☝پس از رساندن این بنر به 40 بازدید از بخش تحویل بنر، بنر خود و اسم مورد نظر را برای زیبانویسی ارسال کنید. 
درصورت صحیح بودن بنر از طرف مدیریت پیام تایید برای شما ارسال میگردد.🌺",
'reply_to_message_id'=>$message_id+1,
]);
}

//+++++++++
elseif($textmassage == "✥دریافت بنر(متنی)📥✥" and $ersaltomatn != 'on'){
		SendMessage($chat_id,"این بخش غیر فعال میباشد");
		}
		
elseif($textmassage == "✥دریافت بنر(متنی)📥✥" and $ersaltomatn == 'on'){
date_default_timezone_set('Asia/Tehran');
        $date1 = date('Ymd');
        $gettime = file_get_contents("data/$from_id/dates.txt");
    
	file_put_contents("data/$from_id/dates.txt",$date1);
$dt = json_decode(file_get_contents("https://api.mostafa-am.ir/date-time/"));
$date = $dt->date_fa;
$sabtmb = file_get_contents("sabtmb.txt");
$dt = json_decode(file_get_contents("https://api.mostafa-am.ir/date-time/"));
$date = $dt->date_fa;
$sabtmb = file_get_contents("sabtmb.txt");
$lower = range('a','z');
$upper = range('A','Z');
$digit = range(0,9);
$sp = ['!','@','#','$','%','^','&','*'];
$total = array_merge($lower,$upper,$digit,$sp);
$pass = $lower[rand(0,25)] . $upper[rand(0,25)] . $digit[rand(0,9)];
for ($i=0;$i<5;$i++) {
    $pass .= $total[rand(0,69)];
    $a = str_split($pass);
}
shuffle($a);
var_dump(implode("",$a));
file_put_contents("data/$from_id/codeban.txt","$pass");
$send = bot('sendmessage',[       
'chat_id'=>$channel1,
			'text'=>"$sabtmb
🆔 #$from_id
name : $name
 usename : @$username
زمان دریافت بنر⏰:$zaman
Bcode:$pass
",
	]);
$msgid = $send->result->message_id;
Forward($chat_id,$channel1,$msgid);
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"‌☝پس از رساندن این بنر به 40 بازدید از بخش تحویل بنر، بنر خود و اسم مورد نظر را برای زیبانویسی ارسال کنید. 
درصورت صحیح بودن بنر از طرف مدیریت پیام تایید برای شما ارسال میگردد.🌺",
'reply_to_message_id'=>$message_id+1,
]);
}
elseif($textmassage == "✥تحویل بنر📤✥"){
	if($codeban == 'null'){
		SendMessage($chat_id,"شما قبلا بنر خود را تحویل دادید لطفا مجددا بنر بگیرید.");
		}else{
file_put_contents("data/$from_id/ali.txt","sendb");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا بنری که بازدید آن را به 40 رساندید رو فوروارد کنید ✒",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"برگشت ↪"]
],
]
])
]);
}
}
elseif($ali == "sendb" and $textmassage != "برگشت ↪"){
file_put_contents("data/$from_id/ali.txt","sendba");
file_put_contents("data/$from_id/codeban.txt","null");
Forward($ADMIN,$chat_id,$message_id);
Forward($adtik1,$chat_id,$message_id);
Forward($adtik2,$chat_id,$message_id);
Forward($adtik3,$chat_id,$message_id);
Forward($adtik4,$chat_id,$message_id);
bot('sendmessage',[       
'chat_id'=>$chat_id,
			'text'=>"خب بنر دریافت شد ✅ 

⚠ لطفا نام خود را جهت زیبانویسی ارسال کنید
",
      'parse_mode'=>'MarkDown',
	]);
}
elseif($ali == "sendba" and $textmassage != "برگشت ↪"){
file_put_contents("data/$from_id/sendba.txt","$textmassage");
file_put_contents("data/$from_id/id1.txt","$from_id");
file_put_contents("data/$from_id/ali.txt","none");
SendMessage($from_id,"لطفا منتظر تایید ادمین باشید......","markdown","true",null,$message_id);
$sendba = file_get_contents("data/$from_id/sendba.txt");
bot('Sendmessage',[
'chat_id'=>$ADMIN,
'text'=>"
♻ ایدی عددی فرد: $from_id

$textmassage",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تایید پیام ✅",'callback_data'=>"yes|$from_id"],['text'=>"رد پیام 🚫",'callback_data'=>"no|$from_id"]
],
]
])
]);
//++++++++++++++
bot('Sendmessage',[
'chat_id'=>$adtik1,
'text'=>"
♻ ایدی عددی فرد: $from_id

$textmassage",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تایید پیام ✅",'callback_data'=>"yes|$from_id"],['text'=>"رد پیام 🚫",'callback_data'=>"no|$from_id"]
],
]
])
]);
//++---+++-+--
bot('Sendmessage',[
'chat_id'=>$adtik2,
'text'=>"
♻ ایدی عددی فرد: $from_id

$textmassage",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تایید پیام ✅",'callback_data'=>"yes|$from_id"],['text'=>"رد پیام 🚫",'callback_data'=>"no|$from_id"]
],
]
])
]);
bot('Sendmessage',[
'chat_id'=>$adtik3,
'text'=>"
♻ ایدی عددی فرد: $from_id

$textmassage",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تایید پیام ✅",'callback_data'=>"yes|$from_id"],['text'=>"رد پیام 🚫",'callback_data'=>"no|$from_id"]
],
]
])
]);
bot('Sendmessage',[
'chat_id'=>$adtik4,
'text'=>"
♻ ایدی عددی فرد: $from_id

$textmassage",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تایید پیام ✅",'callback_data'=>"yes|$from_id"],['text'=>"رد پیام 🚫",'callback_data'=>"no|$from_id"]
],
]
])
]);
}

elseif(strpos($data,"yes|" ) !== false ) {
$ex = explode("|",$data);
$key = $ex[1];
$pm = file_get_contents("data/$key/sendba.txt");
$id = file_get_contents("data/$key/id1.txt");
bot('Sendmessage',[
'chat_id'=>$id,
'text'=>"بنـــر شما تایـد شد ✅

متن ارسال از طرف ادمین:

 نام شما در 24 ساعت آینده در ڪانال قرار میگیرد.
براے دریافت بنر بر روے دریافت بنر ڪلیڪ ڪن یا  ڪلمهـ /start رو بفرست",
]);
bot('Sendmessage',[
'chat_id'=>$channel,
'text'=>"$pm",
]);
bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "پیام رو فرستادم چنل پیام تبریک رو هم فرستادم واسه کاربر",
                'show_alert' => false
            ]);
        } 
elseif(strpos($data,"no|" ) !== false ) {
$ex = explode("|",$data);
$key = $ex[1];
$id = file_get_contents("data/$key/id1.txt");
bot('Sendmessage',[
'chat_id'=>$id,
'text'=>"درخواست شما تایید نشد!❌!

متن ارسال از طرف ادمین :

بنرت کامل نیست. لطفا قوانین رو مطالعه بکن",
]);
bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "پیام قبول نکردن رو فرستادم",
                'show_alert' => false
            ]);
        } 
elseif($textmassage == "✥پشتیبانی👨‍💻✥"){
file_put_contents("data/$from_id/ali.txt","poshtib");
		bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
سلام $name.
به بخش ارتباط با پشتیبان خوش امدید😄
هر نظر،ایده،درخواست یا مشکلی داریدارسال کنید.
پیام شما مستقیم به پشتیبان ربات ارسال میشود🌹

[ارتباط مستقیم با پشتیبانی](http://t.me/ایدی حساب)
",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت ↪"]
	],
	]
	])
	]);
	}
elseif($ali == "poshtib"){
	SendMessage($chat_id,"پیام شما با موفقیت ب پشتیبان ارسال شد.✅");
	SendMessage($ADMIN,"پیام جدید از کاربران ⁉️ \n برای پاسخ روی پیام ریپلی کنید و پیام خود را ارسال کنید تا به کاربر مورد نظد ارسال شود 👇👇👇👇");
	Forward($ADMIN,$chat_id,$message_id);
	SendMessage($adtik1,"پیام جدید از کاربران ⁉️ \n برای پاسخ روی پیام ریپلی کنید و پیام خود را ارسال کنید تا به کاربر مورد نظد ارسال شود 👇👇👇👇");
	Forward($adtik1,$chat_id,$message_id);
	SendMessage($adtik2,"پیام جدید از کاربران ⁉️ \n برای پاسخ روی پیام ریپلی کنید و پیام خود را ارسال کنید تا به کاربر مورد نظد ارسال شود 👇👇👇👇");
	Forward($adtik2,$chat_id,$message_id);
	SendMessage($adtik3,"پیام جدید از کاربران ⁉️ \n برای پاسخ روی پیام ریپلی کنید و پیام خود را ارسال کنید تا به کاربر مورد نظد ارسال شود 👇👇👇👇");
	Forward($adtik3,$chat_id,$message_id);
	SendMessage($adtik4,"پیام جدید از کاربران ⁉️ \n برای پاسخ روی پیام ریپلی کنید و پیام خود را ارسال کنید تا به کاربر مورد نظد ارسال شود 👇👇👇👇");
	Forward($adtik4,$chat_id,$message_id);
	}
	elseif($replyy != null && $from_id == $ADMIN or $replyy != null && $from_id == $adtik1 or $replyy != null && $from_id == $adtik2 or $replyy != null && $from_id == $adtik3 or $replyy != null && $from_id == $adtik4){
		$pme = $textmassage;
	SendMessage($replyy,"پیام جدید از پشتیبان ربات‼ \n متن پیام ارسالی از پشتیبان👇👇👇
\n\n\n
 `$pme `","MarkDown","true");
 
	SendMessage($chat_id,"پیام با موفقیت به کاربر مورد نظر ارسار شد.✅");
	}
	//+++++++++++++
elseif($textmassage == "✥‼️قوانین✥"){
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>$ghav,
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"برگشت ↪"]
],
]
])
]);
}

elseif($data == "lockch"){
if(strpos($inch , '"status":"left"') == false){
bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"
خوش آمدی ❤
 
این ربات مخصوص کانال فونت ادیت می باشد😎👌

📌 ربات کامل است ....

⏰ ساعت: $zaman
",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"✥دریافت بنر (عکسی)📥✥"],['text'=>"✥دریافت بنر(متنی)📥✥"]
],
[
['text'=>"✥تحویل بنر📤✥"]
],
[
['text'=>"✥پشتیبانی👨‍💻✥"],['text'=>"✥‼️قوانین✥"]
],
]
])
]);
}else{
        bot('answercallbackquery',[
            'callback_query_id' => $update->callback_query->id,
            'text' => "❌ هنوز داخل کانال عضو نیستید",
            'show_alert' =>true
        ]);
}
}
elseif($textmassage == "پیام به کاربر📭" && $from_id == $ADMIN or $textmassage == "/gh" && $from_id == $ADMIN or $textmassage == "پیام به کاربر📭" && $admins == 'yes'){
file_put_contents("data/$from_id/ali.txt","info");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا شناسه کاربر را وارد کنید💉",
]);
}
elseif($ali == "info"){
file_put_contents("data/$from_id/ali.txt","sendpm");
file_put_contents("data/$from_id/info.txt","$textmassage");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را وارد کنید✏",
]);
}
elseif($ali == "sendpm"){
file_put_contents("data/$from_id/ali.txt","none");
file_put_contents("data/$from_id/sendpm.txt","$textmassage");
$sendpm = file_get_contents("data/$from_id/sendpm.txt");
$info = file_get_contents("data/$from_id/info.txt");
bot('Sendmessage',[
'chat_id'=>$info,
'text'=>"📬<code>پیامی از طرف پشتیبانی</code>

$sendpm",
'parse_mode'=>'HTML',
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به کاربر مورد نظر ارسال شد📮",
'parse_mode'=>'HTML',
]);
}
elseif($textmassage == "تنظیم متن بنر ✏" && $from_id == $ADMIN or $textmassage == "تنظیم متن بنر ✏" && $admins == 'yes'){
file_put_contents("jkr.txt","sabtmb");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا متن بنر خود که به زیر عکس میرود رو ارسال کنید 📄",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"پنل"]
],
]
])
]);
}
elseif($jkr == "sabtmb"){
file_put_contents("sabtmb.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📑 متن بنر شما تنظیم شد:
$textmassage
",
]);
}
elseif($textmassage == "تنظیم متن استارت 🚧" && $from_id == $ADMIN or $textmassage == "تنظیم متن استارت 🚧" && $admins == 'yes'){
file_put_contents("jkr.txt","startm");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📍 لطفا متن استارت خود را ارسال کنید
دستورات زیر هم تاثیر گذاره
first_name
username
from_id
دوست عزیز حتما اول آن ها $ بزارید
مثال $first_name ",
]);
}
elseif($jkr == "startm"){
file_put_contents("startm.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن شما تنظیم شد:
$textmassage",
]);
}
//-----------------------------//
elseif($textmassage == "پنل"&& $admins == 'yes'){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("jkr.txt","none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مدیر گرامی به پنل مدیریتی خوش آمدی⬇",
'parse_mode'=>'Markdown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"فروارد همگانی ✈"],['text'=>"✔️پیام همگانی⚛"]
],
[
['text'=>"تنظیم متن بنر ✏"]
],
[
['text'=>"✅روشن کردن ارسال بنر با متن🔛"],['text'=>"⛔️خاموش کردن ارسال بنر با متن❌"]
],
[
['text'=>"✅روشن کردن ارسال بنر با عکس🔛"],['text'=>"⛔️خاموش کردن ارسال بنر با عکس❌"]
],
[
['text'=>"🎈تنظیم عکس بنر🖼"],['text'=>"📦تنظیم گپشن عکس بنر📜"]
],
[
['text'=>"آمار📊"],['text'=>"پیام به کاربر📭"]
],
[
['text'=>"📥تنظیم کانال دریافت بنر📍"],['text'=>"📍تنظیم کانال تایید بنر📌"]
],
[
['text'=>"🔓تنظیم قفل چنل🔐"],['text'=>"✒️تنظیم قوانین📝"]
],
[
['text'=>"✳️انبلاک کردن✅"],['text'=>"🅱بلاک کردن🚫"]
],
[
['text'=>"تنظیم متن استارت 🚧"]
],
]
])
]);
}
//***********---*--***-*
elseif($textmassage == "پنل" && $from_id == $ADMIN){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("jkr.txt","none");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مدیر گرامی به پنل مدیریتی خوش آمدی⬇",
'parse_mode'=>'Markdown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"فروارد همگانی ✈"],['text'=>"✔️پیام همگانی⚛"]
],
[
['text'=>"تنظیم متن بنر ✏"]
],
[
['text'=>"✅روشن کردن ارسال بنر با متن🔛"],['text'=>"⛔️خاموش کردن ارسال بنر با متن❌"]
],
[
['text'=>"✅روشن کردن ارسال بنر با عکس🔛"],['text'=>"⛔️خاموش کردن ارسال بنر با عکس❌"]
],
[
['text'=>"🎈تنظیم عکس بنر🖼"],['text'=>"📦تنظیم گپشن عکس بنر📜"]
],
[
['text'=>"تایین ادمین تیکت اول✅"],['text'=>"تایین ادمین تیکت دوم✅"]
],
[
['text'=>"تایین ادمین تیکت سوم✅"],['text'=>"تایین ادمین تیکت چهارم✅"]
],
[
['text'=>"➖حذف ادمین➖"],['text'=>"➕افزودن ادمین➕"]
],
[
['text'=>"آمار📊"],['text'=>"پیام به کاربر📭"]
],
[
['text'=>"📥تنظیم کانال دریافت بنر📍"],['text'=>"📍تنظیم کانال تایید بنر📌"]
],
[
['text'=>"🔓تنظیم قفل چنل🔐"],['text'=>"✒️تنظیم قوانین📝"]
],
[
['text'=>"✳️انبلاک کردن✅"],['text'=>"🅱بلاک کردن🚫"]
],
[
['text'=>"تنظیم متن استارت 🚧"]
],
]
])
]);
}
elseif ($textmassage == "تایین ادمین تیکت چهارم✅" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "adtik4");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی فرد را ارسال کنید تا ادمین دریافت بنر و پشتیبانی شود",
        ]);
    } elseif ($jkr == 'adtik4') {
    file_put_contents("adtik4.txt", "$textmassage");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب ادمین دریافت بنر و تیکت شد",
            'parse_mode' => "MarkDown",
        ]);
    } 
//++++++++++++++
elseif ($textmassage == "تایین ادمین تیکت سوم✅" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "adtik3");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی فرد را ارسال کنید تا ادمین دریافت بنر و پشتیبانی شود",
        ]);
    } elseif ($jkr == 'adtik3') {
    file_put_contents("adtik3.txt", "$textmassage");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب ادمین دریافت بنر و تیکت شد",
            'parse_mode' => "MarkDown",
        ]);
    } 
//-+-+-+-+-+-+-+
elseif ($textmassage == "تایین ادمین تیکت دوم✅" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "adtik2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی فرد را ارسال کنید تا ادمین دریافت بنر و پشتیبانی شود",
        ]);
    } elseif ($jkr == 'adtik2') {
    file_put_contents("adtik2.txt", "$textmassage");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب ادمین دریافت بنر و تیکت شد",
            'parse_mode' => "MarkDown",
        ]);
    } 
//+++++++++++++++
elseif ($textmassage == "تایین ادمین تیکت اول✅" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "adtik1");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی فرد را ارسال کنید تا ادمین دریافت بنر و پشتیبانی شود",
        ]);
    } elseif ($jkr == 'adtik1') {
    file_put_contents("adtik1.txt", "$textmassage");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب ادمین دریافت بنر و تیکت شد",
            'parse_mode' => "MarkDown",
        ]);
    } 
    //++++++++++++++++
elseif ($textmassage == "➕افزودن ادمین➕" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "adadm");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی فرد را ارسال نمایید تا به لیست ادمین اضافه شود",
        ]);
    } elseif ($jkr == 'adadm') {
    	$admine = $textmassage;
    file_put_contents("data/$admine/admins.txt", "yes");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $admine,
            'text' => "شما توسط مدیر ربات ادمین شدید برای ورود ب پنل مدیریت دستور 'پنل'را ارسال نمایید✅",
        ]);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب ادمین شد",
            'parse_mode' => "MarkDown",
        ]);
    } 
    //-------------------------------
    elseif ($textmassage == "➖حذف ادمین➖" && $from_id == $ADMIN) {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => true
        ]);
        file_put_contents("jkr.txt", "deladm");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی ادمینو ارسال کنید",
        ]);
    } elseif ($jkr == 'deladm') {
    	$deladmine = $textmassage;
    file_put_contents("data/$deladmine/admins.txt", "no");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب از لیست ادمین ها پاک شد.
فرد دیگر دسترسی ندارد",
            'parse_mode' => "MarkDown",
        ]);
    } 
//++++++++++++++++++++++
elseif($textmassage == "✅روشن کردن ارسال بنر با متن🔛" && $from_id == $ADMIN or $textmassage == "✅روشن کردن ارسال بنر با متن🔛" && $admins == 'yes'){
file_put_contents("ersaltomatn.txt","on");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال بنر با متن روشن شد✅",
]);
}
elseif($textmassage == "⛔️خاموش کردن ارسال بنر با متن❌" && $from_id == $ADMIN or $textmassage == "⛔️خاموش کردن ارسال بنر با متن❌" && $admins == 'yes'){
file_put_contents("ersaltomatn.txt","off");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال بنر با متن خاموش شد✅",
]);
}
//++++++++++++
elseif($textmassage == "📦تنظیم گپشن عکس بنر📜" && $from_id == $ADMIN or $textmassage == "📦تنظیم گپشن عکس بنر📜" && $admins == 'yes'){
file_put_contents("jkr.txt","tanmatask");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن کپشنو ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"پنل"]
],
]
])
]);
}
elseif($jkr == "tanmatask"){
file_put_contents("tanmatask.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کپشن تنظیم شد✅
",
]);
}
//++++++++++
elseif($textmassage == "🎈تنظیم عکس بنر🖼" && $from_id == $ADMIN or $textmassage == "🎈تنظیم عکس بنر🖼" && $admins == 'yes'){
file_put_contents("jkr.txt","tanask");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک مستقیم عکسو ارسال کنید",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"پنل"]
],
]
])
]);
}
elseif($jkr == "tanask"){
file_put_contents("tanask.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
عکس بنر تنظیم شد✅
",
]);
}
//==============
elseif($textmassage == "✅روشن کردن ارسال بنر با عکس🔛" && $from_id == $ADMIN or $textmassage == "✅روشن کردن ارسال بنر با عکس🔛" && $admins == 'yes'){
file_put_contents("ersalbyph.txt","on");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال بنر با عکس روشن شد✅",
]);
}
elseif($textmassage == "⛔️خاموش کردن ارسال بنر با عکس❌" && $from_id == $ADMIN or $textmassage == "⛔️خاموش کردن ارسال بنر با عکس❌" && $admins == 'yes'){
file_put_contents("ersalbyph.txt","off");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال بنر با عکس خاموش شد✅.",
]);
}
elseif ($textmassage == "🅱بلاک کردن🚫" && $from_id == $ADMIN or $textmassage == "🅱بلاک کردن🚫" && $admins == 'yes') {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => false
        ]);
        file_put_contents("jkr.txt", "pen");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "طرف کیه؟
ای دی عددیشو بفرس ببینم",
        ]);
    } elseif ($jkr == 'pen') {
    	$baned = $textmassage;
    file_put_contents("data/$baned/pen.txt", "yes");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "ای دی عددی $textmassage به بلک لیست اضافه شد و از ربات مسدود گردید",
            'parse_mode' => "MarkDown",
        ]);
    } elseif ($textmassage == "✳️انبلاک کردن✅" && $from_id == $ADMIN or $textmassage == "✳️انبلاک کردن✅" && $admins == 'yes') {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "بصبر",
            'show_alert' => false
        ]);
        file_put_contents("jkr.txt", "unpen");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "برای انبلاک کردن فرد کافیست ایدی عددی اون را بفرستید",
        ]);
    } elseif ($jkr == 'unpen') {
       $unbaned = $textmassage;
    file_put_contents("data/$unbaned/pen.txt", "no");
        file_put_contents("jkr.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "😐ای دی $textmassage از بلاک لیست در اومد ",
        ]);
    } 
elseif($textmassage == "✒️تنظیم قوانین📝" && $from_id == $ADMIN  or $textmassage == "✒️تنظیم قوانین📝" && $admins == 'yes'){
file_put_contents("jkr.txt","ghav");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
قوانینو چی بزارم؟",
]);
}
elseif($jkr == "ghav"){
file_put_contents("ghav.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
قوانین تنظیم شد.",
]);
}
//++++++++++++
elseif($textmassage == "🔓تنظیم قفل چنل🔐" && $from_id == $ADMIN or $textmassage == "🔓تنظیم قفل چنل🔐" && $admins == 'yes'){
file_put_contents("jkr.txt","chlok");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ای دی عددی کانالو بدون@ بفرست
توجه:ربات حتما باید در کانال ادمین باشد در غیر این صورت قفل کار نمیکند ",
]);
}
elseif($jkr == "chlok"){
file_put_contents("chlok.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کانال شما برای قفل تنظیم شد
@$textmassage",
]);
}
//==========
elseif($textmassage == "📍تنظیم کانال تایید بنر📌" && $from_id == $ADMIN or $textmassage == "📍تنظیم کانال تایید بنر📌" && $admins == 'yes'){
file_put_contents("jkr.txt","taaba");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ای دی عددی کانالو بفرست
توجه:ربات حتما باید در کانال ادمین باشد ",
]);
}
elseif($jkr == "taaba"){
file_put_contents("taaban.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کانال شما تنظیم شد:
$textmassage",
]);
}
//###################

elseif($textmassage == "📥تنظیم کانال دریافت بنر📍" && $from_id == $ADMIN or $textmassage == "📥تنظیم کانال دریافت بنر📍" && $admins == 'yes'){
file_put_contents("jkr.txt","darban");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ای دی عددی کانالو بفرست
توجه : ربات باید حتما در کانال ادمین باشد. ",
]);
}

elseif($jkr == "darban"){
file_put_contents("cheban.txt","$textmassage");
file_put_contents("jkr.txt","no");
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
کانال شما تنظیم شد:
$textmassage",
]);
}
//============
elseif($textmassage == "آمار📊" && $from_id = $ADMIN or $textmassage == "آمار📊" && $admins == 'yes'){
$user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📍 تعداد کاربران تا $zaman به تعداد $member_count میباشد",
]);
}
elseif($textmassage == "✔️پیام همگانی⚛" && $from_id == $ADMIN or $textmassage == "✔️پیام همگانی⚛" && $admins == 'yes'){
    file_put_contents("data/$from_id/ali.txt","phg");
 bot('Sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید📑",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"]
],
]
])
]);
}
elseif($ali == "phg" && $from_id == $ADMIN or $ali == "phg" && $admins == 'yes'){
	$pmtoall = $textmassage;
    file_put_contents("data/$from_id/ali.txt","none");
 $all_member = fopen( "Member.txt", "r");
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
bot('sendmessage',[
    'chat_id'=>$user,
    'text'=>$pmtoall,
  ]);
 
    }
}
elseif($textmassage == "فروارد همگانی ✈" && $from_id == $ADMIN or $textmassage == "فروارد همگانی ✈" && $admins == 'yes'){
    file_put_contents("data/$from_id/ali.txt","fwr");
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی در صف ارسال قرار گرفت.",
  ]);
 bot('Sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید📑",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل"]
],
]
])
]);
}
elseif($ali == "fwr" && $from_id == $ADMIN or $ali == "fwr" && $admins == 'yes'){
    file_put_contents("data/$from_id/ali.txt","none");
bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
 $all_member = fopen( "Member.txt", "r");
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
Forward($user, $chat_id,$message_id);
    }
}
unlink("error_log");
?>
