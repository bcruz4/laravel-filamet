<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal - Ministerio de Salud y Deportes</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Header Estilo Gobierno -->
    <header class="sticky__wrapper">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logos -->
                <div class="col-md-3 col-8">
                    <div class="d-flex align-items-center logo-container">
                        <a href="/" class="me-3">
                            <img src="{{ asset('images/logo_3.png') }}" alt="Logo Ministerio de Salud" class="img-fluid header-logo">
                        </a>
                        <a href="/">
                            <img src="{{ asset('images/logo_4.png') }}" alt="Logo Ministerio de Deportes" class="img-fluid header-logo">
                        </a>
                    </div>
                </div>
                
                <!-- Menú Principal -->
                <div class="col-md-7 d-none d-md-block">
                    <nav>
                        <ul class="main-menu">
                            <li><a href="/inicio">Inicio</a></li>
                            <li class="active"><a href="/">Publicaciones</a></li>
                            <li><a href="/publicaciones">Organigrama</a></li>
                            <li><a href="/dashboard">Acceso</a></li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Búsqueda y Menú Mobile -->
                <div class="col-md-2 col-4 text-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="search-icon me-3 d-none d-md-block">
                            <i class="fas fa-search"></i>
                        </a>
                        <a href="#" class="mobile-menu-toggler d-md-none">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="container">
            <div class="posts-grid">
                @forelse($posts as $post)
                <div class="document-card">
                    <div class="document-header">
                        <div class="date-type-wrapper">
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
                                Descargar&nbsp;<i class="fas fa-download"></i>
                            </a>
                            @else
                            <a href="#">
                                Leer más&nbsp;<i class="fas fa-info-circle"></i>
                            </a>
                            @endif
                        </button>
                    </div>
                    <hr class="divider">
                    <div class="document-content">
                        <h6 class="document-title">{{ $post->title }}</h6>
                        <p class="document-text">
                            {{ Str::limit(strip_tags($post->body), 500) }}
                        </p>
                        <div class="content">
                            @if($post->pdf_url)
                            <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank">Ver documento</a>
                            @else
                            <a href="#">Leer más</a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="no-posts">No hay publicaciones disponibles por el momento.</p>
                </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="main-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Ministerio de Salud y Deportes - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu functionality
        document.querySelector('.mobile-menu-toggler').addEventListener('click', function(e) {
            e.preventDefault();
            // Aquí puedes agregar la lógica para mostrar el menú móvil
            alert('Menú móvil se abrirá aquí - Implementar con Bootstrap Offcanvas');
        });
    </script>
</body>
</html>