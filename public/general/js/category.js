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

$.fn.flex = function(){
    return $(this).css("display","flex")
}

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
    }else{
        $(this).val("")
        toastr['error'](`Wrong ${role} file type`)
        previewHolder.hide().prev(".file-input").removeClass("content-added")
    }
})
