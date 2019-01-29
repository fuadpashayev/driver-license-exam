<?php

namespace App\Http\Controllers\API;


use App\Question;
use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function answer(Request $request){
        $session_id = $request['session_id'];
        $user_id =  $request['user_id'];
        $device_id = $request['device_id'];
        $answers = json_decode($request['answers'],1);
        $question_list = $request['question_list'];
        $return = [];
        foreach ($answers as $question_id => $answer){
            $check = Session::where(["question_id"=>$question_id,"session_id"=>$session_id]);
            if($user_id)
                $check = $check->where("user_id",$user_id);
            else
                $check = $check->where("device_id",$device_id);
            $check = $check->get()->count();
            if($check==0) {
                $question = Question::find($question_id);
                //dd($question_id);
                $real_answer = $question->answer;
                $session = new Session;
                $session->session_id = $session_id;
                $session->question_id = $question_id;
                $session->user_id = $user_id;
                $session->device_id = $device_id;
                $session->answer = $answer;
                $session->real_answer = $real_answer;
                $session->question_list = $question_list;
                $session->save();
                $return[$question_id] = $answer == $real_answer;
                $status = 'success';
                $message = 'Answers are sended to database successfully';
            }else{
                $status = 'error';
                $message = 'These answers exist on database';
            }
        }

        return response()->json(['status'=>$status,'message'=>$message,'results'=>$return],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function statistics(Request $request){
        $user_id = $request->user_id;
        $device_id = $request->device_id;
        $return = [];
        if($user_id)
            $sessions = Session::where("user_id",$user_id);
        else
            $sessions = Session::where("device_id",$device_id);

        $sessions = $sessions->groupBy("session_id")->get();
        foreach ($sessions as $session){
            $results = Session::where("session_id",$session["session_id"])->get();
            $returnSession = [];
            foreach ($results as $result){
                $returnSession[] = ["question_id"=>$result["question_id"],"session_id"=>$result["session_id"],"answer"=>$result["answer"],"correct_answer"=>$result["real_answer"],"time"=>$result["created_at"],"timestamp"=>$this->asDateTime($result["created_at"])];
            }
            $return[$session["session_id"]] = $returnSession;
        }
        if(count($return))
            $status = 'successful';
        else
            $status = 'error';
        return response()->json(['status'=>$status,'results'=>$return],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function session_statistics(Request $request){
        $user_id = $request->user_id;
        $device_id = $request->device_id;
        $session_id = $request->session_id;
        $return = [];
        $sessions = Session::where("session_id",$session_id);
        if($user_id)
            $sessions->where("user_id",$user_id);
        else
            $sessions->where("device_id",$device_id);
        $sessions = $sessions->get();
        $answers = [];
        foreach ($sessions as $session){
            $question_id = $session["question_id"];
            $answers[$question_id] = $session["answer"];
        }
        if(isset($sessions[0])) {
            $question_list = json_decode($sessions[0]['question_list'], 1);
            foreach ($question_list as $parent_question) {

                $question = Question::find($parent_question);
                $question->image_url = site_url().$question->image_url;
                $question->audio_url = site_url().$question->audio_url;
                $fetch_sub_questions = Question::where("parent_id", $question->id)->get();
                $sub_questions = [];
                foreach ($fetch_sub_questions as $fetch_sub_question) {
                    @$answer = $answers[$fetch_sub_question->id];
                    $fetch_sub_question->user_answer = $answer;
                    $fetch_sub_question->audio_url = site_url().$fetch_sub_question->audio_url;
                    $sub_questions[] = $fetch_sub_question;
                }
                $question->sub_questions = $sub_questions;
                $return[] = $question;

            }
        }else{
            $return = [];
        }

        if(count($return))
            $status = 'successful';
        else
            $status = 'error';
        return response()->json(['status'=>$status,'results'=>$return],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function test(){
        $text = '
        






<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    
        
        
        
        
            
        
    
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Security-Policy" content="script-src \'self\' https://www.google.com/recaptcha/api.js https://www.gstatic.com/ http://www.google-analytics.com/ \'unsafe-inline\'; object-src \'self\'">
        <title></title>
        <script type="text/javascript" src="js/js1.js"></script>
        <script type="text/javascript" src="js/jtabber.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="stylesheet" href="css/ctabber.css" TYPE="text/css" MEDIA="screen">
        <link rel="stylesheet" href="css/nexcss.css" type="text/css" />

    </head>
    <body>
        <div id="popup1" class="popup_block" style="">
            <a href="#" class="close" onclick="CloseWindow()"><img src="images/close_pop.png" class="btn_close" title="Pəncərəni bağla" alt="Close"></a>
            <table>
                <tr>
                    <td valign="middle" id="imgid"></td>
                    <td valign="middle" id="msgid"></td>
                </tr>
            </table>
            <input type="button" value="Bağla" style="margin-left:220px; margin-top:5px; width:90px; height:25px;" onclick="CloseWindow()"/>
        </div>

        <div id="fade" style="display: block;"></div>



        <table id="maintable" border="0" width="435" align="center">
            <tbody>
                <tr>
                    <td align="right">
                        <table border="0"><tr>
                                <td><a class=\'testa\' onclick=\'document.getElementById("chg_psw").submit()\'> Şifrəni dəyiş</a><form action=\'Dispatcher\' method=\'post\' name=\'chg_psw\' id=\'chg_psw\'><input type="hidden" name="csrfPreventionFilter" id="csrfPreventionFilter" value="null"><input type="hidden" name="next.page" id="next.page" value="index.jsp?ajx=0&PagInd=4&lang=null"></form></td><td>&nbsp;<a class=\'testa\' onclick=\'document.getElementById("logout").submit()\'> Çıxış</a><form action=\'Dispatcher\' method=\'post\' name=\'logout\' id=\'logout\'><input type="hidden" name="csrfPreventionFilter" id="csrfPreventionFilter" value="null"><input type="hidden" name="next.page" id="next.page" value="index.jsp"><input type=\'hidden\' name=\'islogout\' id=\'islogout\' value=\'1\'></form></td></td>
                            </tr></table>
                    </td>

                </tr>
                <tr>
                    <td align="center" width="400">
                        
                        




                





<script type="text/javascript">
    function Ode()
    {
        window.open(\'./Payment?type=payAP&\' + GetFormRequest(\'frmNtq\'), \'_blank\');
//		window.open(\'https://payment.gpp.az/WEBAPUS/REngineForUC?\' + GetFormRequest(\'frmNtq\'),\'_blank\');
//		window.open(\'https://www.apus.az/WEBAPUS/Dispatcher?\' + GetFormRequest(\'frmNtq\'),\'blank\');


    }

    function singleProtocolPayment(protocol) {
        //window.open(\'./Payment?type=paySP&\' + GetFormRequest(\'frmNtq\') + \'&protocol=\' + protocol, \'_blank\');
       window.open(\'https://asanpay.az/payments/penalty/2001730\', \'_blank\');
    }
</script>










<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">


<table id=\'newspaper-b\'>
<thead>
<tr>
<td scope=\'col\' colspan=\'8\' align=\'center\' style=\'color:#364A63; font-size:12px; font-weight:bold\'> Hal hazırda qüvvədə olan cərimə balları</td>
</tr>
<tr>
<td scope=\'col\' align=\'center\'>Soyadı</td>
<td scope=\'col\' align=\'center\'>Adı</td>
<td scope=\'col\' align=\'center\'>Ata adı</td>
<td scope=\'col\' align=\'center\'>Avtomobil №</td>
<td scope=\'col\' align=\'center\'> Protokol</td>
<td scope=\'col\' align=\'center\'>Bal</td>
<td scope=\'col\' align=\'center\'>Qərarın tarixi</td>
<td scope=\'col\' align=\'center\'>Bitmə tarixi</td>
</tr>
</thead><tbody>
<tr>
<td align=\'left\'>NƏCƏFOV</td>
<td align=\'left\'>MURAD</td>
<td align=\'left\'>ƏNVƏR</td>
<td align = \'center\'>90NZ477</td>
<td align = \'center\'>MMX6859280</td>
<td align = \'center\'>3</td>
<td align=\'center\'>12.05.2018</td>
<td align=\'center\'>22.05.2019</td>
</tr>
<tr>
<td align=\'left\'>NƏCƏFOV</td>
<td align=\'left\'>MURAD</td>
<td align=\'left\'>ƏNVƏR</td>
<td align = \'center\'>90NZ477</td>
<td align = \'center\'>MMX6859280</td>
<td align = \'center\'>4</td>
<td align=\'center\'>12.05.2018</td>
<td align=\'center\'>22.05.2019</td>
</tr>
<tr>
<td colspan=\'5\' align=\'right\'><b>Cəmi:  </b></td>
<td align=\'center\'><b>3</b></td>
<td></td>
<td></td>
</tr>
</tbody></table>

<div class="info">Hal hazırda Sizin ödənilməmiş cəriməniz yoxdur.</div>

<script>
//    var urll = (window.location !== window.parent.location)
//            ? document.referrer
//            : document.location;
//
//console.log(urll);
//    if (urll !== \'http://mia.gov.az/?/az/driverlicense/\'
//            && urll !== \'http://mia.gov.az/?/en/driverlicense/\'
//            && urll !== \'http://mia.gov.az/?/ru/driverlicense/\'
//            && urll !== \'http://85.132.44.29/nex/\'
//            && urll !== \'http://85.132.44.29/nex/?lang=az\'
//            && urll !== \'http://85.132.44.29/nex/?lang=ru\'
//            && urll !== \'http://85.132.44.29/nex/?lang=en\'
//            && urll !== \'http://85.132.44.29/nex/Dispatcher\') {
//        var tbl = document.getElementById("maintable");
//        if (tbl)
//            tbl.parentNode.removeChild(tbl);
//            window.top.location.replace(window.self.location.href + "/inc/error.jsp");
//    }
</script>
<form name="ViewForm" id="frmNtq" action="#" method="Post">
    <input type="hidden" name="psn" value="AE523794">
    <input type="hidden" name="bd" value="1998-06-24">
    <input type="hidden" name="vd" value="2027-07-28">
    <!--<input type="hidden" name="controllerName" value="WALogon">
    <input type="hidden" name="viewName" value="WALogonPage">
    <input type="hidden" name="commandName" value="LogonPage.GoToPaymentByAccNrPage">
    <input type="hidden" name="oldCommandName" value="defaultAction">
    <input type="hidden" name="definitionName" value="undeclared">
    <input type="hidden" name="listProxyName" value="Empty">
    <input type="hidden" name="elementName" value="Login/Content/MainContent/Login Information">
    <input type="hidden" name="sortDirection" value="">
    <input type="hidden" name="pageChange" value="">
    <input type="hidden" name="pageSize" value="">
    <input type="hidden" name="stateName" value="">
    <input type="hidden" name="state" value="">
    <input type="hidden" name="formCommand" value="">
    <input type="hidden" name="selectedItem" value="">
    <input type="hidden" name="filterFieldNameLow" value="">
    <input type="hidden" name="filterFieldNameHigh" value="">
    <input type="hidden" name="filterFieldCompare" value="">
    <input type="hidden" name="pageId" value="0">
    <input type="hidden" name="LoginId" value="">
    <input type="hidden" name="Password" value="">
    <input type="hidden" name="firstEntrance" value="yes">
    <input type="hidden" name="Language" value="az_AZ">-->
</form>


                    </td>
                </tr>
            </tbody>
        </table>

        <script type="text/javascript">

//            var urll = (window.location !== window.parent.location)
//                    ? document.referrer
//                    : document.location;
//
//
//            if (urll !== \'http://mia.gov.az/?/az/driverlicense/\' 
//                    && urll !== \'http://mia.gov.az/?/en/driverlicense/\' 
//                    && urll !== \'http://mia.gov.az/?/ru/driverlicense/\' 
//                    && urll !== \'http://85.132.44.29/nex/\' 
//                    && urll !== \'http://85.132.44.29/nex/?lang=az\' 
//                    && urll !== \'http://85.132.44.29/nex/?lang=ru\' 
//                    && urll !== \'http://85.132.44.29/nex/?lang=en\' 
//                    && urll !== \'http://85.132.44.29/nex/Dispatcher\') {
//                var tbl = document.getElementById("maintable");
//                if (tbl)
//                    tbl.parentNode.removeChild(tbl);
//                //    window.top.location.replace(window.self.location.href + "/inc/error.jsp");
//            }

            var _gaq = _gaq || [];
            _gaq.push([\'_setAccount\', \'UA-23481920-6\']);
            _gaq.push([\'_trackPageview\']);

            (function () {
                var ga = document.createElement(\'script\');
                ga.type = \'text/javascript\';
                ga.async = true;
                ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
                var s = document.getElementsByTagName(\'script\')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>

    </body>
</html>
        ';
        return $text;
    }

    protected function asDateTime($value)
    {
        return Carbon::parse($value)->timestamp;
    }


}
