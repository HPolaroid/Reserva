<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reserva";

    //Cria conexão

    $conexao = new mysqli($servername, $username, $password, $dbname);

    // Verefica Conexão

    if($conexao -> connect_error){
                                die("Falha na Conexão com o BD: " . $conexao -> connect_error);
                                }

    $professor = $_POST['Professor'];

    $inserir = mysqli_query($conexao, "INSERT INTO Professor (Nome_professor)
                                        VALUES ('$professor')")
                                        or die ("Erro a cadastrar o Professor!");

    echo "Professor cadastrado no Sistema!";

?>