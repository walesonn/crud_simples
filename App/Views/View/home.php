<div id="rsp"></div>
<form method="post" name="form-cadastrar" id="form-cadastrar">
    <fieldset>
        <legend><h1 id="legend">Contacts</h1></legend>
        <input type="text" name="nome" id="nome" placeholder="Nome..." required>
        <input type="text" name="email" id="email" placeholder="Email..." required>
        <input type="tel" name="tel" id="tel" placeholder="Tel(33)*****-****">
        <input type="submit" value="Salvar" class="btn">
    </fieldset>
</form>
    <table class="mt-1">
        <thead>
            <td><h2>Id</h2></td>
            <td><h2>Nome</h2></td>
            <td><h2>Email</h2></td>
            <td><h2>Telefone</h2></td>
        </thead>
        <tbody>
        <?php if( isset($contacts) ){ ?>
        <?php    foreach($contacts as $c){ ?>

                <tr>
                    <td><?=$c->getId() ?></td>
                    <td><?=$c->getNome() ?></td>
                    <td><?=$c->getEmail() ?></td>
                    <td><?=$c->getTel() ?></td>
                    <td>
                        <a href="?p=visualizar&n=<?=$c->getId()?>"><i class="fa fa-eye btn-success" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="?p=editar&n=<?=$c->getId()?>"><i class="fa fa-pencil btn-orange" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="#" onclick="del(<?=$c->getId() ?>)"><i class="fa fa-trash-o btn-danger" aria-hidden="true"></i></a>
                    </td>
                </tr>

            <?php }?>
        <?php }?>
        </tbody>
    </table>
