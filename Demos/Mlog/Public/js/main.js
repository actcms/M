$(document).ready(function(){
    $('.show-comment').click(
        function(){
            var id = $(this).attr('id');
            var html = $.ajax({
                url: "index.php?Comment/index/"+id,
                async: false
            }).responseText;
            $(this).toggle('slow');
            $('.comment').append(html);
            return false;
        }
    );
    $('.add-comment').show(
        function(){
            var id = $(this).attr('id');
            var html = $.ajax({
                url: "index.php?Comment/add/"+id,
                async: false
            }).responseText;
            $(this).append(html);
            return false;
        }
    );

});
