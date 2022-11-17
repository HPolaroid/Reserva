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

    $consulta = mysqli_query($conexao, "SELECT sala.nome_sala,professor.Cod_professor,professor.Nome_professor,agendamento.Cod_agendamento,agendamento.Cod_sala,data_agendamento,Horario_inicio,Horario_termino
                                        FROM professor inner join agendamento
                                        on professor.Cod_professor = agendamento.Cod_professor
                                        right join sala 
                                        on sala.cod_sala = agendamento.cod_sala
                                        WHERE sala.nome_sala like '%$sala%'");

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Codigo do Agendamento</th>";
    echo "<th>Nome da Sala</th>";
    echo "<th>Data Agendada</th>";
    echo "<th>Horário de Início</th>";
    echo "<th>Horário de Término</th>";
    echo "<th>Professor</th>";
    echo "</tr>";
    
    while ($linha = mysqli_fetch_array($consulta)) {
    echo "<form action='atualiza.php' method='post'>";
        echo "<tr>";
        echo "<td>";
        echo "<input type = 'text' name ='Cod_agendamento[]' value ='".$linha['Cod_agendamento']."' readonly>";
        echo "</td>";
        echo "<td>";
        echo  "<select name ='Cod_sala[]'>";
        echo "<option  value ='".$linha['agendamento.Cod_sala']. "' readonly>".$linha['sala.nome_sala']."</option>";
        echo "<option  value ='1401'>Sala 1401</option>";
        echo "<option  value ='1402'>Sala 1402</option>";
        echo "<option  value ='1403'>Sala 1403</option>";
        echo "<option  value ='1405'>Sala 1405</option>";
        echo "<option  value ='1406'>Sala 1406</option>";
        echo "<option  value ='1407'>Sala 1407</option>";
        echo "</select>";
        echo "</td>";
        echo "<td>";
        echo "<input type = 'date' name ='data_agendamento[]' value ='".$linha['data_agendamento']. "'>";
        echo "</td>";
        echo "<td>";    
        echo "<input type = 'time' name ='Horario_inicio[]' value ='".$linha['Horario_inicio']. "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type = 'time' name ='Horario_termino[]' value ='".$linha['Horario_termino']. "'>";
        echo "</td>";
        echo "<td>
            <select name ='Cod_professor[]'>";
        echo "<option  value ='".$linha['Cod_professor']. "' readonly>".$linha['Nome_professor']."</option>";
        echo "<option  value ='1'>Will</option>";
        echo "<option  value ='3'>Paulo</option>";
        echo "</select>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table><br>";
    echo "<input type='submit' value='Atualizar Reserva'>";
    echo "</form>"
?>