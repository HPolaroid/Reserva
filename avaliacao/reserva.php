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
    
    $data = $_POST['data'];
    $inicio = $_POST['Hinicio'];
    $termino = $_POST['Htermino'];
    $sala = $_POST['sala'];
    $prof = $_POST['prof'];

    $inserir = mysqli_query($conexao, "INSERT INTO Agendamento(data_agendamento,Horario_inicio,Horario_termino,Cod_sala,Cod_professor)
                                        VALUES ('$data','$inicio','$termino','$sala','$prof')")
                                        or die ("Erro ao reservar turma!");

    echo "Sala reservada!";

?>