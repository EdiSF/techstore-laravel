@extends('layout')

@section('titulo', 'Contacto | TechStore')

@section('contenido')
    <style>
        .contact-header { text-align: center; padding: 40px 20px; background: #34495e; color: white; border-radius: 10px; margin-bottom: 40px; }
        .contact-header h1 { font-size: 2.5em; margin: 0 0 10px 0; }
        .contact-header p { font-size: 1.1em; color: #bdc3c7; }

        .contact-container { display: flex; gap: 40px; flex-wrap: wrap; margin-bottom: 50px; }
        
        /* Formulario de Contacto */
        .contact-form-section { flex: 2; min-width: 300px; background: #fff; padding: 30px; border-radius: 10px; border: 1px solid #eaeaea; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .contact-form-section h2 { color: #2c3e50; margin-top: 0; margin-bottom: 25px; }
        
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: bold; color: #34495e; margin-bottom: 8px; }
        .form-control { width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 1em; font-family: inherit; transition: border-color 0.3s; box-sizing: border-box; }
        .form-control:focus { outline: none; border-color: #3498db; box-shadow: 0 0 5px rgba(52, 152, 219, 0.3); }
        textarea.form-control { resize: vertical; min-height: 120px; }
        
        .btn-submit { background: #2ecc71; color: white; border: none; padding: 15px 30px; border-radius: 6px; font-weight: bold; font-size: 1.1em; cursor: pointer; transition: background 0.3s; width: 100%; }
        .btn-submit:hover { background: #27ae60; }

        /* Información de Contacto */
        .contact-info-section { flex: 1; min-width: 250px; background: #f8f9fa; padding: 30px; border-radius: 10px; border: 1px solid #eaeaea; }
        .contact-info-section h3 { color: #2c3e50; margin-top: 0; margin-bottom: 20px; }
        
        .info-item { display: flex; gap: 15px; margin-bottom: 25px; align-items: flex-start; }
        .info-icon { font-size: 1.5em; background: #3498db; color: white; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0; }
        .info-text h4 { margin: 0 0 5px 0; color: #34495e; font-size: 1.1em; }
        .info-text p { margin: 0; color: #666; line-height: 1.5; }
    </style>

    <!-- Encabezado -->
    <div class="contact-header">
        <h1>¿Tienes alguna duda?</h1>
        <p>Estamos aquí para ayudarte. Escríbenos y nuestro equipo te responderá lo antes posible.</p>
    </div>

    <div class="contact-container">
        
        <!-- Formulario -->
        <div class="contact-form-section">
            <h2>Envíanos un mensaje</h2>
            
            <!-- Asegúrate de cambiar action="" a la ruta de tu controlador en Laravel en el futuro -->
            <form action="#" method="POST">
                <!-- En Laravel siempre se debe incluir el token CSRF en los formularios -->
                @csrf 
                
                <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="tucorreo@ejemplo.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" class="form-control" placeholder="¿En qué te podemos ayudar?" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" placeholder="Escribe los detalles de tu consulta aquí..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">✉️ Enviar Mensaje</button>
            </form>
        </div>

        <!-- Información Lateral -->
        <div class="contact-info-section">
            <h3>Información Directa</h3>
            
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-text">
                    <h4>Nuestra Tienda</h4>
                    <p>Utz Ulew Mall, Zona 3<br>Quetzaltenango, Guatemala</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-text">
                    <h4>Teléfono</h4>
                    <p>+502 7700-0000<br>Lun - Sáb: 9:00 AM a 8:00 PM</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">✉️</div>
                <div class="info-text">
                    <h4>Correo Electrónico</h4>
                    <p>soporte@techstore.com.gt<br>ventas@techstore.com.gt</p>
                </div>
            </div>

            <!-- Puedes incrustar un mapa de Google aquí -->
            <div style="margin-top: 30px; border-radius: 8px; overflow: hidden; border: 1px solid #ddd;">
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Ubicación en Mapa" style="width: 100%; display: block;">
            </div>
        </div>

    </div>
@endsection