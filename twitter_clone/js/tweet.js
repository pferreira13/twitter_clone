$(document).ready( function(){
    $('#btn_tweet').click(function(){
        if ($('#texto_tweet').val().length > 0) {
            $.ajax({
                url: 'inclui_tweet.php',
                method: 'post',
                data: $('#form_tweet').serialize(),
                success: function(data){
                    $('#texto_tweet').val('');
                    atualizarTweet();
                }
            });

        }
    });

    

    function atualizarTweet() {
        $.ajax({
            url: 'get_tweet.php',
            success: function (data) {
                $('#tweets').html(data);
                //alert(data);
            }
        });
    }
    atualizarTweet();
});
