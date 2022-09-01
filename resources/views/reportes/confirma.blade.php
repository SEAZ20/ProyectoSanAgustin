<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Certificado De Confirmación</title>
    <link rel="stylesheet" href="estiloactasconfirma/style.css" media="all" />
   
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
      <h2 style="text-align: center">CERTIFICADO DE CONFIRMACIÓN</h2> 
        <section style="font-family: Sans-serif">
           
            @foreach ($persona->persona_sacramentoconfirma as $per_sacraconf) 
            <div id="seccion" >
                 En la iglesia de SAN AGUSTÍN,
                el día {{$per_sacraconf->dia_con}} del mes de {{$per_sacraconf->mes_con}} de {{$per_sacraconf->anio_con}},
                confirmé solemnemente a {{$persona->nombres}} {{$persona->apellidos}}, 
                bautizado (a) en {{$per_sacraconf->ciudad_sa}}, 
                el día {{$per_sacraconf->dia_sa}} del mes de {{$per_sacraconf->mes_sa}} de {{$per_sacraconf->anio_sa}}, 
                hijo (a) de {{$padres->nombres_p}} {{$padres->apellidos_p}} y {{$padres->nombres_m}} {{$padres->apellidos_m}}. 
                <?php  $no=1; ?>
                Fueron padrinos : @foreach ($padrinos as $item) 
                    {{$item->nombre_padrino}} {{$item->apellidos_padrino}}@if($no == $numpa).@else,@endif
                    <?php  $no++; ?>
                    @endforeach 
                </label> 
                <label>Obispo que confirmó: {{$per_sacraconf->obispo_confirma}}</label> 
            </div>
            <div id ="otraseccion" >

                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registro Eclesíastico</strong></label>
                <br>
                <label>Año : <strong>{{$per_sacraconf->ecle_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$per_sacraconf->ecle_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$per_sacraconf->ecle_pagina}}</strong></label>
                <br>
                <label>Número : <strong>{{$per_sacraconf->ecle_no}}</strong></label>
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
            <br>
            <br>
            <div id="notices">
                <div><strong>Nota Marginal:</strong> {{$per_sacraconf->nota}}</div>
                
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
