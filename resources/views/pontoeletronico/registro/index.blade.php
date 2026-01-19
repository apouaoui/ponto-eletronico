@extends('pontoeletronico.admin')

@section('conteudo')

<?php

$dia_da_semana[0] = 'Domingo';
$dia_da_semana[1] = 'Segunda-feira';
$dia_da_semana[2] = 'Terça-feira';
$dia_da_semana[3] = 'Quarta-feira';
$dia_da_semana[4] = 'Quinta-feira';
$dia_da_semana[5] = 'Sexta-feira';
$dia_da_semana[6] = 'Sábado';

$mes[1] = 'Janeiro';
$mes[2] = 'Fevereiro';
$mes[3] = 'Março';
$mes[4] = 'Abril';
$mes[5] = 'Maio';
$mes[6] = 'Junho';
$mes[7] = 'Julho';
$mes[8] = 'Agosto';
$mes[9] = 'Setembro';
$mes[10] = 'Outubro';
$mes[11] = 'Novembro';
$mes[12] = 'Dezembro';

$dia_extenso = $dia_da_semana[Date('w')];
$mes_extenso = $mes[Date('n')];
?>
<section class="content">

    <div class="row">
        <div class="col-md-12">

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ utf8_decode(Session::get('login.ponto.usuario_nome')) }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fas fa-user-tie margin-r-5"></i> Cargo:</strong> {{ $usuario->cargo }} <br>
              <strong><i class="fas fa-map-marker-alt margin-r-5"></i> Local:</strong> {{ $usuario->local }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile text-center">
              
              <i class="far fa-clock fa-5x"></i>

              <h3 class="profile-username text-center" id="data-completa"></h3>

              <p class="text-muted text-center" style='font-size: 50px;' id="relogio-tempo-real"></p>

              <div class="row">
                  <div class='col-md-6 col-xs-6'>
                      <form method="post" action="registrar" name="form-entrada" onsubmit="atualizarHoraFormulario(this)">
                          {{ csrf_field() }}
                          <input type="hidden" name="area" value="entrada">
                          <input type="hidden" name="hora" id="hora-entrada">
                          <input type='submit' value='ENTRADA' class="btn btn-success" style="width: 100%;">
                      </form>
                  </div>
                  <div class='col-md-6 col-xs-6'>
                      <form method="post" action="registrar" name="form-saida" onsubmit="atualizarHoraFormulario(this)">
                          {{ csrf_field() }}
                          <input type="hidden" name="area" value="saida">
                          <input type="hidden" name="hora" id="hora-saida">
                          <input type='submit' value='SAÍDA' class="btn btn-danger" style="width: 100%;">
                      </form>
                  </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-6">
 
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Acompanhamento da Jornada</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped text-center">
                        <tbody>
                            <tr>
                                <th style="width: 50%">ENTRADA</th>
                                <th style="width: 50%">SAÍDA</th>
                            </tr>
                            @foreach($registros as $registro)
                            <tr>
                                <td>{{ $registro->entrada }}</td>
                                <td>{{ $registro->saida }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>            



            
            
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

<script>
// Arrays para nomes de dias e meses
var diasDaSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

// Função para formatar número com 2 dígitos
function pad(num) {
    return num < 10 ? '0' + num : num;
}

// Função para atualizar o relógio e data em tempo real
function atualizarRelogio() {
    var agora = new Date();
    
    // Atualiza horário com segundos
    var horas = pad(agora.getHours());
    var minutos = pad(agora.getMinutes());
    var segundos = pad(agora.getSeconds());
    document.getElementById('relogio-tempo-real').innerHTML = horas + ':' + minutos + ':' + segundos;
    
    // Atualiza data completa
    var diaSemana = diasDaSemana[agora.getDay()];
    var dia = pad(agora.getDate());
    var mes = meses[agora.getMonth()];
    var ano = agora.getFullYear();
    document.getElementById('data-completa').innerHTML = diaSemana + ', ' + dia + ' de ' + mes + ' de ' + ano;
}

// Função para capturar a hora exata no momento do clique
function atualizarHoraFormulario(form) {
    var agora = new Date();
    var horas = pad(agora.getHours());
    var minutos = pad(agora.getMinutes());
    var segundos = pad(agora.getSeconds());
    
    // Pega o campo hora do formulário que foi submetido
    var campoHora = form.querySelector('input[name="hora"]');
    campoHora.value = horas + ':' + minutos + ':' + segundos;
    
    return true; // Permite o envio do formulário
}

// Atualiza o relógio a cada segundo
setInterval(atualizarRelogio, 1000);

// Atualiza imediatamente ao carregar a página
atualizarRelogio();
</script>

@endsection