<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Certificado De Bautizo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilosactas/style.css" media="all" />
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
      <h2 style="text-align: center">CERTIFICADO DE BAUTIZO</h2> 
        <section style="font-family: Sans-serif">
            
            @foreach ($persona->persona_sacramentobautizo as $per_sacrabau) 
            <div id="seccion" >
                
                En la iglesia de SAN AGUSTÍN
                el día {{$per_sacrabau->dia_sa}} del mes de {{$per_sacrabau->mes_sa}} de {{$per_sacrabau->anio_sa}},
                el sacerdote {{$per_sacrabau->parroco}}, </el>
                bautizó solemnemente a {{$persona->nombres}} {{$persona->apellidos}},
                nacido (a) en {{$per_sacrabau->ciudad_nac}}, 
                el día {{$per_sacrabau->dia_nac}} del mes de {{$per_sacrabau->mes_nac}} de {{$per_sacrabau->anio_nac}}, 
                hijo (a) de {{$padres->nombres_p}} {{$padres->apellidos_p}} y {{$padres->nombres_m}} {{$padres->apellidos_m}}. 
                <?php  $no=1; ?>
                Fueron padrinos : @foreach ($padrinos as $item) 
                    {{$item->nombre_padrino}} {{$item->apellidos_padrino}}@if($no == $numpa).@else,@endif
                    <?php  $no++; ?>
                    @endforeach 
            </div>
            <div id ="otraseccion" >

                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registro Eclesíastico</strong></label>
                <br>
                <label>Año : <strong>{{$per_sacrabau->ecle_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$per_sacrabau->ecle_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$per_sacrabau->ecle_pagina}}</strong></label>
                <br>
                <label>Número : <strong>{{$per_sacrabau->ecle_no}}</strong></label>
                <hr class="rounded" style="color: #7E418F ">
                <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Registro Civil</strong></label>
                <br>
                <label>Año : <strong>{{$per_sacrabau->civil_anio}}</strong></label>
                <br>
                <label>Tomo : <strong>{{$per_sacrabau->civil_tomo}}</strong></label>
                <br>
                <label>Página : <strong>{{$per_sacrabau->civil_pagina}}</strong></label>
                <br>
                <label>No. de acta : <strong>{{$per_sacrabau->civil_no}}</strong></label>
                <br>
                <label>Parroquia :<strong style="font-size: 9px"> {{$per_sacrabau->civil_parroquia}}</strong></label>
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
                <div><strong>Nota Marginal : </strong>{{$per_sacrabau->nota}}</div>
                
            </div>
            <br>
            
            <div style="text-align: center">
                <strong>LO CERTIFICO</strong>
                <br><br><br>
                <label>----------------------------</label>
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
            <div style="font-size: 12px ;border-bottom: 1px solid #7E418F ;padding-bottom:3px">
                <strong>Es copia fiel de la Partida Original &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>
                <strong>Calceta, {{$dia}} de {{$mes[$nummes-1]}} {{$anio}}</strong></div>  
            </div>
        </section>
    </main>
    
  </body>

 
</html>