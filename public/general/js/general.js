function uri(){
    return window.location.href.split('/').splice(-1)[0].split('.')[0].replace('#','')
}
String.prototype.isDigit = function(){
    return /^\d+$/.test(this);

}
function refresh(){
    location.reload()
}

$(document).on("click","[role='delete']",function(){
    $("#deleteModal").modal("show")
    let id = $(this).parents('tr').attr("id")
    let route = $(this).attr("route")
    $('#delete').attr({"data":id,"route":route})
})

$(document).on("click","#delete",function(){
    $("#deleteModal").modal("hide")
    let id = $(this).attr('data')
    let route = $(this).attr("route")
    let token = $('meta[name="csrf-token"]').attr("content")
    $(`#${id}`).hide()
    $.ajax({
        type:'DELETE',
        data:{_token:token},
        url:route,
        success:function(res) {
            if (res === "no") {
                $(`#${id}`).show()
                toastr['error']('Error Happened')
            } else {
                toastr['success']('This data deleted successfully')
                if(uri().isDigit())
                    refresh()
                else
                    $(`#${id}`).remove()

            }
        }
    })
})
$.fn.play = function(){
    $(this).trigger('play')
}
$.fn.pause = function(){
    $(this).trigger('pause')
}

var lightbox = $('a.image').simpleLightbox({closeText:'×',captionSelector:'img',nav:false,showCounter: false,fileExt:false});

$(document).on("click",".audio-toggle",function(){
    let action = $(this).text()==='pause_circle_filled'?'pause':'play'
    let player = $(this).parent().find('audio')
    if(action==='play'){
        player.play()
        $(this).text('pause_circle_filled')
    }else{
        player.pause()
        $(this).text('play_circle_filled')
    }
})

$(document).on('ended','audio',function(){
    $(this).next('.audio-toggle').text('play_circle_filled')
})

function bindEvents(){
    $('audio').off('ended').on('ended', function (e) {
        $(this).next('.audio-toggle').text('play_circle_filled')
    });
}
