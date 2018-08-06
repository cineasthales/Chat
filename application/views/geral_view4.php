</div>

<div id="formchat">
    <form method="post" action="<?= base_url('geral/enviar') ?>">
        <input type="text" name="mensagem" id="mensagem" maxlength="100">
        <button id="btmsg" type="submit" value="Enviar">Enviar</button>
    </form>
</div>

<div id="formarq">
    <form method="post" enctype="multipart/form-data" action="<?= base_url('geral/enviarArq') ?>">
        <input type="file" name="arquivo" id="arquivo">
        <button id="btarq" type="submit" value="Enviar">Enviar Arquivo</button>
    </form>
</div>