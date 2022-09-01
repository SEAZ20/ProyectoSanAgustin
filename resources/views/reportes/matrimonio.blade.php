<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Certificado De Matrimonio</title>
    <link rel="stylesheet" href="estilosactamarimonio/style.css" media="all" />
   
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
      <h2 style="text-align: center">CERTIFICADO DE MATRIMONIO</h2> 
        <section style="font-family: Sans-serif">
           
            @foreach ($novios->novios_sacramento as $no_sacra) 
            <div id="seccion" >
                
                En la iglesia de SAN AGUSTÍN, 
                el día {{$no_sacra->dia_ma}} del mes de {{$no_sacra->mes_ma}} de {{$no_sacra->anio_ma}}, cumplido los
                requisitos canónicos el suscrito Párroco/encargado, presenció y bendijo al matrimonio eclesiástico del señor
               {{$novios->nombres_novio}} {{$novios->apellidos_novio}}
                hijo de {{$padres->nombres_p_novio}} {{$padres->apellidos_p_novio}} y {{$padres->nombres_m_novio}} {{$padres->apellidos_m_novio}};  
                y de la señora {{$novios->nombres_novia}} {{$novios->apellidos_novia}} hija de 
                {{$padres->nombres_p_novia}} {{$padres->apellidos_p_novia}} y {{$padres->nombres_m_novia}} {{$padres->apellidos_m_novia}}. 
                <?php  $no2=1; ?>
                Fueron testigos por parte del novio : @foreach ($testigos_novio as $item) 
                    {{$item->nombres_testigo}} {{$item->apellidos_testigo}}@if($no2 == $numtnobvio).@else,@endif
                    <?php  $no2++; ?>
                    @endforeach 
               
                <?php  $no=1; ?>
                Fueron testigos por parte de la novia : @foreach ($testigos_novia as $item) 
                  {{$item->nombres_testigo}} {{$item->apellidos_testigo}}@if($no == $numtnobvia).@else,@endif
                  <?php  $no++; ?>
                  @endforeach 
                
            </div>
            <div id ="otraseccion" >

                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registro Eclesíastico</strong></label>
                <br>
                <label>Año : <strong>{{$no_sacra->ecle_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$no_sacra->ecle_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$no_sacra->ecle_pagina}}</strong></label>
                <br>
                <label>Número : <strong>{{$no_sacra->ecle_no}}</strong></label>
                <hr class="rounded" style="color: #7E418F ">
                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Registro Civil</strong></label>
                <br>
                <label>Año : <strong>{{$no_sacra->civil_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$no_sacra->civil_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$no_sacra->civil_pagina}}</strong></label>
                <br>
                <label>No. de acta : <strong>{{$no_sacra->civil_no}}</strong></label>
                <br>
                <label>Ciudad :<strong style="font-size: 9px"> {{$no_sacra->civil_ciudad}}</strong></label>
            </div>
            @endforeach
            
        </section>
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
            <br><br><br><br><br><br>
            <div id="notices">
                <div>Firma de la partida</div> 
            </div>
        <br>
        <br>
        <br>
        <br>
        <br><br>
            
            <div style="text-align: center">
                <strong>LO CERTIFICO</strong>
                <br><br><br><br>
                <label>-------------------------------</label>
                <br>
                <strong>EL PÁRROCO</strong>
            </div>
            <br>
            
    </main>
    <footer>
      <?php
            date_default_timezone_set('America/Guayaquil');
            $mes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            $dia=date("d");
            $nummes=date("n");
            $anio=date("Y");
            ?>
            <div style="font-size: 12px">
                <strong>Es copia fiel de la Partida Original &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>
                <strong>Calceta, {{$dia}} de {{$mes[$nummes-1]}} {{$anio}}</strong></div>  
            </div>
    </footer>
  </body>

 
</html>