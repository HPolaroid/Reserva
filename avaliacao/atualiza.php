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
    
                                
    if(isset($_POST)){
        $count = count($_POST['Cod_agendamento']);
        $i = 0;

        while ($i<$count){
            $codigo =$_POST['Cod_agendamento'][$i];
            $codsala = $_POST['Cod_sala'][$i];
            $data = $_POST['data_agendamento'][$i];
            $horIN = $_POST['Horario_inicio'][$i];
            $horTer = $_POST['Horario_termino'][$i];
            $Nomeprof= $_POST['Cod_professor'][$i];
            
            $update = mysqli_query($conexao, "UPDATE agendamento
                                          SET cod_sala = '$codsala',data_agendamento = '$data',Horario_inicio = '$horIN',Horario_termino = '$horTer',Cod_professor = '$Nomeprof'
                                          WHERE Cod_agendamento='$codigo'")
                                          or die ("Erro a cadastrar o Professor!");
                                          
                                          ++$i; 
                                        }
                                        echo "Reserva Atualizada!";
                                    }
?>