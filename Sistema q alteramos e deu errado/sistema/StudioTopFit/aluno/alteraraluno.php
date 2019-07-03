<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDIO TOP FIT - Alterar aluno</title>
        <script type="text/javascript" src="/StudioTopFit/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/inputmask.js"></script>
        <script type="text/javascript" src="/StudioTopFit/js/jquery.inputmask.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dao/alunodao.php';
        $alunoDao = new AlunoDao();
        $pessoa = $alunoDao->carregar($_GET['idaluno']);
        $data = $pessoa->getDataNascimento();
        $array = explode("-", $data);
        $dia = $array[2];
        $mes = $array[1];
        $ano = $array[0];
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#telefoneResidencial").inputmask("(99) 9999-9{+}");
                $("#telefoneCelular").inputmask("(99) 9999-9{+}");
                $("#cpf").inputmask("99999999999");
                $("#mes option[value='<?php echo $mes ?>']").attr('selected', 'selected');
                $("#uf option[value='<?php echo $pessoa->getUf(); ?>']").attr('selected', 'selected');
            });
            function habilitaPeso() {
                $("#peso").prop('disabled', !$("#checkpeso").prop("checked"));
            }

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

        </script>

        <link href="/StudioTopFit/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
		<form class="form-horizontal" action="/StudioTopFit/controller/controlleraluno.php?operacao=alterar" method="POST" onsubmit="return validaCampos()">

                <!-- Form Name -->
                <legend>Alterar Aluno</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome:</label>  
                    <div class="col-md-2">
                        <input id="nome" name="nome" maxlength="15" type="text" style="width: 170px;"  value="<?php echo $pessoa->getNome(); ?>" placeholder="Digite seu nome" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="sobrenome">Sobrenome:</label>  
                    <div class="col-md-4">
                        <input id="sobrenome" name="sobrenome" maxlength="45" type="text" style="width: 350px;"  value="<?php echo $pessoa->getSobrenome(); ?>" placeholder="Digite seu sobrenome" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="sexo">Sexo:</label>
                    <div class="col-md-4"> 
                        <label class="radio-inline" for="sexo-0">
                            <input type="radio" name="sexo" id="sexo-0" value="feminino"  <?php if ($pessoa->getSexo() == 'F') { ?> checked="checked"<?php } ?> >
                            Feminino
                        </label> 
                        <label class="radio-inline" for="sexo-1">
                            <input type="radio" name="sexo" id="sexo-1" value="masculino"  <?php if ($pessoa->getSexo() == 'M') { ?> checked="checked"<?php } ?>>
                            Masculino
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="dataNascimento">Data de nascimento:</label>  
                    <div class="form-group">
                        <label class="radio-inline">
                            <input  placeholder="dia" style="width: 65px;" value="<?php echo $dia; ?>" type="number" min="1" max="31" data-ng-maxlength="2" maxlength="2" name="dia" style="width: 50px;" required="" class="form-control input-md">
                        </label>
                        <label class="radio-inline">
                            <select class="form-control" id="mes" required="mês" name="mes" ><option value="" class="">mês</option><option value="01">Janeiro</option><option value="02">Fevereiro</option><option value="03">Março</option><option value="04">Abril</option><option value="05">Maio</option><option value="06">Junho</option><option value="07">Julho</option><option value="08">Agosto</option><option value="09">Setembro</option><option value="10">Outubro</option><option value="11">Novembro</option><option value="12">Dezembro</option></select>
                        </label>
                        <label class="radio-inline">
                            <input placeholder="ano" type="number" min="1900" max="2014" value="<?php echo $ano; ?>" id="aniversarioAno" name="ano" style="width: 80px;" required="" class="form-control input-md">
                        </label>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail:</label>  
                    <div class="col-md-4">
                        <input id="email" name="email" maxlength="100" type="text" value="<?php echo $pessoa->getEmail(); ?>" style="width: 360px;" placeholder="Digite seu e-mail" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="endereco">Endereço</label>  
                    <div class="col-md-4">
                        <input id="endereco" name="endereco" maxlength="80" type="text" style="width: 360px;" value="<?php echo $pessoa->getEndereco(); ?>" placeholder="Digite seu endereço" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
                    <div class="col-md-2">
                        <input id="cidade" name="cidade" maxlength="15" type="text"  style="width: 170px;" value="<?php echo $pessoa->getCidade(); ?>" placeholder="Digite sua cidade" class="form-control input-md" required="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="bairro">Bairro:</label>  
                    <div class="col-md-2">
                        <input id="bairro" name="bairro" maxlength="25" type="text"  style="width: 170px;" placeholder="Digite seu bairro" value="<?php echo $pessoa->getBairro(); ?>" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="uf">UF:</label>
                    <div class="col-md-1">
                        <select required="--" style="width: 71px;" id="uf" name="uf" class="form-control">
                            <option value="" class="">--</option><option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option><option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option><option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option><option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cpf">CPF:</label>  
                    <div class="col-md-2">
                        <input id="cpf" name="cpf" type="text" readonly="true" style="width: 170px;" placeholder="" value="<?php echo $pessoa->getCpf(); ?>" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rg">RG:</label>  
                    <div class="col-md-2">
                        <input id="rg" name="rg"  maxlength="20" type="text" placeholder=""  value="<?php echo $pessoa->getRg(); ?>" style="width: 170px;" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefoneResidencial">Telefone Residencial:</label>  
                    <div class="col-md-2">
                        <input id="telefoneResidencial"  maxlength="15" style="width: 170px;" value="<?php echo $pessoa->getTelefoneResidencial(); ?>" name="telefoneResidencial" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefoneCelular">Telefone Celular:</label>  
                    <div class="col-md-2">
                        <input id="telefoneCelular" maxlength="15" name="telefoneCelular"  style="width: 170px;" value="<?php echo $pessoa->getTelefoneCelular(); ?>" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">Senha:</label>
                    <div class="col-md-2">
                        <input id="senha" name="senha" type="password" maxlength="8" style="width: 170px;" placeholder="Digite sua senha" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmeSenha">Confirme a senha:</label>  
                    <div class="col-md-2">
                        <input id="confirmeSenha" name="confirmeSenha"  maxlength="8" style="width: 170px;" type="password" placeholder="Digite sua senha" class="form-control input-md" required="">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="peso">Peso:</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-addon">     
                                <input id="checkpeso" type="checkbox" <?php if ($pessoa->getPesoInicial_Aluno() != 0) { ?> checked="checked"<?php } ?> onchange="habilitaPeso();">     
                            </span>
                            <input id="peso" name="peso" required="" maxlength="7" <?php if ($pessoa->getPesoInicial_Aluno() != 0) { ?> value="<?php echo $pessoa->getPesoInicial_Aluno(); ?>"<?php } else { ?> disabled <?php } ?> style="width: 125px;" class="form-control" type="text" placeholder="Digite seu peso">
                        </div>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar"></label>
                    <div class="col-md-8">
                        <button id="enviar" type="submit" name="enviar" class="btn btn-success">Enviar</button>
                        <a id="cancelar" name="cancelar" href="alterar.php" class="btn btn-danger">Cancelar</a>

                    </div>
                </div>

            </form>


    </body>
</html>
