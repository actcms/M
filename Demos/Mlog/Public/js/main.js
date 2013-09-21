$(document).ready(function(){
    $('.show-comment').click(
        function(){
            var id = $(this).attr('id');
            $(this).toggle('slow');

            $('.comment').load("index.php?Comment/index/"+id);
            return false;
        }
    );
    $('.add-comment').show(
        function(){
            var id = $(this).attr('id');
            $(this).load("index.php?Comment/add/"+id);
            return false;
        }
    );
});
