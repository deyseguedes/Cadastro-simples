<link rel="stylesheet" href="css/style.css">

<div class="container">
    <h2>Login</h2>

    <form method="POST" action="index.php?acao=login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <a href="index.php?acao=cadastro">Criar conta</a>
</div>