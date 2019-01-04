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

Number.prototype.inRange = function (min, max) {
    return ((this-min)*(this-max) <= 0);
}

$.fn.offsetHeight = function(){
    let min = parseInt($(this).offset().top)-300
    let max = min+parseInt($(this).outerHeight())
    return [min,max]
}

$.fn.scrollTo = function(){
    $([document.documentElement, document.body]).animate({
        scrollTop: $(this).offset().top-50
    }, 1000);
}

$(document).on("click",".nav-menu",function(){
    $([document.documentElement, document.body]).clearQueue()
    let target = $(this).attr("for")
    $("#"+target).scrollTo()
})

$(window).on("scroll",function(){
    fixScrollActive()
})

$(function(){
    fixScrollActive()
})


function fixScrollActive(){
    let currentScroll = $(window).scrollTop()
    let authentication = $("#authentication").offsetHeight()
    let category = $("#category").offsetHeight()
    let question = $("#question").offsetHeight()
    let answers = $("#answers").offsetHeight()
    if(currentScroll.inRange(authentication[0],authentication[1])){
        let el = $(".nav-menu[for=authentication]")
        let active = el.hasClass('active')
        if(!active){
            $(".nav-menu.active").removeClass("active")
            el.addClass("active")
        }
    }else if(currentScroll.inRange(category[0],category[1])){
        let el = $(".nav-menu[for=category]")
        let active = el.hasClass('active')
        if(!active){
            $(".nav-menu.active").removeClass("active")
            el.addClass("active")
        }
    }else if(currentScroll.inRange(question[0],question[1])){
        let el = $(".nav-menu[for=question]")
        let active = el.hasClass('active')
        if(!active){
            $(".nav-menu.active").removeClass("active")
            el.addClass("active")
        }
    }else if(currentScroll.inRange(answers[0],answers[1])){
        let el = $(".nav-menu[for=answers]")
        let active = el.hasClass('active')
        if(!active){
            $(".nav-menu.active").removeClass("active")
            el.addClass("active")
        }
    }
}
