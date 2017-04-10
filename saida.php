<html>
  <head>
    <meta charset='utf-8' />
    <title>
      Relatório
    </title>
    <link rel='stylesheet'
          type='text/css'
          href='estilo_saida.css'>
  </head>
  <body> 
  
    <?php
    
      $aluno       = $_POST['aluno'];
      $disciplina  = $_POST['disciplina'];
      $professor   = $_POST['professor'];
      $coordenador = $_POST['coordenador'];
      $curso       = $_POST['curso'];
      $notaVa1      = (float)str_replace(',', '.', $_POST['notaVa1']); 
      $notaVa2      = (float)str_replace(',', '.', $_POST['notaVa2']); 
      $notaVa3      = (float)str_replace(',', '.', $_POST['notaVa3']);      
      $notaTrab   = (float)str_replace(',', '.', $_POST['notaTrab']);  
      $linkImg      = $_POST['linkImg'];
      $simNao          = '';
      $total            = $notaVa1 + $notaVa2 + $notaVa3 + $notaTrab; 
      $percentNotaVa1    = ($notaVa1 * 100) / 15;
      $percentNotaVa2    = ($notaVa2 * 100) / 25;
      $percentNotaVa3    = ($notaVa3 * 100) / 35;      
      $percentNotaTrab = ($notaTrab * 100) / 25;      
      
      if ($total >= 90) {
        $conceito = 'excelente';
      }
      else {
        if ($total >= 80) {
          $conceito = 'ótimo';
        }
        else {
          if ($total >= 70) {          
            $conceito = 'bom';
          }
          else {
            if ($total >= 60) {
              $conceito = 'ruim';
            }
            else {            
              $conceito = 'péssimo';
              $simNao   = "<span  class='Nao'>".
			                    " NÃO </span>";
            }
          }
        }
      }
      
    ?>   

    <p class="alinhamento">
      <img src='<?php echo $linkImg; ?>' />    
    </p>

    <h2 class="alinhamento">
      DECLARAÇÃO
    </h2>
    
    <p>
      Declaramos, para os devidos fins, que <?php echo $aluno . $simNao; ?> concluiu satisfatoriamente as atividades da disciplina <?php echo $disciplina; ?>
      do curso de <?php echo $curso; ?>.
    </p>
    
    <p>
      Segue o desempenho de <?php echo $aluno; ?>:
    </p>    

    <table>
    
      <tr style='background-color : gray; color : white;'>
        <th>
          Critério
        </th>
        <th>
          Valor total
        </th>
        <th>
          Nota do aluno
        </th>
        <th>
          Desempenho (%)
        </th>
      </tr>
      
      <tr>
        <td>Prova 1</td>
        <td>15</td>
        <td><?php echo number_format($notaVa1, 2, ',', '.'); ?></td>
        <td><?php echo number_format(round($percentNotaVa1), 2, ',', '.'); ?>%</td>
      </tr>

      <tr>
        <td>Prova 2</td>
        <td>25</td>
        <td><?php echo number_format($notaVa2, 2, ',', '.'); ?></td>
        <td><?php echo number_format(round($percentNotaVa2), 2, ',', '.'); ?>%</td>
      </tr>
      
      <tr>
        <td>Prova 3</td>
        <td>35</td>
        <td><?php echo number_format($notaVa3, 2, ',', '.'); ?></td>
        <td><?php echo number_format(round($percentNotaVa3), 2, ',', '.'); ?>%</td>
      </tr>      
      
      <tr>
        <td>Trabalhos</td>
        <td>25</td>
        <td><?php echo number_format($notaTrab, 2, ',', '.'); ?></td>
        <td><?php echo number_format(round($percentNotaTrab), 2, ',', '.'); ?>%</td>
      </tr>      
    </table>

    <p> 
      Com esse resultado, o conceito de <?php echo $aluno; ?> foi <em><?php echo $conceito; ?></em>, já que sua nota total foi de 
      <strong><?php echo $total; ?></strong> pontos.
    </p>
    
    <p class='alinhamento'>
      Belo Horizonte, <?php echo date("d/m/Y"); ?> 
    </p>
    
    <p class='alinhamento'>
      _____________________________________<br />
      <?php echo $professor; ?> - Professor(a)      
    </p>
    
    <p class='alinhamento'>
      _____________________________________<br />    
      <?php echo $coordenador; ?> - Coordenador(a)
    </p>    
  </body>
</html>