<!-- Mensagem de Exclusao -->
<?php
if (isset($_SESSION['exclusao_user'])) :
?>
    <div id="msg_alert" class="animated bg-success">
        <span style="font-weight: bold">Usuario removido com sucesso</span>
    </div>
<?php
endif;
unset($_SESSION['exclusao_user']);
?>
<!-- Fim Mensagem de Exclusao -->
<!-- Mensagem de alteracao usuario erro -->
<?php
if (isset($_SESSION['erro_alteracao'])) :
?>
    <div id="msg_alert" class="animated bg-danger">
        <span style="font-weight: bold">Erro na alteração.</br>Email/Usuario pertence a outra conta</span>
    </div>
<?php
endif;
unset($_SESSION['erro_alteracao']);
?>
<!-- Fim Mensagem de alteracao usuario erro -->
<!-- Mensagem de alteracao usuario -->
<?php
if (isset($_SESSION['sucesso_alteracao'])) :
?>
    <div id="msg_alert" class="animated bg-success">
        <span style="font-weight: bold">Usuario alterado.</span>
    </div>
<?php
endif;
unset($_SESSION['sucesso_alteracao']);
?>
<!-- Fim Mensagem de alteracao usuario -->
<!-- Mensagem de Master Unico -->
<?php
if (isset($_SESSION['master_Unico'])) :
?>
    <div id="msg_alert" class="animated bg-danger">
        <span style="font-weight: bold">Alteração Negada.</br>É necessário no minimo</br>um usuario MASTER.</span>
    </div>
<?php
endif;
unset($_SESSION['master_Unico']);
?>
<!-- Fim Mensagem de Master Unico -->
<!-- Mensagem de nivel usuario -->
<?php
if (isset($_SESSION['nivel_usr'])) :
?>
    <div id="msg_alert" class="animated bg-success">
        <span style="font-weight: bold">Nivel de usuario alterado.</span>
    </div>
<?php
endif;
unset($_SESSION['nivel_usr']);
?>
<!-- Fim Mensagem de nivel usuario -->
<!-- Mensagem de usuario existente -->
<?php
if (isset($_SESSION['add_user'])) :
?>
    <div id="msg_alert" class="animated bg-success" style="text-align: center; padding:15px 0px; position: absolute; width: 100%; z-index: 100; left: 0px;">
        <span style="font-weight: bold">Usuario cadastrado com Sucesso.</span>
    </div>
<?php
endif;
unset($_SESSION['add_user']);
?>
<!-- Fim Mensagem de usuario existente -->

<!-- Mensagem de usuario existente -->
<?php
if (isset($_SESSION['err_add_user'])) :
?>
    <div id="msg_alert" class="animated bg-danger" style="text-align: center; padding:15px 0px; position: absolute; width: 100%; z-index: 100; left: 0px;">
        <span style="font-weight: bold">Ocorreu um erro ao criar usuario.</br>Favor entre em contato com o desenvolvedor</span>
    </div>
<?php
endif;
unset($_SESSION['err_add_user']);
?>
<!-- Fim Mensagem de usuario existente -->

<!-- Mensagem de usuario existente -->
<?php
if (isset($_SESSION['have_user'])) :
?>
    <div id="msg_alert" class="animated bg-danger" style="text-align: center; padding:15px 0px; position: absolute; width: 100%; z-index: 100; left: 0px;">
        <span style="font-weight: bold">Usuario e/ou E-mail ja possui cadastro.</br>Verifique os dados inseridos e tente novamente</span>
    </div>
<?php
endif;
unset($_SESSION['have_user']);
?>
<!-- Fim Mensagem de usuario existente -->
<!-- Mensagem de Email incorreto -->
<?php
if (isset($_SESSION['err_email'])) :
?>
    <div id="msg_alert" class="animated bg-danger" style="text-align: center; padding:15px 0px; position: absolute; width: 100%; z-index: 100; left: 0px;">
        <span style="font-weight: bold">Email incorreto.</br>Verifique e tente novamente</span>
    </div>
<?php
endif;
unset($_SESSION['err_email']);
?>
<!-- Fim Mensagem de Email incorreto -->

<!-- SING-UP -->

<!-- Mensagem de Fim de sessao -->
<?php
if (isset($_SESSION['company_has_account'])) :
?>
    <div class="animated bg-danger" style="text-align: center; margin-top: 10px; padding:15px 0px; top: 100px;
    left: 0px; width: 100%;">
        <span style="font-weight: bold">Empresa ja cadastrada</br>Solicite seu usuario para o administrador da empresa</span>
    </div>
<?php
endif;
unset($_SESSION['company_has_account']);
?>
<!-- Fim Mensagem de Fim de sessao -->
<!-- Mensagem de Fim de sessao -->
<?php
if (isset($_SESSION['have_user_new'])) :
?>
    <div class="animated bg-danger" style="text-align: center; margin-top: 10px; padding:15px 0px; top: 100px;
    left: 0px; width: 100%;">
        <span style="font-weight: bold">Usuario e/ou E-mail ja possui cadastro.</br>Verifique os dados inseridos e tente novamente</span>
    </div>
<?php
endif;
unset($_SESSION['have_user_new']);
?>
<!-- Fim Mensagem de Fim de sessao -->
<!-- Mensagem de Email incorreto -->
<?php
if (isset($_SESSION['err_email_new'])) :
?>
    <div class="animated bg-danger" style="text-align: center; margin-top: 10px; padding:15px 0px; top: 100px; left: 0px; width: 100%;">
        <span style="font-weight: bold">Email incorreto.</br>Verifique e tente novamente</span>
    </div>
<?php
endif;
unset($_SESSION['err_email_new']);
?>
<!-- Fim Mensagem de Email incorreto -->
<!-- Mensagem de Fim de sessao -->
<?php
if (isset($_SESSION['no_sessiontime'])) :
?>
    <div class="bg-warning" style="text-align: center; margin-top: 10px; padding:15px 0px">
        <span style="font-weight: bold">Warning: Sessão expirada, faça login novamente.</span>
    </div>
<?php
endif;
unset($_SESSION['no_sessiontime']);
?>
<!-- Fim Mensagem de Fim de sessao -->
<!-- Mensagem de Master Unico -->
<?php
if (isset($_SESSION['err_add_item'])) :
?>
    <div id="msg_alert" class="animated bg-danger">
        <span style="font-weight: bold">Ja possui cadastro desse item</br>Se necessário entre em contato</br>com o desenvolvedor.</span>
    </div>
<?php
endif;
unset($_SESSION['err_add_item']);
?>
<!-- Fim Mensagem de Master Unico -->
<!-- Mensagem de Master Unico -->
<?php
if (isset($_SESSION['add_item'])) :
?>
    <div id="msg_alert" class="animated bg-success">
        <span style="font-weight: bold">Cadastro realizado.</span>
    </div>
<?php
endif;
unset($_SESSION['add_item']);
?>
<!-- Fim Mensagem de Master Unico -->
<!-- Mensagem de erro -->
<?php
if (isset($_SESSION['login_wrong'])) :
?>
    <div class="bg-danger" style="text-align: center; margin-top: 10px; padding:15px 0px">
        <span style="font-weight: bold">ERROR: Usuário ou senha inválidos.</span>
    </div>
<?php
endif;
unset($_SESSION['login_wrong']);
?>
<!-- Fim Mensagem erro -->