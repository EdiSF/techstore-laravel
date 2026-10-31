@extends('layout')

@section('titulo', 'Inicio | TechStore')

@section('contenido')
    <!-- Encabezado / Hero Section -->
    <div style="text-align: center; padding: 40px 20px;">
        <h1 style="color: #2c3e50; margin-bottom: 10px;">Bienvenido a TechStore</h1>
        <p style="color: #7f8c8d; font-size: 1.2em;">Tu tienda de tecnología de confianza, con productos de las mejores marcas y un servicio excepcional.</p>
    </div>

    <!-- Banner destacado -->
    <div style="background: linear-gradient(135deg, #3498db, #2980b9); color:white; padding:30px; margin:20px 0; border-radius:10px; text-align: center; box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);">
        <h2 style="margin-top: 0;">🔥 Ofertas de la semana</h2>
        <p style="font-size: 1.1em; margin-bottom: 0;">Aprovecha descuentos especiales en laptops, monitores y accesorios de audio.</p>
    </div>

    <!-- Sección de Beneficios -->
    <div style="display:flex; gap:20px; justify-content: space-around; margin: 40px 0; text-align: center; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #2c3e50;">🚚 Envío a todo el país</h3>
            <p style="color: #666;">Entregas rápidas y seguras hasta la puerta de tu casa.</p>
        </div>
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #2c3e50;">🛡️ Garantía Extendida</h3>
            <p style="color: #666;">Respaldo total en todas tus compras tecnológicas.</p>
        </div>
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #2c3e50;">💳 Pagos Seguros</h3>
            <p style="color: #666;">Aceptamos múltiples métodos de pago con encriptación.</p>
        </div>
    </div>

    <!-- Productos destacados -->
    <h2 style="border-bottom: 2px solid #eee; padding-bottom: 10px; color: #2c3e50;">Productos Destacados</h2>
    <div style="display:flex; gap:20px; flex-wrap:wrap; justify-content: center; margin-bottom: 40px;">
        
        <!-- Producto 1 -->
        <div style="background:#fff; border:1px solid #e0e0e0; border-radius:8px; padding:15px; width:220px; text-align:center; box-shadow:0 4px 6px rgba(0,0,0,0.05);">
            <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Laptop Samsung" style="width:100%; height:160px; object-fit:cover; border-radius:5px; background: #f9f9f9;">
            <h3 style="font-size: 1.1em; color: #333; margin: 15px 0 10px;">Laptop Samsung Galaxy Book</h3>
            <p style="color: #666; font-size: 0.9em; min-height: 40px;">Rendimiento ultraligero ideal para programar y estudiar.</p>
            <p style="color: #e74c3c; font-size: 1.2em; margin-bottom: 0;"><strong>Q8,500</strong></p>
        </div>

        <!-- Producto 2 -->
        <div style="background:#fff; border:1px solid #e0e0e0; border-radius:8px; padding:15px; width:220px; text-align:center; box-shadow:0 4px 6px rgba(0,0,0,0.05);">
            <img src="https://images.unsplash.com/photo-1527443195645-1133f7f28990?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Monitor Samsung" style="width:100%; height:160px; object-fit:cover; border-radius:5px; background: #f9f9f9;">
            <h3 style="font-size: 1.1em; color: #333; margin: 15px 0 10px;">Monitor Samsung 27"</h3>
            <p style="color: #666; font-size: 0.9em; min-height: 40px;">Resolución Full HD con colores vibrantes para tu setup.</p>
            <p style="color: #e74c3c; font-size: 1.2em; margin-bottom: 0;"><strong>Q2,200</strong></p>
        </div>

        <!-- Producto 3 -->
        <div style="background:#fff; border:1px solid #e0e0e0; border-radius:8px; padding:15px; width:220px; text-align:center; box-shadow:0 4px 6px rgba(0,0,0,0.05);">
            <img src="https://images.unsplash.com/photo-1592496001020-d31bd830651f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Amazon Kindle" style="width:100%; height:160px; object-fit:cover; border-radius:5px; background: #f9f9f9;">
            <h3 style="font-size: 1.1em; color: #333; margin: 15px 0 10px;">Amazon Kindle Paperwhite</h3>
            <p style="color: #666; font-size: 0.9em; min-height: 40px;">Lleva toda tu biblioteca contigo a donde vayas.</p>
            <p style="color: #e74c3c; font-size: 1.2em; margin-bottom: 0;"><strong>Q1,350</strong></p>
        </div>

        <!-- Producto 4 -->
        <div style="background:#fff; border:1px solid #e0e0e0; border-radius:8px; padding:15px; width:220px; text-align:center; box-shadow:0 4px 6px rgba(0,0,0,0.05);">
            <img src="https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Audífonos Soundcore" style="width:100%; height:160px; object-fit:cover; border-radius:5px; background: #f9f9f9;">
            <h3 style="font-size: 1.1em; color: #333; margin: 15px 0 10px;">Audífonos Soundcore</h3>
            <p style="color: #666; font-size: 0.9em; min-height: 40px;">Cancelación de ruido activa y bajos profundos.</p>
            <p style="color: #e74c3c; font-size: 1.2em; margin-bottom: 0;"><strong>Q650</strong></p>
        </div>

    </div>

    <!-- Testimonios -->
    <h2 style="margin-top:40px; border-bottom: 2px solid #eee; padding-bottom: 10px; color: #2c3e50;">Lo que dicen nuestros clientes</h2>
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
        <blockquote style="flex: 1; min-width: 250px; background:#f8f9fa; padding:20px; border-left:5px solid #3498db; border-radius:4px; margin:0;">
            <p style="font-style: italic; color: #555; margin-top: 0;">“TechStore me ayudó a encontrar la laptop perfecta para la universidad. La atención fue excelente.”</p>
            <footer style="font-weight: bold; color: #333;">– Juan Pérez</footer>
        </blockquote>
        <blockquote style="flex: 1; min-width: 250px; background:#f8f9fa; padding:20px; border-left:5px solid #3498db; border-radius:4px; margin:0;">
            <p style="font-style: italic; color: #555; margin-top: 0;">“Los precios son súper competitivos y mis productos llegaron en perfecto estado. Muy recomendados.”</p>
            <footer style="font-weight: bold; color: #333;">– María López</footer>
        </blockquote>
    </div>

    <!-- Llamado a la acción -->
    <div style="background:#2ecc71; color:white; padding:40px 20px; margin-top:50px; text-align:center; border-radius:10px; box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);">
        <h2 style="margin-top:0; font-size: 2em;">¿Listo para tu próxima compra?</h2>
        <p style="font-size: 1.2em; margin-bottom: 25px;">Visita nuestro catálogo completo y encuentra exactamente lo que necesitas.</p>
        <a href="{{ route('productos') }}" style="background: #27ae60; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 1.1em; transition: background 0.3s;">
            Ver catálogo de productos
        </a>
    </div>
@endsection