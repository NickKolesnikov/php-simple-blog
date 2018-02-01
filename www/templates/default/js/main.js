$(document).ready(function() {
    // параметры из URL
    var urlParams;
    (window.onpopstate = function () {
        var match,
            pl     = /\+/g,  // Regex for replacing addition symbol with a space
            search = /([^&=]+)=?([^&]*)/g,
            decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
            query  = window.location.search.substring(1);

        urlParams = {};
        while (match = search.exec(query))
            urlParams[decode(match[1])] = decode(match[2]);
    })();

    // плавная прокрутка к якорю, если он присутствует
    if(location.hash)
    {
        $('html, body').stop().animate({
            'scrollTop': $(location.hash).offset().top - ($('ul').height() + 100)
        }, 900, 'swing', function () {
            window.location.hash = location.hash;
        });
    }

    /*
    *
    * Добавление комментария к записи
    *
    * */
    function addCommentToPost()
    {
        var postId = urlParams["id"];
        var author = $('#new-comment-author').val();
        var text = $('#new-comment-text').val();

        var postData = {
            postId: postId,
            author: author,
            text: text
        };

        $.ajax({
            type: 'POST',
            async: false,
            url: "?controller=post&action=ajaxaddcomment",
            data: postData,
            dataType: "json",
            success: function(data){
                if(data['success']){
                    //Добавляем комментарий на страницу
                    var commentCode = '' +
                        '<div id="comment-id1" class="media">' +
                        '<p class="pull-right"><small>Только что</small></p>' +
                        '<div class="media-body">' +
                        '<h4 class="media-heading user_name">' + postData["author"] + '</h4>' +
                        '<p>' + postData["text"] + '</p>' +
                        '</div>' +
                        '</div>';
                    $("#post-comments-list").append(commentCode);
                    $('#new-comment-text').val('');
                    $('#new-comment-author').val('');
                }
            },
            error: function(data){
                console.log("error");
            }
        })
    }

    /*
    *
    * Добавление новой записи
    *
    * */
    function addPost()
    {
        var author = $('#new-post-author').val();
        var title = $('#new-post-title').val();
        var text = $('#new-post-text').val();

        var postData = {
            author: author,
            title: title,
            text: text
        };

        $.ajax({
            type: 'POST',
            async: false,
            url: "http://localhost/php-simple-blog/www/?controller=post&action=ajaxadd",
            data: postData,
            dataType: "json",
            success: function(data){
                if(data['success']){
                    location.href = "?controller=post&action=view&id=" + data['new_post_id'];
                } else {
                    console.log(data);
                }
            },
            error: function(data){
                console.log("error");
            }
        })
    }

    /* замена стандартного обработчика формы добавления новой записи */
    $("#post-add").on("submit", function(event)
    {
        event.preventDefault(); // Prevent the event from processing the submit request.
        addPost();
    });

    /* замена стандартного обработчика формы добавления комментария */
    $("#comment-add-to-post").on("submit", function(event)
    {
        event.preventDefault(); // Prevent the event from processing the submit request.
        addCommentToPost();
    });
});





