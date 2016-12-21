

$(function () {
    // set active menu item
    var whref = window.location.href;
    var href = whref.slice(whref.lastIndexOf('/') + 1);
    $("a[href='" + href + "']").parent().addClass('active');

    // set titles
    var title = $('title').text();
    $('.navbar-header>a').text(title);
    $('h1').text(title);

    var subj = [];
    $('.navbar-nav a').each(function () {
        if ($(this).text() !== 'Home') {
            subj.push($(this).text());
        }
    });

    $('.jumbotron p').text(subj.join(', '));

    $('.nav a').click(function () {
        $('.nav').find('.active').removeClass('active');
        $(this).parent().addClass('active');
    });

});
