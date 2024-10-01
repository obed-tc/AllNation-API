<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllNation API Documentation</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4ade80;
            --secondary-color: #22c55e;
            --background-color: #1a1a1a;
            --text-color: #e0e0e0;
            --code-background: #2a2a2a;
            --sidebar-background: #222222;
            --card-background: #333333;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;

        }

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-background);
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo img {
            max-width: 100px;
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            color: var(--text-color);
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar nav ul li a:hover {
            background-color: var(--secondary-color);
            color: var(--background-color);
        }

        .content {
            flex-grow: 1;
            margin-left: 270px;
            padding: 50px;

        }

        h1,
        h2,
        h3 {
            color: var(--primary-color);
        }

        .endpoint {
            background-color: var(--card-background);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .endpoint h3 {
            margin-top: 0;
        }

        .endpoint-url {
            background-color: var(--code-background);
            padding: 10px;
            border-radius: 5px;
            font-family: monospace;
            margin-bottom: 15px;
        }

        .params-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .params-table th,
        .params-table td {
            border: 1px solid #444;
            padding: 10px;
            text-align: left;
        }

        .params-table th {
            background-color: var(--secondary-color);
            color: var(--background-color);
        }

        .try-it {
            background-color: var(--primary-color);
            color: var(--background-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .try-it:hover {
            background-color: var(--secondary-color);
        }

        .response-example {
            background-color: var(--code-background);
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            white-space: pre-wrap;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: var(--sidebar-background);
            color: var(--text-color);
        }

        .api-version {
            background-color: var(--secondary-color);
            color: var(--background-color);
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8em;
            margin-left: 10px;
        }

        .authentication-info {
            background-color: var(--card-background);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .rate-limit-info {
            background-color: var(--card-background);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="https://www.vhv.rs/file/max/5/50478_green-planet-png.png" alt="AllNation API Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#introduccion">Introducción</a></li>
                    <!-- <li><a href="#rate-limit">Límites de Uso</a></li> -->
                    <li><a href="#uso">Uso General</a></li>
                    <li><a href="#endpoints">Endpoints</a></li>
                    <li><a href="#errores">Errores Comunes</a></li>
                    <li><a href="#ejemplos">Ejemplos de Uso</a></li>
                    <li><a href="#creditos">Créditos</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1><i class="fas fa-globe"></i> All Nation API <span class="api-version">v1.0</span></h1>

            <section id="introduccion">
                <h2>Introducción</h2>
                <p>All Nation API es una herramienta backend que proporciona acceso a información organizada de países,
                    regiones y localidades. Esta API te permite obtener listas de países, explorar regiones según el
                    tipo de organización administrativa de cada país, y descubrir todas las localidades dentro de esas
                    regiones.</p>
            </section>


            <!-- <section id="rate-limit">
                <h2>Límites de Uso</h2>
                <div class="rate-limit-info">
                    <p>Para garantizar un servicio justo para todos los usuarios, aplicamos los siguientes límites:</p>
                    <ul>
                        <li>1000 solicitudes por hora por clave API</li>
                        <li>10,000 solicitudes por día por clave API</li>
                    </ul>
                    <p>Si excedes estos límites, recibirás un error 429 (Too Many Requests).</p>
                </div>
            </section> -->

            <section id="uso">
                <h2>Uso General</h2>
                <p>La API está diseñada para gestionar datos geográficos de manera eficiente. Requiere especificar
                    parámetros de búsqueda y límite en tus consultas para obtener resultados precisos.</p>
                <p>Todos los endpoints requieren los siguientes parámetros:</p>
                <ul>
                    <li><strong>search:</strong> Término de búsqueda para filtrar resultados.</li>
                    <li><strong>limit:</strong> Número máximo de resultados a devolver (máximo 100).</li>
                </ul>
            </section>

            <section id="endpoints">
                <h2>Endpoints</h2>

                <div class="endpoint">
                    <h3>1. Obtener países</h3>
                    <p>Busca entre todas los paises disponibles del mundo</p>

                    <div class="endpoint-url">GET /v1/countries</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>search</td>
                            <td>Término de búsqueda para filtrar países</td>
                        </tr>
                        <tr>
                            <td>limit</td>
                            <td>Número máximo de resultados a devolver</td>
                        </tr>
                    </table>
                    <button class="try-it"
                        onclick="window.open('api/api/v1/countries?search=arg&limit=5', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
[
  { "id": 1, "name": "Argentina", "iso_code": "AR" },
  { "id": 2, "name": "Armenia", "iso_code": "AM" }
]
                    </pre>
                </div>

                <div class="endpoint">
                    <h3>2. Obtener detalles de un país</h3>
                    <p>Detalles de un pais</p>

                    <div class="endpoint-url">GET /v1/countries/{id}</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>ID del país</td>
                        </tr>
                    </table>
                    <button class="try-it" onclick="window.open('api/api/v1/countries/1', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
{
  "id": 1,
  "name": "Argentina",
  "iso_code": "AR"
}
                    </pre>
                </div>

                <div class="endpoint">
                    <h3>3. Obtener regiones de un país</h3>
                    <p>Busca entre todas regiones disponibles de un pais</p>

                    <div class="endpoint-url">GET /v1/countries/{countryId}/regions</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>countryId</td>
                            <td>ID del país</td>
                        </tr>
                        <tr>
                            <td>search</td>
                            <td>Término de búsqueda para filtrar regiones</td>
                        </tr>
                        <tr>
                            <td>limit</td>
                            <td>Número máximo de resultados a devolver</td>
                        </tr>
                    </table>
                    <button class="try-it"
                        onclick="window.open('api/api/v1/countries/21/regions?search=coc&limit=3', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
[
  {
    "id": 2,
    "country_id": 21,
    "administrative_type_id": 3,
    "region_name": "Cochabamba",
    "country_name": "Bolivia",
    "administrative_type_name": "Departamento"
  }
]
                    </pre>
                </div>

                <div class="endpoint">
                    <h3>4. Obtener localidades de una región</h3>
                    <p>Busca entre todas las localidades disponibles de una region</p>
                    <div class="endpoint-url">GET /v1/localities/region/{regionId}</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>regionId</td>
                            <td>ID de la región</td>
                        </tr>
                        <tr>
                            <td>search</td>
                            <td>Término de búsqueda para filtrar localidades</td>
                        </tr>
                        <tr>
                            <td>limit</td>
                            <td>Número máximo de resultados a devolver</td>
                        </tr>
                    </table>
                    <button class="try-it"
                        onclick="window.open('api/api/v1/localities/region/2?search=quillac&limit=4', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
[
  {
    "id": 91,
    "name": "Quillacollo",
    "region_name": "Cochabamba",
    "country_name": "Bolivia"
  }
]
                    </pre>
                </div>


                <div class="endpoint">
                    <h3>5. Obtener localidades por pais</h3>
                    <p>Busca entre todas las localidades disponibles de un pais</p>
                    <div class="endpoint-url">GET /v1/localities/country/{id country}</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>countryId</td>
                            <td>ID del paisn</td>
                        </tr>
                        <tr>
                            <td>search</td>
                            <td>Término de búsqueda para filtrar localidades</td>
                        </tr>
                        <tr>
                            <td>limit</td>
                            <td>Número máximo de resultados a devolver</td>
                        </tr>
                    </table>
                    <button class="try-it"
                        onclick="window.open('api/api/v1/localities/country/21?search=Vin&limit=10', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
[
  {
    "id": 95,
    "name": "Vinto",
    "region_name": "Cochabamba",
    "country_name": "Bolivia"
  }
]
                    </pre>
                </div>

                <div class="endpoint">
                    <h3>6. Obtener tipos de divisiones administrativas</h3>
                    <div class="endpoint-url">GET /v1/administrative-types</div>
                    <table class="params-table">
                        <tr>
                            <th>Parámetro</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>search</td>
                            <td>Término de búsqueda para filtrar tipos administrativos</td>
                        </tr>
                        <tr>
                            <td>limit</td>
                            <td>Número máximo de resultados a devolver</td>
                        </tr>
                    </table>
                    <button class="try-it"
                        onclick="window.open('api/api/v1/administrative-types?search=prov&limit=10', '_blank')">Probar</button>
                    <h4>Ejemplo de respuesta:</h4>
                    <pre class="response-example">
[
    {"id":2,"name":"Provincia"}
]
                    </pre>
                </div>
            </section>
            <section id="errores">
                <h2>Errores Comunes</h2>
                <ul>
                    <li><strong>400 Bad Request:</strong> Los parámetros de la solicitud son inválidos o están
                        incompletos.</li>
                    <li><strong>404 Not Found:</strong> El recurso solicitado no existe.</li>
                    <li><strong>429 Too Many Requests:</strong> Se ha excedido el límite de solicitudes.</li>
                    <li><strong>500 Internal Server Error:</strong> Error inesperado del servidor.</li>
                </ul>
                <p>Consejos para evitar errores comunes:</p>
                <ul>
                    <li><strong>No especificar search o limit:</strong> Asegúrate de incluir siempre ambos parámetros en
                        las solicitudes que los requieran.</li>
                    <li><strong>No encontrar resultados con search:</strong> Revisa los términos de búsqueda y ajusta
                        los valores si es necesario. Considera usar términos más generales si no obtienes resultados.
                    </li>
                    <li><strong>Exceder el límite de solicitudes:</strong> Implementa un sistema de caché en tu
                        aplicación para reducir el número de llamadas a la API.</li>
                </ul>
            </section>

            <section id="ejemplos">
                <h2>Ejemplos de Uso</h2>

                <h3>Ejemplo 1: Obtener países que contienen "united" en su nombre</h3>
                <pre class="response-example">
GET /v1/countries?search=united&limit=5

Respuesta:
[
  { "id": 225, "name": "United States", "iso_code": "US" },
  { "id": 226, "name": "United Kingdom", "iso_code": "GB" },
  { "id": 3, "name": "United Arab Emirates", "iso_code": "AE" }
]
                </pre>

                <h3>Ejemplo 2: Obtener regiones de España que contienen "valencia" en su nombre</h3>
                <pre class="response-example">
GET /v1/countries/195/regions?search=valencia&limit=2

Respuesta:
[
  { "id": 1987, "name": "Comunidad Valenciana", "country_id": 195 },
  { "id": 1988, "name": "Valencia", "country_id": 195 }
]
                </pre>

                <h3>Ejemplo 3: Obtener localidades en la región de Cataluña que contienen "barcelona" en su nombre</h3>
                <pre class="response-example">
GET /v1/localities/region/1978?search=barcelona&limit=3

Respuesta:
[
  { "id": 19780, "name": "Barcelona", "region_id": 1978 },
  { "id": 19781, "name": "L'Hospitalet de Llobregat", "region_id": 1978 },
  { "id": 19782, "name": "Badalona", "region_id": 1978 }
]
                </pre>
            </section>

            <section id="mejores-practicas">
                <h2>Mejores Prácticas</h2>
                <ul>
                    <li><strong>Caché:</strong> Implementa un sistema de caché en tu aplicación para almacenar
                        resultados frecuentes y reducir las llamadas a la API.</li>
                    <li><strong>Paginación:</strong> Utiliza el parámetro 'limit' de manera efectiva para implementar la
                        paginación en tu aplicación.</li>
                    <li><strong>Manejo de errores:</strong> Implementa un manejo robusto de errores en tu aplicación
                        para gestionar adecuadamente las respuestas de error de la API.</li>
                    <li><strong>Retroalimentación al usuario:</strong> Proporciona mensajes claros al usuario final
                        cuando los resultados de búsqueda estén vacíos o ocurran errores.</li>
                    <li><strong>Monitoreo:</strong> Mantén un registro de tus llamadas a la API para detectar patrones
                        de uso y optimizar tu implementación.</li>
                </ul>
            </section>

            <section id="actualizaciones">
                <h2>Actualizaciones y Cambios</h2>
                <p>Nos esforzamos por mantener la estabilidad de la API, pero ocasionalmente pueden ocurrir cambios. Te
                    recomendamos:</p>
                <ul>
                    <li>Revisar regularmente esta documentación para estar al tanto de nuevas características o cambios.
                    </li>
                    <li>Estar atento a las notas de la versión que publicamos para conocer los detalles de cada
                        actualización.</li>
                    <li>Seguir nuestro perfil de GitHub <a href="https://github.com/obed-tc" target="_blank">obed-tc</a>
                        para acceder a ejemplos de código y contribuir al desarrollo de la API.</li>
                </ul>
                <p>Tu feedback es importante para nosotros, así que no dudes en contactarnos si tienes sugerencias o
                    comentarios.</p>
            </section>



            <section id="creditos">
                <h2>Créditos</h2>
                <p>Desarrollado por <a href="https://github.com/obed-tc" target="_blank">obed-tc</a></p>
            </section>
        </main>
    </div>

    <footer>
        <p>&copy; 2024 All Nation API. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>