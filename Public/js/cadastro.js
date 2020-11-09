$( function(){
    $("#tel").mask( "(00)00000-0000" );
    $("#form-contact").submit( function(e){
        e.preventDefault();

        $.ajax({
            url: "?p=cadastro",
            type: "POST",
            dataType: "html",
            data: $(this).serialize(),
            success: function( data )
            {   
                if( data == "c1")
                {
                    danger("Campo nome inválido");
                    borderRed( $("#nome") );
                    return;
                }
                else if( data == "c2" )
                {
                    danger("Campo email inválido");
                    borderRed( $("#email") );
                    return;
                }
                else if( data == "c3" )
                {
                    danger("Campo telefone inválido");
                    borderRed( $("#tel") );
                    return;
                }
                else if( data === "duplicate" )
                {
                    danger("Já existe um contato salvo com este email tente outro");
                    borderRed( $("#email") );
                    return;
                }
                else{
                    $("body").html(data);
                    $("#rsp").html("Contato salvo com sucesso!").css({
                        backgroundColor: "lightgreen",
                        paddingTop: "10px",
                        paddingBottom: "10px",
                        color: "white"
                    });
                }

                console.log(data)
            },
            error: function()
            {
                alert("Error interno contate suporte");
            }
        });

        return false;
    });
});

function danger(texto)
{
    $("#rsp").html(texto).css({
        backgroundColor: "red",
        paddingTop: "10px",
        paddingBottom: "10px",
        color: "white"
    });
}

function borderRed(val)
{
    val.css("border","1px solid red");
}