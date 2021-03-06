$(document).on("click","#add-question",function(){
    let questionArea = $(".questions-group")
    let questionNumber = questionArea.find(".input-box-group").length
    let id = questionNumber+1
    let questionInput = `
        <div class="input-box-group">
            <div class="input-group-header">Sub Question ${id} <span class="delete-question material-icons">close</span></div>
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">subtitles</i>
                </span>
                <input name="text[n${id}]" required="" placeholder="Question">
            </div>
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">check</i>
                </span>
                <div class="dropdown-select">
                    <div class="select">
                        <span>Answer</span>
                        <i class="fa fa-chevron-left"></i>
                    </div>
                    <input type="hidden" name="answer[n${id}]" value="">
                    <ul class="dropdown-menu-select">
                        <li id="1">Right</li>
                        <li id="0">Wrong</li>
                    </ul>
                </div>
            </div>
            <div class="input-box">
                <span class="input-addon">
                    <i class="material-icons">audiotrack</i>
                </span>
                <input name="audio[n${id}]" type="file" id="audio_${id}" class="hidden" role="audio">
                <div class="file-input audio-input" for="audio_${id}">Upload</div>
                    <div class="preview">
                        <audio controls style="display: none;">
                            <source src="" type="audio/mpeg"/>
                        </audio>
                        <div class="audio-toggle material-icons relative">play_circle_filled</div>
                    </div>
            </div>
            
        </div>
`
    questionArea.append(questionInput)


})

$.fn.preview = function(input,type="img") {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var $this=$(this)
        reader.onload = function(e) {
            if(type==="img")
                $this.attr('src', e.target.result)
            else
                $this.attr('href', e.target.result)
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("click",".file-input",function(){
    let id = $(this).attr("for")
    $(`#${id}`).click()
})

var imageTypes = ['jpeg','jpg','png','ico','gif']
var audioTypes = ['mp3','wav','ogg']

$.fn.flex = function(){
   return $(this).css("display","flex")
}

$(function(){
    bindEvents()
})

$(document).on("change","input[type='file']",function(){
    let type = $(this).val().split('.').slice(-1)[0].toLowerCase()
    let previewHolder = $(this).parents(".input-box").find('.preview')
    let role = $(this).attr("role")
    previewHolder.flex().prev(".file-input").addClass("content-added")
    console.log(role)
    if(imageTypes.includes(type) && role==="image"){
        previewHolder.find("img").preview(this)
        previewHolder.find("a").preview(this,"a")
        let text = $("#main-question").val()
        previewHolder.find("img").attr("title",text)
    }else if(audioTypes.includes(type) && role==="audio"){
        let file = $(this).prop('files')[0];
        previewHolder.find("source,audio").attr("src",URL.createObjectURL(file))
        bindEvents()
    }else{
        $(this).val("")
        toastr['error'](`Wrong ${role} file type`)
        previewHolder.hide().prev(".file-input").removeClass("content-added")
    }
})

$(document).on("change","#main-question",function(){
    let text = $(this).val()
    $(this).parents(".input-box-group").find("img").attr("title",text)
})

$(document).on("click","span.delete-question",function(){
    $(this).parents(".input-box-group").remove()
})

