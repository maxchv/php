/**
 * Created by shaptala on 10.01.2017.
 */

$("#send").click(function () {
    var title = $("#title").val();
    var content = $("#content").val();
    var post = {title: title, content: content, error: ""};
    //console.log(post);
    $.ajax({
        method: "POST",
        url: "/blog/posts/create",
        dataType: 'json',
        data: JSON.stringify(post),
        success: function(msg) {
            console.log(msg);
            $("#post_id").val(msg['id']);
            $("#title").val(msg['title']);
            $("#content").val(msg['content']);
        }
    });
});