/* 
 * Define AJAX handlers for homepage goodies.
 * If we were using Caboose to manage dependencies, this file would be injected
 * at the proper spot in a rendered page, and only on that page.
 * Without using Caboose, we add this to the bottom of the template, after
 * loading jquery ... this is a poor practice!
 */
$('#showsum').click(function () {
    $.ajax({
        url: "/welcome/reallylongbuthiddenreference",
        success: function (result) {
            $('#meat').html(result);
        },
        error: function (xhr) {
            $('#meat').html('Oh no!! ' + xhr.status + ' ' + xhr.statusText);
        }
    });
});

$('#showdate').click(function () {
    $.ajax({
        url: "/standings/latest",
        success: function (result) {
            $('#meat').html(result);
        },
        error: function (xhr) {
            $('#meat').html('Oh no!! ' + xhr.status + ' ' + xhr.statusText);
        }
    });
});

$('#showbogus').click(function () {
    $.ajax({
        url: "/bogus",
        success: function (result) {
            $('#meat').html(result);
        },
        error: function (xhr) {
            $('#meat').html('Oh no!! ' + xhr.status + ' ' + xhr.statusText);
        }
    });
});
