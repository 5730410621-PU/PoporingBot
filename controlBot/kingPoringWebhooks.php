<?php 

include 'Utils.php';


$accessToken = 'iPHyE1iIqXZ3m8VYoiub0THET0YXBOqrfESdsdNiOxQsOaCnfVU4k+1g0iwjo7xd0HVv5o2Kr9QVLc8eO68KEsuaWSs4qR5ahWVBOQgV1FyXz6YeYrYG4cGMmm+ooy1oUV1e5UUlxsMgHphoY/V58AdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$jsonHeader = "Content-Type: application/json";
$accessHeader = "Authorization: Bearer {$accessToken}";

$arrayHeader = array();
$arrayHeader[] = $jsonHeader;
$arrayHeader[] = $accessHeader;

$message = $arrayJson['events'][0]['message']['text'];
$type = $arrayJson['events'][0]['type'];
$typeMessage = $arrayJson['events'][0]['message']['type'];
$id = $arrayJson['events'][0]['source']['userId'];
$replyToken = $arrayJson['events'][0]['replyToken'];

$richMenu = newRichMenu();

$arrayPostData['replyToken'] = $replyToken;
$arrayPostData['messages'][0]['type'] = "text";
$arrayPostData['messages'][0]['text'] = "This Bot can reply";
replyMsg($arrayHeader,$arrayPostData);

function replyMsg($arrayHeader,$arrayPostData){
	$strUrl = "https://api.line.me/v2/bot/message/reply";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$strUrl);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
	curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	curl_close ($ch);
}

////////////////// Get Rich Menu ////////////////////////

if($message == "showRichMenu"){

	$RichMenuId = getRichMenu($arrayHeader);
	$arrayPostData['replyToken'] = $replyToken;
	$arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = "RichId :".$RichMenuId;
	ReplyMsg($arrayHeader,$arrayPostData);
}


///////////// Create Rich Menu ////////////////////////

else if($message == "createRichMenu"){
	
	$newRichMenu = null;
	$newRichMenu = json_decode(createRichMenu($arrayHeader,$richMenu),true);

	if($newRichMenu != null){
		$arrayPostData['replyToken'] = $replyToken;
		$arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "Success!! RichMenuId: ".$newRichMenu['richMenuId'];
		ReplyMsg($arrayHeader,$arrayPostData);
	} 
	else{
		$arrayPostData['replyToken'] = $replyToken;
		$arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "Fail to create";
		ReplyMsg($arrayHeader,$arrayPostData);
	}
}

//////////////// Upload Rich Menu Image ///////////////////

else if($message == "uploadImage"){
	
	$richId = getRichMenu($arrayHeader);
	$uploaded = uploadImage($imageArrayHeader,$richId);

	if($uploaded != null){
		$arrayPostData['replyToken'] = $replyToken;
		$arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = $uploaded;
		ReplyMsg($arrayHeader,$arrayPostData);
	} 
	else{
		$arrayPostData['replyToken'] = $replyToken;
		$arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "Fail to upload";
		ReplyMsg($arrayHeader,$arrayPostData);
	}
}



/////////////////////Set Rich Menu /////////////////////////////

else if($message == "setRichMenu"){

	$richMenuId = getRichMenu($arrayHeader);
	$setRichMenu = setRichMenu($arrayHeader,$richMenuId);

	$arrayPostData['replyToken'] = $replyToken;
	$arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = "Set Complete ::".$setRichMenu;
	ReplyMsg($arrayHeader,$arrayPostData);
}

/////////////////// Rich Reply Menu ///////////////////////

if($message == "News"){
	$image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
	$arrayPostData['replyToken'] = $replyToken;
	$arrayPostData['messages'][0]['type'] = "image";
	$arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
	$arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
	replyMsg($arrayHeader,$arrayPostData);
}


echo "OK";