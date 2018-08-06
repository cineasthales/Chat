<script>    
    setTimeout(function () {
        $('#janelaarq').load("<?= base_url('conversa/atualizaarq') ?>");
    }, 1000);
</script>

<div id="janelaarq">        
    <?php
    if ($arquivos == NULL) {
        echo '<h4>Não há arquivos.</h4>';
    } else {
        echo '<ul>';
        echo '<li><a id="topoarq" href="#fimarq">↓ últimos</a></li>';
        foreach ($arquivos as $arquivo) {
            ?>
            <li><a href="<?= base_url('upload/' . $arquivo->nome) ?>"><?= $arquivo->nome ?></a></li>
            <?php
        }
        echo '<li><a id="fimarq" href="#topoarq">↑ topo</a></li>';
        echo '</ul>';
    }
    ?>
</div>