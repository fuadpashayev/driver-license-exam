$(document).on('click','.dropdown-select',function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu-select').slideToggle(300);
});
$(document).on('focusout','.dropdown-select',function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu-select').slideUp(300);
});
$(document).on('click','.dropdown-select .dropdown-menu-select li',function () {
    $(this).parents('.dropdown-select').find('span').text($(this).text());
    $(this).parents('.dropdown-select').find('input').attr('value', $(this).attr('id'));
});



