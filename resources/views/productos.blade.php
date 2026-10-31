@extends('layout')

@section('titulo', 'Catálogo | TechStore')

@section('contenido')
    <style>
        .shop-container { display: flex; gap: 30px; padding: 20px 0; }
        .sidebar { width: 250px; flex-shrink: 0; background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #eaeaea; height: fit-content; }
        .sidebar h3 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-bottom: 20px; }
        .filter-group { margin-bottom: 25px; }
        .filter-group h4 { margin-bottom: 10px; color: #34495e; font-size: 1em; }
        .filter-group label { display: block; margin-bottom: 8px; color: #555; cursor: pointer; }
        .filter-group input[type="checkbox"] { margin-right: 10px; accent-color: #3498db; }
        
        .main-content { flex-grow: 1; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; background: #fff; padding: 15px 20px; border-radius: 8px; border: 1px solid #eaeaea; margin-bottom: 20px; flex-wrap: wrap; gap: 15px; }
        .search-bar input { padding: 10px 15px; width: 350px; border: 1px solid #ccc; border-radius: 20px; outline: none; transition: 0.3s; }
        .search-bar input:focus { border-color: #3498db; box-shadow: 0 0 5px rgba(52,152,219,0.3); }
        .sort-by select { padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: #f9f9f9; outline: none; cursor: pointer; }

        .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 20px; }
        
        /* Clase especial para ocultar productos con el buscador de JS */
        .oculto { display: none !important; }

        .product-card { background: #fff; border: 1px solid #eaeaea; border-radius: 10px; padding: 15px; position: relative; transition: transform 0.3s, box-shadow 0.3s; display: flex; flex-direction: column; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        
        .badge-sale { position: absolute; top: 15px; left: 15px; padding: 5px 10px; border-radius: 20px; font-size: 0.8em; font-weight: bold; color: white; background: #e74c3c; z-index: 2; }

        .product-img-container { height: 180px; overflow: hidden; border-radius: 8px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; }
        .product-img-container img { width: 100%; height: 100%; object-fit: cover; }

        .product-brand { font-size: 0.8em; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
        .product-title { font-size: 1.05em; color: #2c3e50; margin: 0 0 10px 0; min-height: 42px; }
        .price-container { margin-bottom: 15px; margin-top: auto; }
        .current-price { color: #2c3e50; font-size: 1.4em; font-weight: bold; }

        .btn-add-cart { background: #3498db; color: #fff; border: none; padding: 12px; border-radius: 5px; width: 100%; font-weight: bold; cursor: pointer; transition: background 0.3s; }
        .btn-add-cart:hover { background: #2980b9; }
        .btn-reset { display: block; text-align: center; color: #e74c3c; text-decoration: none; font-size: 0.9em; margin-top: 20px; font-weight: bold; cursor: pointer; }
        
        /* Mensaje de no resultados */
        #mensaje-vacio { grid-column: 1 / -1; text-align: center; padding: 50px; background: #fff; border-radius: 8px; border: 1px dashed #ccc; display: none; }
    </style>

    <div style="background: linear-gradient(135deg, #2c3e50, #34495e); color: white; padding: 30px 20px; text-align: center; border-radius: 8px; margin-bottom: 20px;">
        <h1 style="margin: 0; font-size: 2.2em;">Catálogo de Productos</h1>
        <p style="margin-top: 5px; color: #bdc3c7;">Explora nuestro catálogo completo en tiempo real.</p>
    </div>

    <!-- No usamos etiqueta <form> para evitar recargas, solo un contenedor -->
    <div id="panel-filtros">
        <div class="shop-container">
            
            <aside class="sidebar">
                <h3>Filtros</h3>
                
                <div class="filter-group">
                    <h4>Categorías</h4>
                    <label><input type="checkbox" class="filtro-categoria" value="Laptops"> Laptops</label>
                    <label><input type="checkbox" class="filtro-categoria" value="Monitores"> Monitores</label>
                    <label><input type="checkbox" class="filtro-categoria" value="Audio"> Audio</label>
                    <label><input type="checkbox" class="filtro-categoria" value="Lectores"> E-Readers</label>
                    <label><input type="checkbox" class="filtro-categoria" value="Seguridad"> Seguridad</label>
                    <label><input type="checkbox" class="filtro-categoria" value="Lifestyle"> Lifestyle</label>
                </div>

                <a id="btn-limpiar" class="btn-reset">✖ Limpiar búsqueda</a>
            </aside>

            <main class="main-content">
                <div class="top-bar">
                    <div class="search-bar">
                        <input type="text" id="buscador-texto" placeholder="Busca por producto o marca..." autocomplete="off">
                    </div>
                    <div class="sort-by">
                        <label style="margin-right: 5px; color: #555;">Ordenar por:</label>
                        <select id="ordenador-precio">
                            <option value="relevancia">Relevancia</option>
                            <option value="precio_asc">Precio: Menor a Mayor</option>
                            <option value="precio_desc">Precio: Mayor a Menor</option>
                        </select>
                    </div>
                </div>

                <div class="products-grid" id="cuadricula-productos">
                    
                    <!-- PRODUCTO 1: Laptop -->
                    <!-- Nota los data- atributos, son los que lee el JavaScript -->
                    <article class="product-card" data-categoria="Laptops" data-marca="Samsung" data-precio="8500" data-nombre="Laptop Samsung Galaxy Book" data-orden="1">
                        <span class="badge-sale">Oferta</span>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Laptop Samsung">
                        </div>
                        <div class="product-brand">Samsung</div>
                        <h3 class="product-title">Laptop Samsung Galaxy Book</h3>
                        <div class="price-container">
                            <span class="current-price">Q8,500.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 2: Monitor -->
                    <article class="product-card" data-categoria="Monitores" data-marca="Samsung" data-precio="2200" data-nombre="Monitor Samsung 27 pulgadas" data-orden="2">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1527443195645-1133f7f28990?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Monitor Samsung">
                        </div>
                        <div class="product-brand">Samsung</div>
                        <h3 class="product-title">Monitor Samsung 27"</h3>
                        <div class="price-container">
                            <span class="current-price">Q2,200.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 3: Lector -->
                    <article class="product-card" data-categoria="Lectores" data-marca="Amazon" data-precio="1350" data-nombre="Amazon Kindle Paperwhite" data-orden="3">
                        <span class="badge-sale">Oferta</span>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1592496001020-d31bd830651f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Kindle">
                        </div>
                        <div class="product-brand">Amazon</div>
                        <h3 class="product-title">Amazon Kindle Paperwhite</h3>
                        <div class="price-container">
                            <span class="current-price">Q1,350.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 4: Audio Soundcore -->
                    <article class="product-card" data-categoria="Audio" data-marca="Soundcore" data-precio="650" data-nombre="Audifonos Soundcore Inalambricos" data-orden="4">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1606220588913-b3aecb4927f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Soundcore">
                        </div>
                        <div class="product-brand">Soundcore</div>
                        <h3 class="product-title">Audífonos Soundcore</h3>
                        <div class="price-container">
                            <span class="current-price">Q650.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 5: Audio JBL -->
                    <article class="product-card" data-categoria="Audio" data-marca="JBL" data-precio="850" data-nombre="Auriculares JBL Over-Ear" data-orden="5">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1613040809024-b4ef7ba99bc3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="JBL">
                        </div>
                        <div class="product-brand">JBL</div>
                        <h3 class="product-title">Auriculares JBL Over-Ear</h3>
                        <div class="price-container">
                            <span class="current-price">Q850.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 6: Seguridad -->
                    <article class="product-card" data-categoria="Seguridad" data-marca="Nexxt" data-precio="350" data-nombre="Camara de Seguridad Nexxt Inteligente" data-orden="6">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cámara Nexxt">
                        </div>
                        <div class="product-brand">Nexxt</div>
                        <h3 class="product-title">Cámara de Seguridad Nexxt</h3>
                        <div class="price-container">
                            <span class="current-price">Q350.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 7: Lifestyle Perfume -->
                    <article class="product-card" data-categoria="Lifestyle" data-marca="Lattafa" data-precio="380" data-nombre="Perfume Lattafa Asad" data-orden="7">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Perfume Lattafa">
                        </div>
                        <div class="product-brand">Lattafa</div>
                        <h3 class="product-title">Fragancia Lattafa Asad</h3>
                        <div class="price-container">
                            <span class="current-price">Q380.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- PRODUCTO 8: Lifestyle Skincare -->
                    <article class="product-card" data-categoria="Lifestyle" data-marca="Medicube" data-precio="280" data-nombre="Medicube Zero Pore Serum facial" data-orden="8">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Medicube Serum">
                        </div>
                        <div class="product-brand">Medicube</div>
                        <h3 class="product-title">Medicube Zero Pore Serum</h3>
                        <div class="price-container">
                            <span class="current-price">Q280.00</span>
                        </div>
                        <button type="button" class="btn-add-cart">🛒 Ver Detalles</button>
                    </article>

                    <!-- Mensaje dinámico si nada coincide -->
                    <div id="mensaje-vacio">
                        <h3 style="color: #7f8c8d; margin: 0;">No encontramos productos con esos filtros.</h3>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- SCRIPT DE FILTRADO PURAMENTE FRONT-END (En el navegador del usuario) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Referencias a los controles
            const buscadorTexto = document.getElementById('buscador-texto');
            const checkboxesCategoria = document.querySelectorAll('.filtro-categoria');
            const ordenadorPrecio = document.getElementById('ordenador-precio');
            const btnLimpiar = document.getElementById('btn-limpiar');
            
            // Referencias a la cuadrícula y a los productos
            const cuadricula = document.getElementById('cuadricula-productos');
            const mensajeVacio = document.getElementById('mensaje-vacio');
            // Convertimos NodeList a Array para poder ordenarlo después
            let productos = Array.from(document.querySelectorAll('.product-card'));

            // Escuchadores de eventos: cada vez que el usuario toca algo, ejecutamos filtrarProductos()
            buscadorTexto.addEventListener('input', filtrarProductos);
            ordenadorPrecio.addEventListener('change', ordenarProductos);
            checkboxesCategoria.forEach(chk => chk.addEventListener('change', filtrarProductos));

            // Función principal de filtrado
            function filtrarProductos() {
                const textoBusqueda = buscadorTexto.value.toLowerCase().trim();
                
                // Obtener categorías marcadas
                const categoriasActivas = Array.from(checkboxesCategoria)
                                            .filter(chk => chk.checked)
                                            .map(chk => chk.value);

                let productosVisibles = 0;

                productos.forEach(producto => {
                    const nombre = producto.getAttribute('data-nombre').toLowerCase();
                    const marca = producto.getAttribute('data-marca').toLowerCase();
                    const categoria = producto.getAttribute('data-categoria');

                    // 1. Validar si coincide con el texto escrito
                    const coincideTexto = textoBusqueda === '' || nombre.includes(textoBusqueda) || marca.includes(textoBusqueda);
                    
                    // 2. Validar si coincide con las categorías marcadas
                    const coincideCategoria = categoriasActivas.length === 0 || categoriasActivas.includes(categoria);

                    // 3. Mostrar u ocultar
                    if (coincideTexto && coincideCategoria) {
                        producto.classList.remove('oculto');
                        productosVisibles++;
                    } else {
                        producto.classList.add('oculto');
                    }
                });

                // Mostrar mensaje de vacío si no hay resultados
                if (productosVisibles === 0) {
                    mensajeVacio.style.display = 'block';
                } else {
                    mensajeVacio.style.display = 'none';
                }
            }

            // Función para ordenar visualmente los productos
            function ordenarProductos() {
                const tipoOrden = ordenadorPrecio.value;

                productos.sort((a, b) => {
                    if (tipoOrden === 'precio_asc') {
                        return parseFloat(a.getAttribute('data-precio')) - parseFloat(b.getAttribute('data-precio'));
                    } else if (tipoOrden === 'precio_desc') {
                        return parseFloat(b.getAttribute('data-precio')) - parseFloat(a.getAttribute('data-precio'));
                    } else {
                        // Relevancia: volvemos al orden original usando un atributo que les pusimos (data-orden)
                        return parseInt(a.getAttribute('data-orden')) - parseInt(b.getAttribute('data-orden'));
                    }
                });

                // Volvemos a insertar los elementos en el DOM ya ordenados
                productos.forEach(producto => cuadricula.appendChild(producto));
                
                // Asegurarnos de que el mensaje de vacío se quede al final
                cuadricula.appendChild(mensajeVacio);
            }

            // Botón para limpiar todos los filtros
            btnLimpiar.addEventListener('click', () => {
                buscadorTexto.value = '';
                checkboxesCategoria.forEach(chk => chk.checked = false);
                ordenadorPrecio.value = 'relevancia';
                filtrarProductos();
                ordenarProductos();
            });
        });
    </script>
@endsection