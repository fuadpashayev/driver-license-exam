$('.dropdown-select').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu-select').slideToggle(300);
});
$('.dropdown-select').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu-select').slideUp(300);
});
$('.dropdown-select .dropdown-menu-select li').click(function () {
    $(this).parents('.dropdown-select').find('span').text($(this).text());
    $(this).parents('.dropdown-select').find('input').attr('value', $(this).attr('id'));
});
/*End Dropdown Menu*/


$('.dropdown-menu-select li').click(function () {
    var input = '<strong>' + $(this).parents('.dropdown-select').find('input').val() + '</strong>',
        msg = '<span class="msg">Hidden input value: ';
    $('.msg').html(msg + input + '</span>');
});
