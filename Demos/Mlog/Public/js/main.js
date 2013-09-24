$(document).ready(function(){
    $('.show-comment').click(function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        $(this).toggle('slow');
        $('.comment').load("index.php?Comment/index/"+id);
    });

    $('#comment form').submit(function(event){
        event.preventDefault();

        var $form = $(this),
            postId = $form.find("input[name='postId']").val(),
            username = $form.find("input[name='username']").val(),
            email = $form.find("input[name='email']" ).val(),
            message = $form.find("textarea[name='message']").val(),
            comment = $form.find("input[name='comment']").val(),
            url = $form.attr( "action" );

        $.post( url, { postId:postId,username:username,email:email,message:message,comment:comment},function(data){
            if(parseInt(data)===1)
            {
                alert('发布成功');
            }
            else
            {
                alert('发布失败');
            }
        });
    });
});
