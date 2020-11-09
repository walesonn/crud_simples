<main>
    
    <?php if(isset($contato)):?>
        <h1>Visualizando contato de <em class="em"><?=$contato->getNome()?></em></h1>
        <ul class="mt-1">
            <li>
                <span id="btnBack"><a href="?p=home"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a></span>
                <h2 class="mt-1"> ID: <em><?=$contato->getId()?></em></h2>
            </li>
            <li>
                <h2> NOME: <em><?=$contato->getNome()?></em></h2>
            </li>
            <li>
                <h2>EMAIL: <em><?=$contato->getEmail()?></em></h2>
            </li>
            <li>
                <h2>TELEFONE: <em><?=$contato->getTel()?></em></h2>
            </li>
        </ul>
    <?php endif;?>
</main>
