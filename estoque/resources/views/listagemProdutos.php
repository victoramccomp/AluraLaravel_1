<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <title>Controle de estoque</title>
    </head>
    <body>
        <div class="container"> 
            <h1>Listagem de produtos</h1>
            <table class="table table-striped table-bordered table-hover">
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto->nome ?></td>
                <td><?= $produto->valor ?></td>
                <td><?= $produto->descricao ?></td>
                <td><?= $produto->quantidade ?></td>
                <td> 
                    <a href="/produtos/visualizar?id=<?= $produto->id ?>">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
            </table>
        </div>
    </body>
</html>