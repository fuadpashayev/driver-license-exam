$(document).on("click",".delete",function(){
    $("#deleteModal").modal("show")
    let id = $(this).parents('tr').attr("id")
    $('#delete').attr("data",id)
})

$(document).on("click","#delete",function(){
    $("#deleteModal").modal("hide")
    let id = $(this).attr('data')
    $(`#${id}`).hide()
    toastr['success']('This data deleted successfully')
})
