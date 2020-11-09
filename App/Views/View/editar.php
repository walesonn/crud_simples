<div id="rsp"></div>
<form method="post" id="form-edit">
<span id="btnBack"><a href="?p=home"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a></span>
    <fieldset>
        <legend><h2>Editar Contato</h2></legend>
        
        <?php if(isset($contato)):?>
                <input type="hidden" name="id" id="id" value="<?=$contato->getId()?>">
                <input type="text" name="nome" id="nome" value="<?=$contato->getNome()?>">
                <input type="email" name="email" id="email" value="<?=$contato->getEmail()?>">
                <input type="tel" name="tel" id="tel" value="<?=$contato->getTel()?>">
                <input type="submit" value="Editar" class="btn">
        <?php endif;?>
    </fieldset>
</form>