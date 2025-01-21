@extends('plantilla')
@section('contenido')
<div class="row top_tiles">
    <a href="/user" class="stretched-link ">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
        <div class="tile-stats ">
          <div class="icon"style="color: rgb(229 ,214, 26)">
            <i class="fa fa-user"></i>
          </div>
          <div class="count ">{{$usuarios}}</div>
          <h3>USUARIOS</h3>
          <p>con acceso al sistema</p>
        </div>
      </div>
    </a>
    <a href="/mante" class="stretched-link">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"style="color: rgb(225,67 ,67)"><i class="fa fa-cog"></i>
          </div>
          <div class="count">{{$mantenimientos}}</div>
          <h3>SOPORTE</h3>
          <p>el dia de hoy <?php echo date('d-m-Y')?> </p>
        </div>
      </div>
    </a>
    <a href="/equipos" class="stretched-link">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon" style="color: rgb(25, 158, 25)"><i class="fa fa-desktop"></i>
          </div>
          <div class="count">{{$equipos}}</div>
          <h3>EQUIPOS</h3>
          <p>generales registrados</p>
        </div>
      </div>
    </a>
    <a href="/personal" class="stretched-link">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon" style="color: rgb(25, 105, 158)"><i class="fa fa-users"></i>
          </div>
          <div class="count">{{$personal}}</div>
          <h3>PERSONAL</h3>
          <p>registrado</p>
        </div>
      </div>
    </a>
</div>
<div class="container mt-5">
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Gráfico de Mantenimiento: Computadoras e Impresoras
        </div>
        <div class="card-body" style="height: 400px;">
          <canvas id="maintenanceChart"></canvas> <!-- Lienzo del gráfico -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Contexto del canvas
    var ctx = document.getElementById('maintenanceChart').getContext('2d');
    var cantidadmes = @json($cantidadmes);
    // Crear el gráfico
    var maintenanceChart = new Chart(ctx, {
      type: 'line', // Tipo de gráfico: línea
      data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'], // Etiquetas (meses del año)
        datasets: [
          {
            label: 'Mantenimientos', // Nombre de la línea para las computadoras
            data:cantidadmes  , // Datos de mantenimiento de computadoras para cada mes
            borderColor: 'rgba(54, 162, 235, 1)', // Color de la línea para computadoras
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Fondo transparente para la línea de computadoras
            fill: true, // Rellenar el área debajo de la línea
            tension: 0.4, // Curvatura de la línea
            borderWidth: 2 // Ancho del borde de la línea
          }
        ]
      },
      options: {
        responsive: true, // Gráfico responsivo
        maintainAspectRatio: false, // Mantener el aspecto del gráfico
        scales: {
          y: {
            beginAtZero: true, // Empieza el eje Y en 0
            ticks: {
              stepSize: 2, // Ahora las marcas se mostrarán de 2 en 2
            }
          }
        },
        plugins: {
          legend: {
            position: 'top', // Ubicación de la leyenda
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' mantenimientos';
              }
            }
          }
        }
      }
    });
  });
</script>
@endsection