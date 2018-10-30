<?php
include("include/header.php");
include("include/nav.php");
require_once 'consulta-grafico-sql.php';

?>
<div id="chart" class="container" style="height: 250px;"></div>
<script>


 new Morris.Line({
  element: 'chart',
  data: [<?php
  $total = $stmt->rowCount();
  $contador = 1;
    while($rega = $stmt->fetch(PDO::FETCH_ASSOC)):
    if ($contador != $total){?>
      { dt: '<?php echo $rega['x'];?>', hr: "<?php echo $rega['y'];?>"},
    <?php }else{ ?>
      { dt:'<?php echo $rega["x"];?>', hr: "<?php echo $rega['y'];?>"}
      <?php
      }
      $contador++;
    endwhile; ?>
  ],
  lineColors: ['#819C79'],
  xkey: 'dt',
  ykeys: ['hr'],
  labels: ['Hora'],
  xLabels: 'day',
  xLabelAngle: 45,
  xLabelFormat: function (d) {

    return  ("0" + (d.getDate())).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
  },
  resize: true
});




</script>







<?php include("include/footer.php");?>
