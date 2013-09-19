$(document).ready(function(){
    $('.show-comment').click(function(){
        var html = $.ajax({
            url: "index.php?Comment/index/5",
            async: false
        }).responseText

        $(this).append(html);
    });
});
