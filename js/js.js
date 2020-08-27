function validaForm()
 {
    erro = false;
    if($('#name').val() == '')
    {
        alert('Você; precisa preencher o campo Nome');
        erro = true;
    }
    if($('#email').val() == '' &amp;&amp; !erro)
    {
        alert('Você; precisa preencher o campo E-mail');
        erro = true;
    }
    if($('#subject').val() == '' &amp;&amp; !erro)
    {
        alert('Você; precisa preencher o campo Mensagem');
        erro = true;
    }

    //se nao tiver erros
    if(!erro)
    {
        $('#formulario_contato').submit();
    }
 }