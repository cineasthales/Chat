<div>
    <h2>Amigos</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Apelido</th>
            <th>E-mail</th>
        </tr>        
        <?php
        foreach ($usuarios as $usuario) {
            if ($usuario->apelido != $this->session->apelido) {
                ?>
                <tr>
                    <td><?= $usuario->nome ?></td>
                    <td><?= $usuario->apelido ?></td>
                    <td><?= $usuario->email ?></td>
                </tr>
            <?php }
        }
        ?>
    </table><br>
</div>

