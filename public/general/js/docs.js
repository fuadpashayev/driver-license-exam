$(document).on("click",".test",function(){
    let form = $(this).parents(".input-group")
    let url = form.find("[role=url]").val()
    let data = {}
    let headers = {}
    let result = form.find('.result')
    let loading = $(this).find('.loading')
    loading.addClass("show")
    form.find('.inp-group:not(.no-filter)').each(function(){
        let key = $(this).find("div[role=key]").text()
        let value = $(this).find("input").val()
        let type = $(this).find("div[role=key]").attr("type")
        console.log(type)
        if(type==='header')
            headers[key] = value
        else{
            data[key] = value
        }
    })
    $.ajax({
        type:'POST',
        url:url,
        data:data,
        headers:headers,
        success:function(res){
            if(res.access_token){
                $("[type=header]").next("input").val(`Bearer ${res.access_token}`)
            }
            let response = JSON.stringify(res,null,2)
            result.html(response).show()
            loading.removeClass("show")
        },
        error:function(res){
            let response = JSON.stringify(res.responseJSON,null,2)
            result.html(response).show()
            loading.removeClass("show")
        }
    })
    
})

$.fn.flex = function(){
    return $(this).css('display','flex')
}
function loader(type="open"){
    var loader = $("#loader:visible").length
    if(loader || type=="close")
      $("#loader").hide()
    else
      $("#loader").flex()
  }
var loaded_url
$(document).on("click","a",function(e){
  e.preventDefault()
  var url=$(this).attr("href")
  loaded_url=$(this)
  $(".nav-menu.active").removeClass("active")
  $(this).find(".nav-menu").addClass("active")
  if(!$("#loader:visible").length)
    loader()
  history.pushState(null, null, url)
  $("#ajax-content").load(url+" #ajax-content",function(responseText, textStatus, XMLHttpRequest){
    if(textStatus=='error')
      setTimeout(function(){loaded_url.click()},3000)
    else loader("close")

  })

return false;
})
