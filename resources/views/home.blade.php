<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Ministerio de Salud y Deportes</h1>
        <nav>
            <div class="navbar">
                <a href="/publicaciones">Publicaciones</a>
                <a href="/videos">Videos</a>
                <a href="/organigrama">Organigrama</a>
                <a href="/dashboard">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="posts-grid">
            @forelse($posts as $post)
            <div class="document-card">
                <div class="document-header">
                    <div style="height: 62px;">
                        <div class="date-container">
                            <p class="date-month">{{ $post->created_at->format('M') }}</p>
                            <p class="date-day">{{ $post->created_at->format('d') }}</p>
                            <p class="date-year">{{ $post->created_at->format('Y') }}</p>
                        </div>
                        <p class="document-type">{{$post->category->name}}</p>
                    </div>
                    <button class="download-btn">
                        @if($post->pdf_url)
                        <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank">
                            Descargar&nbsp;<i class="fas fa-download" style="font-size: 16px;"></i>
                        </a>
                        @else
                        <a href="#">
                            Leer más&nbsp;<i class="fas fa-info-circle" style="font-size: 16px;"></i>
                        </a>
                        @endif
                    </button>
                </div>
                <hr class="divider">
                <div class="document-content">
                    <h6 class="document-title">{{ $post->title }}</h6>
                    <p class="document-text">
                        {{ Str::limit(strip_tags($post->body), 500) }}
                    <div class="content">
                        @if($post->pdf_url)
                        <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank"></a>
                        @else
                        <a href="#">Leer más</a>
                        @endif
                    </div>
                    </p>
                </div>
            </div>
            @empty
            <p>No hay publicaciones disponibles por el momento.</p>
            @endforelse
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Ministerio de Salud y Deportes
    </footer>
</body>
</html>