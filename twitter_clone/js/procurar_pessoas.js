$(document).ready( function(){
    //alert('oi 0');
    $('#btn_procurar_pessoa').click(function(){
        //alert('oi 1');
        if ($('#nome_pessoa').val().length > 0) {
            $.ajax({
                url: 'get_pessoas.php',
                method: 'post',
                data: $('#form_procurar_pessoas').serialize(),
                success: function(data){
                    $('#pessoas').html(data);

                    $('.btn_seguir').click(function(){
                        //alert('oi 2');

                        var id_usuario = $(this).data('id_usuario');
                        $('#btn_seguir_'+id_usuario).hide();
                        $('#btn_deixar_seguir_'+id_usuario).show();
                        $.ajax({
                            url: 'seguir.php',
                            method: 'post',
                            data: {id_seguidor: id_usuario},
                            success: function(data){
                                //alert('Seguindo');
                            }
                        });
                    });



                    $('.btn_deixar_seguir').click(function(){
                        //alert('oi 3');
                        var id_usuario = $(this).data('id_usuario');
                        $('#btn_seguir_'+id_usuario).show();
                        $('#btn_deixar_seguir_'+id_usuario).hide();
                        $.ajax({
                            url: 'deixar_seguir.php',
                            method: 'post',
                            data: {id_seguidor: id_usuario},
                            success: function(data){
                                //alert('Deixado de seguir');
                            }
                        });
                    });
                }
            });

        }
    });

});
