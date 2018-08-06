<script>    
    setTimeout(function () {
        $('#janelaarq').load("<?= base_url('geral/atualizaarq') ?>");
    }, 1000);
</script>

<div id="janelaarq">        
    <?php
    if ($arquivosgeral == NULL) {
        echo '<h4>Não há arquivos.</h4>';
    } else {
        echo '<ul>';
        echo '<li><a id="topoarq" href="#fimarq">↓ últimos</a></li>';
        foreach ($arquivosgeral as $ag) {
            ?>
            <li><a href="<?= base_url('upload/' . $ag->nome) ?>"><?= $ag->nome ?></a></li>
            <?php
        }
        echo '<li><a id="fimarq" href="#topoarq">↑ topo</a></li>';
        echo '</ul>';
    }
    ?>
</div>