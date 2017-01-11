/**
 * Created by shaptala on 10.01.2017.
 */

$("#send").click(function () {
    var f = document.getElementById("image");
    var img_file = f.files[0];
    var fileReader = new FileReader();

    fileReader.onload = function(e) {
        var image = e.target.result;
        //console.log("content type: " + type(file));
        console.log( "Got the image"
            +"name: " + img_file.name + "\n"
            +"type: " + img_file.type + "\n"
            +"size: " + img_file.size + " bytes"
        );

        var title = $("#title").val();
        var content = $("#content").val();
        var post = {
            title: title,
            content: content,
            image: image,
            image_name: img_file.name
        };
        //console.log(post);
        $.ajax({
            method: "POST",
            url: "/blog/posts/create",
            dataType: 'json',
            data: JSON.stringify(post),
            success: function (msg) {
                console.log(msg);
                console.dir(typeof(msg['image']));
                $("#post_id").val(msg['id']);
                $("#title").val(msg['title']);
                $("#content").val(msg['content']);
                $("#status").text(msg['status']);
            }
        });
    }
    //fileReader.readAsArrayBuffer(img_file);
    fileReader.readAsDataURL(img_file);
});