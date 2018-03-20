
<?php
$titulo = "Usúarios";
include 'cabecalho.php';?>
<h1>Alterar senha</h1>
<html>
<head>
<title>Mudar Senha</title>
</head>
<body>

<form class="form-inline" action="mudar-senha.php" method="get">

<table border="0" width="100%">
<tr>
<td>Login:</td>
<td><input type="text" name="email" id="email">
</td>
</tr>
<tr>
<td>Senha Antiga:</td>
<td><input type="password" name="senha" id="senha">
</td>
</tr>
<tr>
<td>Nova Senha:</td>
<td><input type="password" name="nsenha" id="nsenha">
</td>
</tr>
<tr>
<td>E-mail:</td>
<td><input type="text" name="email" id="email">
</td>
</tr>

<tr>
<td></td>
<td><input name="submit" type="submit" value="Mudar Senha"></td>
</tr>
</table>

</form>
</body>
</html>
<?php include 'rodape.php';?>