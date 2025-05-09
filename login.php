<?php
session_start();
require_once __DIR__ . '/config/db.php';
// Redireciona se já estiver logado
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        $errors[] = 'Preencha todos os campos.';
    } else {
        $stmt = $pdo->prepare('SELECT id, username, password_hash FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Usuário ou senha inválidos.';
        }
    }
}
require_once __DIR__ . '/includes/cabecalho.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <h2 class="mb-4 text-success">Login</h2>
    <?php if ($errors): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form method="post" novalidate>
      <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary-custom">Entrar</button>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/includes/rodape.php'; ?>
