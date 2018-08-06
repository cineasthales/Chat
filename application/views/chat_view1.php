<script>
    setTimeout(function () {
        $('#janelachat').load("<?= base_url('conversa/atualizachat') ?>");
    }, 1000);
</script>

<div id="janelachat">
    <?php
    if ($mensagens == NULL) {
        echo '<h4>Não há mensagens.</h4>';
    } else {
        echo '<ul>';
        echo '<li><a id="topochat" href="#fimchat">↓ últimas</a></li>';
        foreach ($mensagens as $mensagem) {
            ?>
            <li><b><?= $mensagem->user1 ?>:</b> <?= $mensagem->corpo ?></li>
            <?php
        }
        echo '<li><a id="fimchat" href="#topochat">↑ topo</a></li>';
        echo '</ul>';
    }
    ?>
</div>




