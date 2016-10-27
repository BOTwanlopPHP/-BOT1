<?php
$access_token = 'MheeIpqJUmhyvXW91x/oygbvPBHtBChGseqGlYYcF5Z43ndEYW8QqfaDYGfY2wVPxTN3CQHv1Rf+lVvJ71FlK9kWOnvJ+xgjkyo5R9DdH0K2mnF/rTtiNLk3vniRE62CiGay5kofMlzpqY0oRAfMMgdB04t89/1O/w1cDnyilFU=';

<?php
namespace frontend\controllers;

use Yii;
use yii\web\Response;

class LineController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($action->id == 'callback') {
            $this->enableCsrfValidation = false; //ปิดการใช้งาน csrf
        }
    
        return parent::beforeAction($action);
    }
    

    public function actionCallback()
    {
        
        $json_string = file_get_contents('php://input');
        $jsonObj = json_decode($json_string); //รับ JSON มา decode เป็น StdObj
        $to = $jsonObj->{"result"}[0]->{"content"}->{"from"}; //หาผู้ส่ง
        $text = $jsonObj->{"result"}[0]->{"content"}->{"text"}; //หาข้อความที่โพสมา
        
        $text_ex = explode(':', $text); //เอาข้อความมาแยก : ได้เป็น Array
        
        if($text_ex[0] == "อยากรู้"){ //ถ้าข้อความคือ "อยากรู้" ให้ทำการดึงข้อมูลจาก Wikipedia หาจากไทยก่อน
            //https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=PHP
            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch1, CURLOPT_URL, 'https://th.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$text_ex[1]);
            $result1 = curl_exec($ch1);
            curl_close($ch1);
            
            $obj = json_decode($result1, true);
            
            foreach($obj['query']['pages'] as $key => $val){

                $result_text = $val['extract'];
            }
            
            if(empty($result_text)){//ถ้าไม่พบให้หาจาก en
                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch1, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$text_ex[1]);
                $result1 = curl_exec($ch1);
                curl_close($ch1);
                
                $obj = json_decode($result1, true);
                
                foreach($obj['query']['pages'] as $key => $val){
                
                    $result_text = $val['extract'];
                }
            }
            if(empty($result_text)){//หาจาก en ไม่พบก็บอกว่า ไม่พบข้อมูล ตอบกลับไป
                $result_text = 'ไม่พบข้อมูล';
            }
            $response_format_text = ['contentType'=>1,"toType"=>1,"text"=>$result_text];
            
        }else if($text_ex[0] == "อากาศ"){//ถ้าพิมพ์มาว่า อากาศ ก็ให้ไปดึง API จาก wunderground มา
            //http://api.wunderground.com/api/yourkey/forecast/lang:TH/q/Thailand/%E0%B8%81%E0%B8%A3%E0%B8%B8%E0%B8%87%E0%B9%80%E0%B8%97%E0%B8%9E%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3.json
            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch1, CURLOPT_URL, 'http://api.wunderground.com/api/yourkey/forecast/lang:TH/q/Thailand/'.str_replace(' ', '%20', $text_ex[1]).'.json');
            $result1 = curl_exec($ch1);
            curl_close($ch1);
            
            $obj = json_decode($result1, true);
            if(isset($obj['forecast']['txt_forecast']['forecastday'][0]['fcttext_metric'])){
                $result_text = $obj['forecast']['txt_forecast']['forecastday'][0]['fcttext_metric'];
            }else{//ถ้าไม่เจอกับตอบกลับว่าไม่พบข้อมูล
                $result_text = 'ไม่พบข้อมูล';
            }
            
            $response_format_text = ['contentType'=>1,"toType"=>1,"text"=>$result_text];
        }else if($text == 'บอกมา'){//คำอื่นๆ ที่ต้องการให้ Bot ตอบกลับเมื่อโพสคำนี้มา เช่นโพสว่า บอกมา ให้ตอบว่า ความลับนะ
            $response_format_text = ['contentType'=>1,"toType"=>1,"text"=>"ความลับนะ"];
        }else{//นอกนั้นให้โพส สวัสดี
            $response_format_text = ['contentType'=>1,"toType"=>1,"text"=>"สวัสดี"];
        }

        // toChannel?eventType
        $post_data = ["to"=>[$to],"toChannel"=>"1383378250","eventType"=>"138311608800106203","content"=>$response_format_text]; //ส่งข้อมูลไป
        
        $ch = curl_init("https://trialbot-api.line.me/v1/events");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charser=UTF-8',
            'X-Line-ChannelID: YOUR ChannelID',
            'X-Line-ChannelSecret: YOUR ChannelSecret',
            'X-Line-Trusted-User-With-ACL: YOUR MID'
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        
    }
}
?>

