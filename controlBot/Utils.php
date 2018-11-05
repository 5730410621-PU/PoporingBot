<?php


    function newRichMenu(){
        $richMenu = [
            'size' => [ 'width' => 2500,'height' => 1686 ],
            "selected" => false,
            "name" => "RichMenus",
            "chatBarText" => "เมนู",
            "areas" => [
                [
                      "bounds" => [
                        "x" => 0,
                        "y" => 0,
                        "width" => 833,
                        "height" => 843
                  ],
                      "action" => [
                        "type" => "postback",
                        "label" => "Horo",
                        "data" => "action=Horo",
                        "text" => ""
                  ]
                ],
                [
                    "bounds" => [
                        "x" => 833,
                        "y" => 0,
                        "width" => 833,
                        "height" => 843
                    ],
                    "action" => [
                        "type" => "postback",
                        "label" => "Poll",
                        "data" => "action=Poll",
                        "text" => ""
                    ]
                ],
                [
                    "bounds" => [
                        "x" => 1666,
                        "y" => 0,
                        "width" => 833,
                        "height" => 843
                    ],
                    "action" => [
                        "type" => "postback",
                        "label" => "Quiz",
                        "data" => "action=Quiz",
                        "text" => ""
                    ]
                  ],
                [
                    "bounds" => [
                        "x" => 0,
                        "y" => 843,
                        "width" => 833,
                        "height" => 843
                    ],
                    "action" => [
                        "type" => "postback",
                        "label" => "News",
                        "data" => "action=News",
                        "text" => ""
                    ]
                  ],
                [
                    "bounds" => [
                        "x" => 833,
                        "y" => 843,
                        "width" => 833,
                        "height" => 843
                    ],
                    "action" => [
                        "type" => "postback",
                        "label" => "Ar/Vr",
                        "data" => "action=Ar/Vr",
                        "text" => ""
                    ]
                  ],
                [
                    "bounds" => [
                        "x" => 1666,
                        "y" => 843,
                        "width" => 833,
                        "height" => 843
                    ],
                    "action" => [    
                        "type" => "postback",
                        "label" => "Report",
                        "data" => "action=Report",
                        "text" => ""
                    ]
                  ]
            ]
        ];
        return $richMenu;
    }

    function replyMsg($header,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $jsonPostData = json_encode($arrayPostData);
        $ch = "curl -v -X POST ".$strUrl." -H '"."$header[1]'"." -H '"."$header[0]'"." -d '"."$jsonPostData'";
        exec($ch,$result,$error);
        return $result;
    }

    function getRichMenu($targetHeader){
        $strUrl = "https://api.line.me/v2/bot/richmenu/list";
        $ch = "curl -v -X GET ".$strUrl." -H '"."$targetHeader'";
        exec($ch,$output,$error);
        $result = json_decode($output,true);
        $richId = $result['richmenus'][0]['richMenuId'];
        return $ch;
    }

    function createRichMenu($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/richmenu";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
        return $result;
        //return json_decode($result,true)['richMenuId'];
        
    }

    /*
    function uploadImage($arrayHeader,$richMenuId){
        $strUrl = "https://api.line.me/v2/bot/richmenu/$richMenuId/content";
        $im = 'appinline_design.jpg';
        $ch = "curl -v -X POST ".$strUrl." -H ".$arrayHeader[1]." -T ".$im;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_UPLOAD, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = exec($ch);
        //curl_close ($ch);
        return $result;
    }
    */

    function setRichMenu($arrayHeader,$richMenuId){
        $strUrl = "https://api.line.me/v2/bot/user/all/richmenu/".$richMenuId;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, " ");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
        return $result;
    }

    function getImage($header,$imgId){      
        $strUrl = "https://api.line.me/v2/bot/message/$imgId/content";
        $ch = "curl -v -X "." GET ".$strUrl." -o ".$imgId.".png "." -H '"."$header'";
        exec($ch,$output,$result);
         
        return "Result :: ".__DIR__." \nCh:: ".$ch;
    }

    function getVideo($header,$imgId){
  
        $accessToken = 'o7QzwyoiRRAbnd0Ylquyd9BgFSP88lcRdo3Oy9HBBEP1Wq2C5oTKiiLC8LkCo2wNVYSLUvqxsmuY5RBVn3xjyFxm913dEQW6xPI1j6lvABZiV21xlLx8ifPyMrma2VJYu37dzVa/Xyp5oIysTAJ6wwdB04t89/1O/w1cDnyilFU=';
        $imgId = "8813850836867";
        $jsonHeader = "Content-Type: application/json";
        $accessHeader = "Authorization: Bearer {$accessToken}";
    
        $strUrl = "https://api.line.me/v2/bot/message/$imgId/content";
        $ch = "curl -v -X "." GET ".$strUrl." -o ".$imgId.".png "." -H '"."$accessHeader'";
        exec($ch,$output,$result);
         
        return "Result :: ".__DIR__." \nCh:: ".$ch;
    }