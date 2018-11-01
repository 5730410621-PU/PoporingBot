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
                        "type" => "message",
                        "text" => "Horo"
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
                        "type" => "message",
                        "text" => "Poll"
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
                        "type" => "message",
                        "text" => "Quiz"
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
                        "type" => "message",
                        "text" => "News"
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
                        "type" => "message",
                        "text" => "Vr/Ar"
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
                        "text" => "Thank you for report please send me what you want: \n1. Text form\n2. Image\n3. Video\nWhen you finish please end with text #confirm ."
                    ]
                  ]
            ]
        ];
        return $richMenu;
    }

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

    function pushMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/push";
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

    function uploadImage($arrayHeader,$richMenuId){
        $strUrl = "https://api.line.me/v2/bot/richmenu/$richMenuId/content";
        $data = array('file' => '/appinline_design.jpeg');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
        return $result;
    }

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

    function getRichMenu($header){
        $strUrl = "https://api.line.me/v2/bot/richmenu/list";
        $ch = curl_init($strUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
    
        $result = json_decode(curl_exec($ch),true);
        $richId = $result['richmenus'][0]['richMenuId'];
        return $richId;
        curl_close ($ch);
        
    }
