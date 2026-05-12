<?php ob_start(); ?>
<h2>Asignatura: Matemáticas</h2>

<?php if (isset($params['mensaje'])): ?>
    <p><?php echo $params['mensaje']; ?></p>
<?php endif; ?>
<!-- 
<table class="table table-striped">
    <thead>
        <tr>
        
            <th>Bloque</th>
            <th>Tema</th>
            <th>Descripción</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['datos'] as $fila): ?>
            <tr>
            
                <td><?php echo $fila['bloque']; ?></td>
                <td><?php echo $fila['tema']; ?></td>
                
                <td><a href="<?php echo $fila['recurso']; ?>" target="_blank">enlace</a></td>
              
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br><br> -->
    


    <table class="table table-striped">
    <thead>
        <tr>
            <?php if (!empty($params['datos'])): ?>
                <?php foreach (array_keys($params['datos'][0]) as $key): ?>
                    <?php if ($key !== 'id_matematicas'): // Excluir el campo id_matematicas ?>
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
                    <?php if ($key !== 'id_matematicas'): // Excluir el campo id_matematicas ?>
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
