<!doctype html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <title>Álbum</title>

</head>
<body class="">

    <header>
      <div class="navbar navbar-dark bg-dark p-3 m-4 shadow rounded-pill">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Seu álbum de fotos</strong>
          </a>
      </div>
    </header>

    <main role="main">

      <section class="container p-4">
          <h1 class="text-center">Escreva aqui seu novo Post</h1>
          <form method="POST" action="/" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-left p-4">
                <div class="mb-3">
                    <label class="form-label">Endereço de E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sua Mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Escolha um arquivo</label>
                    <input class="form-control" type="file" id="arquivo" name="arquivo">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-primary my-2 rounded-pill shadow">Enviar</button>
                    <button type="reset" class="btn btn-secondary my-2 rounded-pill shadow">Cancelar</button>
                </div>
            </div>
          </form>
      </section>

      <div class="album py-5 bg-light mt-3">
        <div class="container">
          <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $post->arquivo }}" style="height: 15rem;">
                    <div class="card-body">
                      <p class="card-text">{{ $post->email }}</p>
                      <p class="card-text">{{ $post->mensagem }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a type="button" class="btn btn-sm btn-outline-secondary shadow rounded-pill m-1" href="/download/{{ $post->id }}">Download</a>
                          <form method="post" action="/{{ $post->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-sm btn-outline-danger shadow rounded-pill m-1">Apagar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>

    <footer class="container p-2">
                <div class="float-end p-3 m-3">
                    <a href="#">Voltar para cima</a>
                </div>
                <div class="float-start p-3 m-3">
                    ©2018 Sua empresa.com
                </div>
    </footer>

    {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('js/jquery/jquery.min.js') }}" type="text/javascript"></script>
</body>
</html>

