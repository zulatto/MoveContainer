<?php
    include '../inc/header.php';
    include '../inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <title>Cadastro container</title>
</head>
<body>

    <?php
                $id = $_GET['id'] ?? '';

                $sql = "SELECT * FROM container WHERE cd = $id";
        
                $data = mysqli_query($conn, $sql);
        
                $row = mysqli_fetch_assoc($data);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro</h2>
                <form action="../controller/editCadastroScript.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cliente">Nome</label>
                            <input type="text" class="form-control" name="cliente" required value="<?php echo $row['cliente']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="container">Numero do container</label>
                            <input type="text" class="form-control" name="container" 
                            maxlength="11"
                            pattern="[A-Z]{3}.[0-9]{7}" title="4 letras e 7 numeros" 
                            oninput="this.value = this.value.toUpperCase()"
                            required
                            value="<?php echo $row['container']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" class="form-control">
                                <option value="0" <?php echo $row['type'] == 0?'selected':'';?> >20</option>
                                <option value="1" <?php echo $row['type'] == 1?'selected':'';?> >40</option>
                                <!-- <?php if( $row['type'] == 0) {echo $row['type'];} ?> -->
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0" <?php echo $row['state'] == 0?'selected':'';?> >Vazio</option>
                                    <option value="1" <?php echo $row['state'] == 1?'selected':'';?> >Cheio</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="Categoria">Categoria</label>
                                <select name="categoria" class="form-control">
                                    <option value="0" <?php echo $row['category'] == 0?'selected':'';?> >Importação</option>
                                    <option value="1" <?php echo $row['category'] == 1?'selected':'';?> >Exportação</option>
                                </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <input type="hidden" name="id" value="<?php echo $row['cd']; ?>">
                </form>
                <a href='../../index.php' class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>

