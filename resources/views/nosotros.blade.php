@extends('layout')

@section('titulo', 'Sobre Nosotros | TechStore')

@section('contenido')
    <style>
        .about-header { text-align: center; padding: 60px 20px; background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover; color: white; border-radius: 10px; margin-bottom: 40px; }
        .about-header h1 { font-size: 2.8em; margin: 0 0 10px 0; }
        .about-header p { font-size: 1.2em; color: #ecf0f1; max-width: 600px; margin: 0 auto; }
        
        .about-section { display: flex; gap: 40px; align-items: center; margin-bottom: 60px; flex-wrap: wrap; }
        .about-text { flex: 1; min-width: 300px; }
        .about-text h2 { color: #2c3e50; font-size: 2em; margin-bottom: 20px; border-bottom: 3px solid #3498db; display: inline-block; padding-bottom: 5px; }
        .about-text p { color: #555; line-height: 1.7; font-size: 1.1em; margin-bottom: 15px; }
        .about-image { flex: 1; min-width: 300px; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .about-image img { width: 100%; height: auto; display: block; transition: transform 0.3s; }
        .about-image:hover img { transform: scale(1.05); }

        .mission-vision { display: flex; gap: 30px; margin-bottom: 60px; flex-wrap: wrap; }
        .card-mv { flex: 1; min-width: 250px; background: #fff; padding: 30px; border-radius: 10px; border: 1px solid #eaeaea; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .card-mv:hover { transform: translateY(-10px); }
        .card-mv .icon { font-size: 3em; margin-bottom: 15px; }
        .card-mv h3 { color: #2c3e50; font-size: 1.5em; margin-bottom: 15px; }
        .card-mv p { color: #666; line-height: 1.6; }
    </style>

    <!-- Encabezado -->
    <div class="about-header">
        <h1>Conoce TechStore</h1>
        <p>Pasión por la tecnología, compromiso con nuestros clientes.</p>
    </div>

    <!-- Sección de Historia -->
    <div class="about-section">
        <div class="about-text">
            <h2>Nuestra Historia</h2>
            <p>TechStore nació con un objetivo claro: democratizar el acceso a equipos tecnológicos de alta gama, ofreciendo productos de las marcas más reconocidas a precios justos.</p>
            <p>Fundada por <strong>Edison Esaú Pérez Guzmán</strong>, nuestra tienda comenzó como un pequeño proyecto local en Quetzaltenango. Hoy en día, nos hemos convertido en un referente para estudiantes, profesionales y entusiastas de la tecnología que buscan calidad, rendimiento y un servicio al cliente excepcional.</p>
        </div>
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Equipo trabajando en tecnología">
        </div>
    </div>

    <!-- Misión y Visión -->
    <div class="mission-vision">
        <div class="card-mv">
            <div class="icon">🚀</div>
            <h3>Nuestra Misión</h3>
            <p>Proveer soluciones tecnológicas innovadoras y accesibles, brindando asesoría personalizada para que cada cliente encuentre exactamente la herramienta que necesita para impulsar su productividad y entretenimiento.</p>
        </div>
        <div class="card-mv">
            <div class="icon">👁️</div>
            <h3>Nuestra Visión</h3>
            <p>Ser la tienda de tecnología en línea líder en el país, reconocida por nuestro catálogo actualizado, nuestra eficiencia logística y nuestra inquebrantable dedicación a la satisfacción total del usuario.</p>
        </div>
        <div class="card-mv">
            <div class="icon">💎</div>
            <h3>Nuestros Valores</h3>
            <p>Trabajamos basándonos en la <strong>Transparencia</strong> en nuestros precios, la <strong>Calidad</strong> de nuestros productos y la <strong>Empatía</strong> para entender las necesidades técnicas de cada comprador.</p>
        </div>
    </div>
@endsection