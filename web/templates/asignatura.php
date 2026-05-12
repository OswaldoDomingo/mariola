<?php ob_start(); ?>
<h2>Asignatura: <?php echo $params['titulo']; ?></h2>

<?php if (isset($params['mensaje'])): ?>
    <p><?php echo $params['mensaje']; ?></p>
<?php endif; ?>

<table class="table table-striped">
<thead>
    <tr>
        <?php if (!empty($params['datos'])): ?>
            <?php foreach (array_keys($params['datos'][0]) as $key): ?>
                <?php if ($key !== $params['id_col']): // Excluir el campo id ?>
                    <th><?php echo ucfirst($key); ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tr>
</thead>
<tbody>
    <?php foreach ($params['datos'] as $fila): ?>
        <tr>
            <?php foreach ($fila as $key => $valor): ?>
                <?php if ($key !== $params['id_col']): // Excluir el campo id ?>
                    <?php if ($key === 'recurso'): ?>
                        <td><a href="<?php echo $valor; ?>" target="_blank">enlace</a></td>
                    <?php else: ?>
                        <td><?php echo $valor; ?></td>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

<?php $contenido = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
