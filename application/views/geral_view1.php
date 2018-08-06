<script>
    setTimeout(function () {
        $('#janelachat').load("<?= base_url('geral/atualizachat') ?>");
    }, 1000);
</script>

<div id="janelachat">
    <?php
    if ($geral == NULL) {
        echo '<h4>Não há mensagens.</h4>';
    } else {
        echo '<ul>';
        echo '<li><a id="topochat" href="#fimchat">↓ últimas</a></li>';
        foreach ($geral as $g) {
            ?>
            <li><b><?= $g->user ?>:</b> <?= $g->corpo ?></li>
            <?php
        }
        echo '<li><a id="fimchat" href="#topochat">↑ topo</a></li>';
        echo '</ul>';
    }
    ?>
</div>




