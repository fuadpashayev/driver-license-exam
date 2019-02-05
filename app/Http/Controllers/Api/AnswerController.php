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
        

<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Security-Policy" content="script-src \'self\' https://www.google.com/recaptcha/api.js https://www.gstatic.com/ http://www.google-analytics.com/ \'unsafe-inline\'; object-src \'self\'">
        <title></title>
        <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script type="text/javascript" src="js/js1.js"></script>
        <script type="text/javascript" src="js/jtabber.js"></script>
        <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
        <link rel="stylesheet" href="css/ctabber.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/nexcss.css" type="text/css">

    </head>
    <body>
        <div id="popup1" class="popup_block" style="display: block; width: 300px;  margin-top: -179px; margin-left: -190px; ">
            <a href="#" class="close" onclick="CloseWindow()"><img src="images/close_pop.png" class="btn_close" title="Pəncərəni bağla" alt="Close"></a>
            <table>
                <tbody><tr>
                    <td valign="middle" id="imgid"></td>
                    <td valign="middle" id="msgid"></td>
                </tr>
            </tbody></table>
            <input type="button" value="Bağla" style="margin-left:220px; margin-top:5px; width:90px; height:25px;" onclick="CloseWindow()">
        </div>

        <div id="fade" style="display: block;"></div>



        <table id="maintable" border="0" width="435" align="center">
            <tbody>
                <tr>
                    <td align="right">
                        <table border="0"><tbody><tr>
                                <td><a class="testa" onclick="document.getElementById(&quot;chg_psw&quot;).submit()"> Şifrəni dəyiş</a><form action="Dispatcher" method="post" name="chg_psw" id="chg_psw"><input type="hidden" name="csrfPreventionFilter" id="csrfPreventionFilter" value="null"><input type="hidden" name="next.page" id="next.page" value="index.jsp?ajx=0&amp;PagInd=4&amp;lang=null"></form></td><td>&nbsp;<a class="testa" onclick="document.getElementById(&quot;logout&quot;).submit()"> Çıxış</a><form action="Dispatcher" method="post" name="logout" id="logout"><input type="hidden" name="csrfPreventionFilter" id="csrfPreventionFilter" value="null"><input type="hidden" name="next.page" id="next.page" value="index.jsp"><input type="hidden" name="islogout" id="islogout" value="1"></form></td>
                            </tr></tbody></table>
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













<table id="newspaper-b">
<thead>
<tr>
<td scope="col" colspan="8" align="center" style="color:#364A63; font-size:12px; font-weight:bold"> Hal hazırda qüvvədə olan cərimə balları</td>
</tr>
<tr>
<td scope="col" align="center">Soyadı</td>
<td scope="col" align="center">Adı</td>
<td scope="col" align="center">Ata adı</td>
<td scope="col" align="center">Avtomobil №</td>
<td scope="col" align="center"> Protokol</td>
<td scope="col" align="center">Bal</td>
<td scope="col" align="center">Qərarın tarixi</td>
<td scope="col" align="center">Bitmə tarixi</td>
</tr>
</thead><tbody>
<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">90UM067</td>
<td align="center">IXP2192241</td>
<td align="center">3</td>
<td align="center">13.11.2018</td>
<td align="center">23.11.2019</td>
</tr>
<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">90KK175</td>
<td align="center">IXP1990463</td>
<td align="center">3</td>
<td align="center">20.08.2018</td>
<td align="center">30.08.2019</td>
</tr>
<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">90KK175</td>
<td align="center">IXP1916078</td>
<td align="center">3</td>
<td align="center">20.07.2018</td>
<td align="center">30.07.2019</td>
</tr>
<tr>
<td colspan="5" align="right"><b>Cəmi:  </b></td>
<td align="center"><b>9</b></td>
<td></td>
<td></td>
</tr>
</tbody></table><br><br><table id="newspaper-b" width="100%">
<thead>
<tr>
<td scope="col" colspan="7" align="center" style="color:#364A63; font-size:12px; font-weight:bold">  Hal hazırda ödənilməmiş cərimələr</td>
</tr>
<tr>
<td scope="col" style="width:18%" align="center"> Soyadı</td>
<td scope="col" style="width:18%" align="center"> Adı</td>
<td scope="col" style="width:18%" align="center"> Ata adı</td>
<td scope="col" style="width:16%" align="center"> Protokol</td>
<td scope="col" style="width:10%" align="center"> Cərimə məbləği</td>
<td scope="col" style="width:10%" align="center"> Qərarın tarixi</td>
<td scope="col" style="width:10%" align="center"></td>
</tr>
</thead><tbody>
<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256294</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256295</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256296</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256297</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256298</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256299</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256300</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256301</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256302</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256303</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256304</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256305</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256306</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256307</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256308</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256309</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256310</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256311</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256312</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256313</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256314</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>

<tr>
<td align="left">NƏCƏFOV</td>
<td align="left">ELMAR</td>
<td align="left">MƏTLƏB</td>
<td align="center">IXP2256315</td>
<td align="center">43.2</td>
<td align="center">13.12.2018</td>
<td align="right"><a href="#" onclick="singleProtocolPayment(\'IXP2256294\')">Ödə</a></td>
</tr>








<tr>
<td align="right" colspan="5"><b>Cəmi: </b></td>
<td align="center"> 43.2 AZN </td>
<td align="center">
</td>
</tr>
</tbody></table>


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
    <input type="hidden" name="psn" value="AB736972">
    <input type="hidden" name="bd" value="1986-09-25">
    <input type="hidden" name="vd" value="2022-05-29">
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

    

</body></html>



        ';
        return $text;
    }

    protected function asDateTime($value)
    {
        return Carbon::parse($value)->timestamp;
    }


}
