<div>
    <h2>Bem-vindo, <span id="sessionuser"><?= $this->session->apelido ?></span>!</h2>
    <h3>Com quem você quer conversar?</h3><br>
    <ul id="friendslist">
        <li><a href="<?= base_url('geral') ?>">Sala Geral</a></li>
        <?php
        foreach ($usuarios as $usuario) {
            if ($usuario->apelido != $this->session->apelido) {
                ?>
                <li><a href="<?= base_url('conversa/com/' . $usuario->id) ?>"><?= $usuario->apelido ?> (<?= $usuario->nome ?>)</a></li>
                <?php
            }
        }
        ?>
    </ul>
    <br>
</div>

