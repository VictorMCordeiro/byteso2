<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monte seu PC</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Cores inspiradas na Pichau */
    :root {
      --pichau-orange: #f7941d;
      --pichau-dark: #1f1f1f;
    }
    body {
      background-color: #f5f5f5;
    }
    .nav-pills .nav-link {
      color: var(--pichau-dark);
      margin-bottom: .5rem;
      border-radius: .25rem;
    }
    .nav-pills .nav-link.active {
      background-color: var(--pichau-orange);
      color: #fff;
    }
    .card-header {
      background-color: var(--pichau-dark);
      color: #fff;
    }
    .card {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h1 class="mb-4 text-center">Monte seu PC</h1>
  <div class="row">
    <!-- Sidebar com as categorias -->
    <div class="col-lg-3">
      <ul class="nav nav-pills flex-column" id="pc-builder-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="processador-tab" data-bs-toggle="pill" href="#processador" role="tab">Processador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="placa-mae-tab" data-bs-toggle="pill" href="#placa-mae" role="tab">Placa-mãe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="ram-tab" data-bs-toggle="pill" href="#ram" role="tab">Memória RAM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="gpu-tab" data-bs-toggle="pill" href="#gpu" role="tab">Placa de Vídeo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="armazenamento-tab" data-bs-toggle="pill" href="#armazenamento" role="tab">HD / SSD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="gabinete-tab" data-bs-toggle="pill" href="#gabinete" role="tab">Gabinete</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="fonte-tab" data-bs-toggle="pill" href="#fonte" role="tab">Fonte de Alimentação</a>
        </li>
      </ul>
    </div>

    <!-- Área de conteúdo dos componentes -->
    <div class="col-lg-9">
      <div class="tab-content" id="pc-builder-content">

        <!-- Processador -->
        <div class="tab-pane fade show active" id="processador" role="tabpanel">
          <h3>Processador</h3>
          <div class="row">
            <!-- Exemplo de card de produto -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Intel Core i5-12400F</div>
                <div class="card-body">
                  <p>6 núcleos / 12 threads<br>Base 2.5 GHz / Turbo 4.4 GHz</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
            <!-- Adicione mais cards conforme necessário -->
          </div>
        </div>

        <!-- Placa-mãe -->
        <div class="tab-pane fade" id="placa-mae" role="tabpanel">
          <h3>Placa-mãe</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">ASUS TUF Gaming B660M-PLUS</div>
                <div class="card-body">
                  <p>Socket LGA1700<br>DDR4 / M.2 / HDMI</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Memória RAM -->
        <div class="tab-pane fade" id="ram" role="tabpanel">
          <h3>Memória RAM</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Corsair Vengeance LPX 16GB (2x8GB) 3200MHz</div>
                <div class="card-body">
                  <p>DDR4<br>CL16</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Placa de Vídeo -->
        <div class="tab-pane fade" id="gpu" role="tabpanel">
          <h3>Placa de Vídeo</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">GeForce RTX 3060 12GB</div>
                <div class="card-body">
                  <p>DLSS / Ray Tracing</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- HD / SSD -->
        <div class="tab-pane fade" id="armazenamento" role="tabpanel">
          <h3>HD / SSD</h3>
          <div class="row">
            <!-- SSD -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Samsung SSD 970 EVO Plus 500GB</div>
                <div class="card-body">
                  <p>M.2 NVMe<br>Leitura 3.500 MB/s</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
            <!-- HD -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Seagate Barracuda 1TB</div>
                <div class="card-body">
                  <p>7200 RPM<br>64 MB Cache</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gabinete -->
        <div class="tab-pane fade" id="gabinete" role="tabpanel">
          <h3>Gabinete</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Pichau VP3000 RGB</div>
                <div class="card-body">
                  <p>Mid Tower<br>Visor Lateral<br>3 Fans RGB</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Fonte de Alimentação -->
        <div class="tab-pane fade" id="fonte" role="tabpanel">
          <h3>Fonte de Alimentação</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Corsair CX650 650W 80 Plus Bronze</div>
                <div class="card-body">
                  <p>Modular<br>ATX</p>
                  <button class="btn btn-outline-primary btn-sm">Selecionar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.tab-content -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

<!-- Bootstrap JS (Popper inclusivo) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
