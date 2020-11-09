$( function(){
    $("#tel").mask( "(00)00000-0000" );
    $("#form-cadastrar").submit( function(e){
        e.preventDefault();

        //cadastro
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
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data == "c2" )
                {
                    danger("Campo email inválido");
                    borderRed( $("#email") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data == "c3" )
                {
                    danger("Campo telefone inválido");
                    borderRed( $("#tel") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data === "duplicate" )
                {
                    danger("Já existe um contato salvo com este email tente outro");
                    borderRed( $("#email") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    console.log(data)
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
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
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

    $("#form-edit").submit( function(e){
        e.preventDefault();

        $.ajax({
            url: "?p=editar",
            type: "POST",
            dataType: "html",
            data: $(this).serialize(),
            success: function( data )
            {   
                if( data == "c1")
                {
                    danger("Campo nome inválido");
                    borderRed( $("#nome") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data == "c2" )
                {
                    danger("Campo email inválido");
                    borderRed( $("#email") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data == "c3" )
                {
                    danger("Campo telefone inválido");
                    borderRed( $("#tel") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    return;
                }
                else if( data === "duplicate" )
                {
                    danger("Já existe um contato salvo com este email tente outro");
                    borderRed( $("#email") );
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
                    console.log(data)
                    return;
                }
                else{
                    $("body").html( data );
                    $("#rsp").html("Contato editado com sucesso!").css({
                        backgroundColor: "lightgreen",
                        paddingTop: "10px",
                        paddingBottom: "10px",
                        color: "white"
                    });
                    setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
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

    $(".btnDelet").click( function(){
        alert($(this).text())
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

function destroyResponse()
{
    $("#rsp").html("").css({
        paddingBottom: "0px",
        paddingTop: "0px"
    });
}

function del(n)
{
    $.get( "?p=delete&n="+n, function( data ){
        if( data === "err1" )
        {
            danger("Impossivel realizar a operação");
            setTimeout(destroyResponse,5000);
            return;
        }
        else if( data === "err2")
        {
            danger("Contate o suporte erro interno");
            setTimeout(destroyResponse,5000);
            return;
        }
        else if( data === "err3" )
        {
            danger("Contato inexistente");
            setTimeout(destroyResponse,5000);
            return;
        }
        else{
            $("body").html( data );
            $("#rsp").html("Contato apagado com sucesso!").css({
                backgroundColor: "lightgreen",
                paddingTop: "10px",
                paddingBottom: "10px",
                color: "white"
            });
            setTimeout(destroyResponse, 5000); //Esconde a response depois de n segundos de exibição
        }
    })
}