<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'TechStore | Lo mejor en tecnología')</title>
    
    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Estilos globales y reset */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; color: #333; line-height: 1.6; display: flex; flex-direction: column; min-height: 100vh; }
        
        /* Navbar de navegación */
        .navbar { background: #2c3e50; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .logo { color: #fff; font-size: 1.8em; font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 10px; }
        .logo span { color: #3498db; }
        .nav-links { display: flex; gap: 20px; list-style: none; }
        .nav-links a { color: #ecf0f1; text-decoration: none; font-weight: 600; padding: 8px 12px; border-radius: 5px; transition: background 0.3s; }
        .nav-links a:hover, .nav-links a.active { background: #3498db; color: white; }
        
        /* Contenedor principal */
        .container { flex: 1; max-width: 1200px; margin: 40px auto; padding: 0 20px; width: 100%; }
        
        /* Alertas de sesión (Éxito/Error) */
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; color: white; font-weight: bold; text-align: center; }
        .alert-success { background-color: #2ecc71; }
        
        /* Footer profesional */
        .footer { background: #1a252f; color: #bdc3c7; padding: 40px 50px 20px; margin-top: auto; }
        .footer-content { display: flex; justify-content: space-between; flex-wrap: wrap; max-width: 1200px; margin: 0 auto; gap: 30px; }
        .footer-col { flex: 1; min-width: 250px; }
        .footer-col h4 { color: white; margin-bottom: 15px; font-size: 1.2em; border-bottom: 2px solid #3498db; padding-bottom: 5px; display: inline-block; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col ul a { color: #bdc3c7; text-decoration: none; transition: color 0.3s; }
        .footer-col ul a:hover { color: #3498db; }
        .footer-bottom { text-align: center; padding-top: 20px; margin-top: 30px; border-top: 1px solid #2c3e50; font-size: 0.9em; }
    </style>
</head>
<body>

    <!-- Navegación -->
    <nav class="navbar">
        <a href="{{ route('inicio') }}" class="logo">Tech<span>Store</span></a>
        <ul class="nav-links">
            <li><a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'active' : '' }}">Inicio</a></li>
            <li><a href="{{ route('productos') }}" class="{{ request()->routeIs('productos') ? 'active' : '' }}">Productos</a></li>
            <li><a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a></li>
            <li><a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}">Contacto</a></li>
        </ul>
    </nav>

    <!-- Contenido dinámico inyectado por las vistas -->
    <main class="container">
        <!-- Alerta de éxito dinámica -->
        @if(session('exito'))
            <div class="alert alert-success">
                {{ session('exito') }}
            </div>
        @endif

        @yield('contenido')
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-col">
                <h4>Sobre TechStore</h4>
                <p>Nos especializamos en brindar los mejores equipos tecnológicos, desde laptops de alto rendimiento hasta accesorios de audio premium.</p>
            </div>
            <div class="footer-col">
                <h4>Enlaces Rápidos</h4>
                <ul>
                    <li><a href="{{ route('productos') }}">Catálogo Completo</a></li>
                    <li><a href="{{ route('nosotros') }}">Nuestra Historia</a></li>
                    <li><a href="{{ route('contacto') }}">Soporte Técnico</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contacto Físico</h4>
                <ul>
                    <li>📍 Utz Ulew Mall, Quetzaltenango</li>
                    <li>📞 +502 7700-0000</li>
                    <li>✉️ ventas@techstore.com.gt</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} TechStore. Todos los derechos reservados. Diseñado con Laravel.</p>
        </div>
    </footer>

</body>
</html>