<?php
$admin = 2110818173;
$API_KEY = "ADD_TOKEN_HERE";
ob_start();
define('API_KEY', $API_KEY);
echo file_get_contents("https://api.telegram.org/bot$API_KEY/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME'] . "");

function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$newchat_id = $message->new_chat_member->id;
$leftchat_id = $message->left_chat_member->id;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$user = '@' . $message->from->username;
$name = $message->from->first_name; // Corrected variable name
$username = $message->from->username;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$ex = explode(' ', $text);
//*****Joined Channel request*****//
$join = bot('getChatMember', ["chat_id" => "@cheggnx", "user_id" => $from_id])->result->status;
$join2 = bot('getChatMember', ["chat_id" => "@CheggbyTnTbot", "user_id" => $from_id])->result->status;
if (($newchat_id != '' or $leftchat_id != '') || ($message && ($join == 'left' or $join == 'kicked' or $join2 == 'left' or $join2 == 'kicked'))) {
    // Delete the message
    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message->message_id
    ]);

    // Send a welcome message with channel subscription links
    bot('sendMessage', [
        'chat_id' => $from_id,
        'text' => "Welcome $name 🔓 🔰 | You must subscribe to the channels to use the bot for free.",
        'reply_to_message_id' => $message->chat_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => '• Join Channel 1 - ', 'url' => 'https://t.me/cheggnx']],
                [['text' => '• Join Channel 2 - ', 'url' => 'https://t.me/CheggbyTnTbot']]
            ]
        ])
    ]);

    // Terminate the script
    die('A_god');
}
//*****Start Command*****//
if ($text == '/start') {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "📚 Welcome $fn to Scribd Downloader bot! 📖\n\nPlease send the link of the document you want to download.",
        'reply_to_message_id' => $message->message_id,
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ["text" => "Developer 💚", "url" => 'https://t.me/spacenx1']
                ],
                [
                    ["text" => "How to Use 📘", "url" => 'https://t.me/cheggnx/58']
                ],
                [
                    ["text" => "Support 🛠️", "url" => 'https://t.me/spacenx1']
                ]
            ]
        ])
    ]);
}



//*****scribd.com Viewer*****//
if (preg_match('/scribd.com/', $text)) {
    $link2 = explode(' ', strstr($text, 'scribd.com'))[0];
    preg_match_all('!\d+!', $link2, $matches11);
    $aa121 = $matches11;
    $aliao = "http%3A%2F%2Fwww.scribd.com%2Fdocument_downloads%2F" . $aa121[0][0] . "%3Fextension%3Dpdf%26amp%3Bfrom%3Dembed%26amp%3Bsource%3Dembed";
    file_get_contents("https://api.telegram.org/bot$API_KEY/sendDocument?chat_id=$chat_id&document=$aliao&caption=Made With ❤ By @spacenx1&reply_to_message_id={$message->message_id}&reply_markup=%7B%22inline_keyboard%22%3A%5B%5B%7B%22text%22%3A%22%20%5Cud83d%5Cudcda%20The%20Developer%20%5Cu2022%22%2C%22url%22%3A%22t.me%5C%2Fspacenx1%22%7D%5D%5D%7D");
    $scrii = "https://www.scribd.com/embeds/" . $aa121[0][0] . "/content";
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "📚 Welcome $nrame to Scribd Downloader bot\n👁‍🗨: $user\nYour Document ✅: <a href='$scrii'>Click Here</a>\n\nMade With ❤ By @spacenx1\n\nHello $user! 👋\n\nThank you for your support. Please follow us on Instagram to stay updated: https://www.instagram.com/mustaqeem_abad/.",
        'reply_to_message_id' => $message->message_id,
        'disable_web_page_preview' => true,
        'parse_mode' => "HTML",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ["text" => "Download Document ✅", "url" => "$scrii"]
                ]
            ]
        ])
    ]);
    bot('sendMessage', [
        'chat_id' => -1001636291714,
        'text' => "User Name: $user\n\nLink: $text"
    ]);
}
