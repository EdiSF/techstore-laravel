<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AmazonService
{
    /**
     * Método para buscar productos en la API de Amazon.
     * Requiere credenciales PA-API reales para funcionar en producción.
     */
    public function buscarProductosEnTiempoReal($busqueda = null, $categoria = null)
    {
        /* 
         * CÓDIGO REAL PARA LA API DE AMAZON (PA-API v5)
         * Cuando tengas tus credenciales, usarías algo como esto:
         * 
         * $response = Http::withHeaders([
         *     'X-Amz-Target' => 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.SearchItems',
         *     'Content-Encoding' => 'amz-1.0',
         * ])->post('https://webservices.amazon.com/paapi5/searchitems', [
         *     'Keywords' => $busqueda,
         *     'SearchIndex' => $categoria ?? 'All',
         *     'PartnerTag' => env('AMAZON_PARTNER_TAG'),
         *     'PartnerType' => 'Associates',
         * ]);
         * 
         * return $response->json();
         */

        // SIMULACIÓN EN TIEMPO REAL: 
        // Mientras configuras la API, devolvemos una colección estructurada idéntica a lo que respondería un endpoint.
        $productos = collect([
            (object)[
                'id' => 'B0B12345',
                'nombre' => 'Laptop Samsung Galaxy Book3 Pro 14"',
                'marca' => 'Samsung',
                'categoria' => 'Laptops',
                'precio' => 11500.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => true,
            ],
            (object)[
                'id' => 'B0C98765',
                'nombre' => 'Amazon Kindle Paperwhite (16 GB) Signature Edition',
                'marca' => 'Amazon',
                'categoria' => 'Lectores',
                'precio' => 1450.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1592496001020-d31bd830651f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => false,
            ],
            (object)[
                'id' => 'B0A11223',
                'nombre' => 'Auriculares Inalámbricos Soundcore Liberty 4 NC',
                'marca' => 'Soundcore',
                'categoria' => 'Audio',
                'precio' => 850.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1606220588913-b3aecb4927f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => true,
            ],
            (object)[
                'id' => 'B0D44556',
                'nombre' => 'Monitor Samsung Odyssey G5 27" Curvo',
                'marca' => 'Samsung',
                'categoria' => 'Monitores',
                'precio' => 2800.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1527443195645-1133f7f28990?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => false,
            ],
            (object)[
                'id' => 'B0E77889',
                'nombre' => 'Cámara de Seguridad Nexxt Smart Wi-Fi 1080p',
                'marca' => 'Nexxt',
                'categoria' => 'Seguridad',
                'precio' => 350.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => false,
            ],
            (object)[
                'id' => 'B0F99001',
                'nombre' => 'Auriculares JBL Tune 720BT Over-Ear',
                'marca' => 'JBL',
                'categoria' => 'Audio',
                'precio' => 699.00,
                'imagen_url' => 'https://images.unsplash.com/photo-1613040809024-b4ef7ba99bc3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'en_oferta' => true,
            ],
        ]);

        // Aplicamos los filtros de búsqueda a nuestra colección simulada
        if ($busqueda) {
            $productos = $productos->filter(function($item) use ($busqueda) {
                return stripos($item->nombre, $busqueda) !== false || stripos($item->marca, $busqueda) !== false;
            });
        }

        if ($categoria && is_array($categoria)) {
            $productos = $productos->filter(function($item) use ($categoria) {
                return in_array($item->categoria, $categoria);
            });
        }

        return $productos;
    }
}