<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Cadastrar funcionário</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-reboot.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#telefoneResidencial").inputmask("(99) 9999-9{+}");
                $("#telefoneCelular").inputmask("(99) 9999-9{+}");
                $("#cpf").inputmask("99999999999");
            });
            function validaCampos() {
                var senha = document.getElementById("senha").value;
                var confirmeSenha = document.getElementById("confirmeSenha").value;
                if (senha != confirmeSenha) {
                    alert("As senhas não conferem");
                    return false;
                }
                var email = document.getElementById("email").value;
                er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
                if (!er.exec(email)) {
                    alert("O e-mail não é válido")
                    return false;
                }
                var cpf = document.getElementById("cpf").value;
                var qtnCPF = document.getElementById("cpf").value.split("_").join("").length;
                if (qtnCPF != 11 || !valida_cpf(cpf)) {
                    alert("O CPF não é válido")
                    return false;
                }

                return true;
            }

            function valida_cpf(cpf) {
                var numeros, digitos, soma, i, resultado, digitos_iguais;
                digitos_iguais = 1;
                if (cpf.length < 11)
                    return false;
                for (i = 0; i < cpf.length - 1; i++)
                    if (cpf.charAt(i) != cpf.charAt(i + 1))
                    {
                        digitos_iguais = 0;
                        break;
                    }
                if (!digitos_iguais)
                {
                    numeros = cpf.substring(0, 9);
                    digitos = cpf.substring(9);
                    soma = 0;
                    for (i = 10; i > 1; i--)
                        soma += numeros.charAt(10 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(0))
                        return false;
                    numeros = cpf.substring(0, 10);
                    soma = 0;
                    for (i = 11; i > 1; i--)
                        soma += numeros.charAt(11 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(1))
                        return false;
                    return true;
                }
                else
                    return false;
            }
        //campos dinamicos
            $(function () {
                var scntDiv = $('#dynamicDiv');
                $(document).on('click', '#addInput', function () {
                    $('<p>'+
                        '<input type="text" name="curso[]" id="inputeste" size="20" value="" placeholder="" /> '+
                        '<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
                            '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                            'Remover curso'+
                        '</a>'+
                    '</p>').appendTo(scntDiv);
                    return false;
                });
                $(document).on('click', '#remInput', function () {
                    $(this).parents('p').remove();
                    return false;
                });
            });
        </script>

        <link href="/StudioTopFit/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="container mb-5">
            <form class="form-horizontal row" action="/controller/controllerfuncionario.php?operacao=salvar" method="POST" onsubmit="return validaCampos()">
                <!-- Form Name -->
                <legend>Cadastrar Funcionário</legend>
                <!-- Text input-->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="nome">Nome:</label>  
                        <input id="nome" name="nome" maxlength="15" type="text" placeholder="Digite seu nome" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="sobrenome">Sobrenome:</label>  
                        <input id="sobrenome" name="sobrenome" maxlength="45" type="text" placeholder="Digite seu sobrenome" class="form-control input-md" required="">
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="control-label" for="sexo">Sexo:</label>
                        <label class="radio-inline" for="sexo-0">
                            <input type="radio" name="sexo" id="sexo-0" value="feminino" checked="checked">
                            Feminino
                        </label> 
                        <label class="radio-inline" for="sexo-1">
                            <input type="radio" name="sexo" id="sexo-1" value="masculino">
                            Masculino
                        </label>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="cargo">Cargo:</label>
                        <input id="cargo" name="cargo" type="text" maxlength="30" placeholder="Digite seu cargo" class="form-control input-md" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="dataNascimento">Data de nascimento:</label>  
                        <div class="form-group">
                            <label class="radio-inline">
                                <input  placeholder="dia" type="number" min="1" max="31" data-ng-maxlength="2" maxlength="2" name="dia" required="" class="form-control input-md">
                            </label>
                            <label class="radio-inline">
                                <select class="form-control" required="mês" name="mes" ><option value="" class="">mês</option><option value="01">Janeiro</option><option value="02">Fevereiro</option><option value="03">Março</option><option value="04">Abril</option><option value="05">Maio</option><option value="06">Junho</option><option value="07">Julho</option><option value="08">Agosto</option><option value="09">Setembro</option><option value="10">Outubro</option><option value="11">Novembro</option><option value="12">Dezembro</option></select>
                            </label>
                            <label class="radio-inline">
                                <input placeholder="ano" type="number" min="1900" max="2014" id="aniversarioAno" name="ano" style="width: 80px;" required="" class="form-control input-md">
                            </label>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="email">E-mail:</label>  
                            <input id="email" name="email" maxlength="100" type="text" placeholder="Digite seu e-mail" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="endereco">Endereço</label> 
                        <input id="endereco" name="endereco" maxlength="80" type="text" placeholder="Digite seu endereço" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="cidade">Cidade:</label>  
                        <input id="cidade" name="cidade" maxlength="15" type="text" placeholder="Digite sua cidade" class="form-control input-md" required="">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="bairro">Bairro:</label>  
                        <input id="bairro" name="bairro" maxlength="25" type="text" placeholder="Digite seu bairro" class="form-control input-md" required="">
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="control-label" for="uf">UF:</label>
                        <select required="--" id="uf" name="uf" class="form-control">
                            <option value="" class="">--</option><option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option><option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option><option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option><option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="cpf">CPF:</label>  
                        <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="rg">RG:</label>  
                        <input id="rg" name="rg"  maxlength="20" type="text" placeholder="" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="telefoneResidencial">Telefone Residencial:</label>
                        <input id="telefoneResidencial"  maxlength="15" name="telefoneResidencial" type="text" placeholder="" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="telefoneCelular">Telefone Celular:</label>  
                        <input id="telefoneCelular" maxlength="15" name="telefoneCelular" type="text" placeholder="" class="form-control input-md" required="">
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="control-label" for="senha">Senha:</label>
                        <input id="senha" name="senha" type="password" maxlength="8" placeholder="Digite sua senha" class="form-control input-md" required="">
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="confirmeSenha">Confirme a senha:</label>
                        <input id="confirmeSenha" name="confirmeSenha"  maxlength="8" type="password" placeholder="Digite sua senha" class="form-control input-md" required="">
                    </div>
                    <!-- SALARIO-->
                    <div class="form-group">
                        <label class="control-label">Salário:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="number" step="500.00" class="form-control" id="salario" placeholder="Digite o valor" name="salario" required="">
                        </div>  
                    </div>  
                    <!-- é professor  -->
                    <div class="form-group">
                        <label class="control-label" for="prof">É um professor:</label>
                        <label class="radio-inline" for="prof-1">
                            <input type="radio" name="prof" id="prof-1" value="sim" >
                            Sim
                        </label> 
                        <label class="radio-inline" for="prof-0">
                            <input type="radio" name="prof" id="prof-0" value="nao" checked="checked">
                            Não
                        </label>
                    </div>
                    <!-- campo dinamico --> 
                    <div class="form-group">
                        <label class="control-label" for="prof">Adicionar cursos, caso seja um professor:</label> 
                        <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Adicionar Curso 
                        </a>
                        <br/>
                        <div id="dynamicDiv">
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="col-12 d-flex flex-wrap justify-content-end">
                    <button id="enviar" type="submit" name="enviar" class="btn btn-success mr-2">Enviar</button>
                    <button id="limpar" name="limpar" type="reset" class="btn btn-warning">Limpar</button>
                </div>
                

            </form>


        </div>


    </body>
</html>