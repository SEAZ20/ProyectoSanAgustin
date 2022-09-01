<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Certificado De Comunión</title>
    <link rel="stylesheet" href="estiloactascomunion/style.css" media="all" />
   
  </head>
  <body>
    <header class="clearfix">
       
      <div id="logo">
        <img src="estilosactas/logo1.jpg">
      </div>
      <div id="company">
        <h2 class="name">Arquidicésis de Portoviejo</h2>
        <div>Ministerio Parroquial</div>
        <div>Parroquia San Agustín</div>
        <div>Calceta - Manabí - Ecuador</div>
      </div>
      
    </header>
    <main>
      <h2 style="text-align: center">CERTIFICADO DE COMUNIÓN</h2> 
        <section style="font-family: Sans-serif">
            @foreach ($persona->persona_sacramentocomunion as $per_sacracomu) 
            <div id="seccion" > 
                En la iglesia de SAN AGUSTÍN 
                  el día {{$per_sacracomu->dia_co}} del mes de {{$per_sacracomu->mes_co}} de {{$per_sacracomu->anio_co}},
                el sacerdote {{$per_sacracomu->parroco_comunion}}, 
                entregó la comunión solemnemente a {{$persona->nombres}} {{$persona->apellidos}}, 
                bautizado (a) en {{$per_sacracomu->ciudad_sa}}, 
                el día {{$per_sacracomu->dia_sa}} del mes de {{$per_sacracomu->mes_sa}} de {{$per_sacracomu->anio_sa}},
                hijo (a) de {{$padres->nombres_p}} {{$padres->apellidos_p}} y {{$padres->nombres_m}} {{$padres->apellidos_m}}. </label>
                <?php  $no=1; ?>
               Fueron padrinos : @foreach ($padrinos as $item) 
                    {{$item->nombre_padrino}} {{$item->apellidos_padrino}}@if($no == $numpa).@else,@endif
                    <?php  $no++; ?>
                    @endforeach 
                 
            </div>
            <div id ="otraseccion" >

                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registro Eclesíastico</strong></label>
                <br>
                <label>Año : <strong>{{$per_sacracomu->ecle_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$per_sacracomu->ecle_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$per_sacracomu->ecle_pagina}}</strong></label>
                <br>
                <label>Número : <strong>{{$per_sacracomu->ecle_no}}</strong></label>
            </div>
            @endforeach
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="notices">
                <div><strong>Nota Marginal:</strong> {{$per_sacracomu->nota}}</div>
                
            </div>
            <br>
            <br>
            <div style="text-align: center">
                <strong>LO CERTIFICO</strong>
                <br><br><br>
                <label>-----------------------</label>
                <br>
                <strong>EL PÁRROCO</strong>
            </div>
            
            <?php
            date_default_timezone_set('America/Guayaquil');
            $mes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            $dia=date("d");
            $nummes=date("n");
            $anio=date("Y");
            ?>
            <div style="font-size: 12px; border-bottom: 1px solid #7E418F ;padding-bottom:3px">
                <strong>Es copia fiel de la Partida Original &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>
                <strong>Calceta, {{$dia}} de {{$mes[$nummes-1]}} {{$anio}}</strong></div>  
            </div>
        </section>
    </main>
  </body>

 
</html>