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

var lightbox = $('a.image').simpleLightbox({closeText:'×',captionSelector:'img',nav:false,showCounter: false});

$(document).on("click",".audio-toggle",function(){
    $(this).parents('tr').find('audio').trigger('play')
    $(this).text('pause_circle_filled')

})

$('audio').on('ended',function(){
    console.log("aa")
    $(this).next('.audio-toggle').text('play_circle_filled')
})
