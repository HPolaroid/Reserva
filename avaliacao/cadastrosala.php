<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av_will";

    //Cria conexão

    $conexao = new mysqli($servername, $username, $password, $dbname);

    // Verefica Conexão

    if($conexao -> connect_error){
                                die("Falha na Conexão com o BD: " . $conexao -> connect_error);
                                }

    $sala = $_POST['sala'];
    $cod = $_POST['cod'];

    $inserir = mysqli_query($conexao, "INSERT INTO Sala(Cod_sala,Nome_sala)
                                        VALUES ('$cod','$sala')")
                                        or die ("Erro a cadastrar o Professor!");

    echo "Sala cadastrada no Sistema!";

?>