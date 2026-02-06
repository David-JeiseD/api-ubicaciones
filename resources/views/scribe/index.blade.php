<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-gestion-administrativa-privado" class="tocify-header">
                <li class="tocify-item level-1" data-unique="gestion-administrativa-privado">
                    <a href="#gestion-administrativa-privado">Gestión Administrativa (Privado)</a>
                </li>
                                    <ul id="tocify-subheader-gestion-administrativa-privado" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="gestion-administrativa-privado-POSTapi-districts">
                                <a href="#gestion-administrativa-privado-POSTapi-districts">Crear Distrito</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-administrativa-privado-PUTapi-districts--id-">
                                <a href="#gestion-administrativa-privado-PUTapi-districts--id-">Actualizar Distrito</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-administrativa-privado-DELETEapi-districts--id-">
                                <a href="#gestion-administrativa-privado-DELETEapi-districts--id-">Eliminar Distrito</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-lectura-publica" class="tocify-header">
                <li class="tocify-item level-1" data-unique="lectura-publica">
                    <a href="#lectura-publica">Lectura Pública</a>
                </li>
                                    <ul id="tocify-subheader-lectura-publica" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-departments">
                                <a href="#lectura-publica-GETapi-departments">Listar Departamentos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-departments--id-">
                                <a href="#lectura-publica-GETapi-departments--id-">Ver Departamento</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-departments--id--provinces">
                                <a href="#lectura-publica-GETapi-departments--id--provinces">Provincias de un Departamento</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-provinces--id-">
                                <a href="#lectura-publica-GETapi-provinces--id-">Ver Provincia</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-provinces--id--districts">
                                <a href="#lectura-publica-GETapi-provinces--id--districts">Distritos de una Provincia</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-districts--id-">
                                <a href="#lectura-publica-GETapi-districts--id-">Ver Distrito</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="lectura-publica-GETapi-search">
                                <a href="#lectura-publica-GETapi-search">Buscar Distritos</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 19, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="gestion-administrativa-privado">Gestión Administrativa (Privado)</h1>

    

                                <h2 id="gestion-administrativa-privado-POSTapi-districts">Crear Distrito</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Registra un nuevo distrito. Requiere Token de administrador.</p>

<span id="example-requests-POSTapi-districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/districts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Miraflores\",
    \"ubigeo\": \"150122\",
    \"province_id\": 120,
    \"latitude\": -12.111062,
    \"longitude\": -77.031591,
    \"altitude_masl\": 79,
    \"surface_km2\": 9.62
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/districts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Miraflores",
    "ubigeo": "150122",
    "province_id": 120,
    "latitude": -12.111062,
    "longitude": -77.031591,
    "altitude_masl": 79,
    "surface_km2": 9.62
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-districts">
</span>
<span id="execution-results-POSTapi-districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-districts" data-method="POST"
      data-path="api/districts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-districts"
                    onclick="tryItOut('POSTapi-districts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-districts"
                    onclick="cancelTryOut('POSTapi-districts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-districts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-districts"
               value="Miraflores"
               data-component="body">
    <br>
<p>El nombre oficial del distrito. Must not be greater than 100 characters. Example: <code>Miraflores</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ubigeo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ubigeo"                data-endpoint="POSTapi-districts"
               value="150122"
               data-component="body">
    <br>
<p>El código único de 6 dígitos (INEI/RENIEC). Debe ser único. Must be 6 characters. Example: <code>150122</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province_id"                data-endpoint="POSTapi-districts"
               value="120"
               data-component="body">
    <br>
<p>El ID de la provincia a la que pertenece. The <code>id</code> of an existing record in the provinces table. Example: <code>120</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="POSTapi-districts"
               value="-12.111062"
               data-component="body">
    <br>
<p>Coordenada geográfica (Latitud). Example: <code>-12.111062</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="POSTapi-districts"
               value="-77.031591"
               data-component="body">
    <br>
<p>Coordenada geográfica (Longitud). Example: <code>-77.031591</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>altitude_masl</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="altitude_masl"                data-endpoint="POSTapi-districts"
               value="79"
               data-component="body">
    <br>
<p>Altitud en metros sobre el nivel del mar. Example: <code>79</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>surface_km2</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="surface_km2"                data-endpoint="POSTapi-districts"
               value="9.62"
               data-component="body">
    <br>
<p>Superficie total en kilómetros cuadrados. Example: <code>9.62</code></p>
        </div>
        </form>

                    <h2 id="gestion-administrativa-privado-PUTapi-districts--id-">Actualizar Distrito</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Modifica los datos de un distrito existente. Requiere Token.</p>

<span id="example-requests-PUTapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/districts/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Miraflores\",
    \"ubigeo\": \"150122\",
    \"province_id\": 120,
    \"latitude\": -12.111062,
    \"longitude\": -77.031591
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/districts/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Miraflores",
    "ubigeo": "150122",
    "province_id": 120,
    "latitude": -12.111062,
    "longitude": -77.031591
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-districts--id-">
</span>
<span id="execution-results-PUTapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-districts--id-" data-method="PUT"
      data-path="api/districts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-districts--id-"
                    onclick="tryItOut('PUTapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-districts--id-"
                    onclick="cancelTryOut('PUTapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-districts--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID del distrito a editar. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-districts--id-"
               value="Miraflores"
               data-component="body">
    <br>
<p>El nombre oficial del distrito. Must not be greater than 100 characters. Example: <code>Miraflores</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ubigeo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ubigeo"                data-endpoint="PUTapi-districts--id-"
               value="150122"
               data-component="body">
    <br>
<p>El código único de 6 dígitos (INEI/RENIEC). Debe ser único. Must be 6 characters. Example: <code>150122</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>province_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="province_id"                data-endpoint="PUTapi-districts--id-"
               value="120"
               data-component="body">
    <br>
<p>El ID de la provincia a la que pertenece. The <code>id</code> of an existing record in the provinces table. Example: <code>120</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="PUTapi-districts--id-"
               value="-12.111062"
               data-component="body">
    <br>
<p>Coordenada geográfica (Latitud). Example: <code>-12.111062</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="PUTapi-districts--id-"
               value="-77.031591"
               data-component="body">
    <br>
<p>Coordenada geográfica (Longitud). Example: <code>-77.031591</code></p>
        </div>
        </form>

                    <h2 id="gestion-administrativa-privado-DELETEapi-districts--id-">Eliminar Distrito</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Borra un distrito de la base de datos permanentemente. Requiere Token.</p>

<span id="example-requests-DELETEapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/districts/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/districts/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-districts--id-">
</span>
<span id="execution-results-DELETEapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-districts--id-" data-method="DELETE"
      data-path="api/districts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-districts--id-"
                    onclick="tryItOut('DELETEapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-districts--id-"
                    onclick="cancelTryOut('DELETEapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-districts--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID del distrito a eliminar. Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="lectura-publica">Lectura Pública</h1>

    

                                <h2 id="lectura-publica-GETapi-departments">Listar Departamentos</h2>

<p>
</p>

<p>Obtiene la lista completa de los 24 departamentos y el Callao.</p>

<span id="example-requests-GETapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/departments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/departments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-departments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;nombre&quot;: &quot;AMAZONAS&quot;,
            &quot;codigo_ubigeo&quot;: &quot;01&quot;,
            &quot;codigo_iso&quot;: &quot;PE-AMA&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 472991,
                &quot;superficie_km2&quot;: &quot;39249.13&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-6.22940000&quot;,
                &quot;longitud&quot;: &quot;-77.87280000&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;nombre&quot;: &quot;ANCASH&quot;,
            &quot;codigo_ubigeo&quot;: &quot;02&quot;,
            &quot;codigo_iso&quot;: &quot;PE-ANC&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1246247,
                &quot;superficie_km2&quot;: &quot;35881.30&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-9.52970000&quot;,
                &quot;longitud&quot;: &quot;-77.52920000&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;nombre&quot;: &quot;APURIMAC&quot;,
            &quot;codigo_ubigeo&quot;: &quot;03&quot;,
            &quot;codigo_iso&quot;: &quot;PE-APU&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 460315,
                &quot;superficie_km2&quot;: &quot;20895.77&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-13.62890000&quot;,
                &quot;longitud&quot;: &quot;-72.88610000&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;nombre&quot;: &quot;AREQUIPA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;04&quot;,
            &quot;codigo_iso&quot;: &quot;PE-ARE&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1556247,
                &quot;superficie_km2&quot;: &quot;63343.95&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-16.39330000&quot;,
                &quot;longitud&quot;: &quot;-71.52890000&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;nombre&quot;: &quot;AYACUCHO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;05&quot;,
            &quot;codigo_iso&quot;: &quot;PE-AYA&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 690055,
                &quot;superficie_km2&quot;: &quot;43803.26&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-13.16030000&quot;,
                &quot;longitud&quot;: &quot;-74.22530000&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;nombre&quot;: &quot;CAJAMARCA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;06&quot;,
            &quot;codigo_iso&quot;: &quot;PE-CAJ&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1603520,
                &quot;superficie_km2&quot;: &quot;33304.32&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-7.15470000&quot;,
                &quot;longitud&quot;: &quot;-78.51080000&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;nombre&quot;: &quot;CUSCO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;07&quot;,
            &quot;codigo_iso&quot;: &quot;PE-CUS&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1460966,
                &quot;superficie_km2&quot;: &quot;71986.50&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-13.51920000&quot;,
                &quot;longitud&quot;: &quot;-71.97670000&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;nombre&quot;: &quot;HUANCAVELICA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;08&quot;,
            &quot;codigo_iso&quot;: &quot;PE-HUV&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 435152,
                &quot;superficie_km2&quot;: &quot;22125.20&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.78690000&quot;,
                &quot;longitud&quot;: &quot;-74.97140000&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;nombre&quot;: &quot;HUANUCO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;09&quot;,
            &quot;codigo_iso&quot;: &quot;PE-HUC&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 865820,
                &quot;superficie_km2&quot;: &quot;37263.44&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-9.93000000&quot;,
                &quot;longitud&quot;: &quot;-76.23970000&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;nombre&quot;: &quot;ICA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;10&quot;,
            &quot;codigo_iso&quot;: &quot;PE-ICA&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 938258,
                &quot;superficie_km2&quot;: &quot;21305.51&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-14.06360000&quot;,
                &quot;longitud&quot;: &quot;-75.72920000&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;nombre&quot;: &quot;JUNIN&quot;,
            &quot;codigo_ubigeo&quot;: &quot;11&quot;,
            &quot;codigo_iso&quot;: &quot;PE-JUN&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1408224,
                &quot;superficie_km2&quot;: &quot;44328.80&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.07080000&quot;,
                &quot;longitud&quot;: &quot;-75.20890000&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;nombre&quot;: &quot;LA LIBERTAD&quot;,
            &quot;codigo_ubigeo&quot;: &quot;12&quot;,
            &quot;codigo_iso&quot;: &quot;PE-LAL&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 2054620,
                &quot;superficie_km2&quot;: &quot;25495.42&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-8.10000000&quot;,
                &quot;longitud&quot;: &quot;-79.03060000&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;nombre&quot;: &quot;LAMBAYEQUE&quot;,
            &quot;codigo_ubigeo&quot;: &quot;13&quot;,
            &quot;codigo_iso&quot;: &quot;PE-LAM&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1393148,
                &quot;superficie_km2&quot;: &quot;14461.52&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-6.76690000&quot;,
                &quot;longitud&quot;: &quot;-79.85060000&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;nombre&quot;: &quot;LIMA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;14&quot;,
            &quot;codigo_iso&quot;: &quot;PE-LIM&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 11261066,
                &quot;superficie_km2&quot;: &quot;34823.52&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.04530000&quot;,
                &quot;longitud&quot;: &quot;-77.03080000&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;nombre&quot;: &quot;LORETO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;15&quot;,
            &quot;codigo_iso&quot;: &quot;PE-LOR&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1154748,
                &quot;superficie_km2&quot;: &quot;368799.48&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-3.74810000&quot;,
                &quot;longitud&quot;: &quot;-73.24420000&quot;
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;nombre&quot;: &quot;MADRE DE DIOS&quot;,
            &quot;codigo_ubigeo&quot;: &quot;16&quot;,
            &quot;codigo_iso&quot;: &quot;PE-MDD&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 177570,
                &quot;superficie_km2&quot;: &quot;85300.54&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.59360000&quot;,
                &quot;longitud&quot;: &quot;-69.17670000&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;nombre&quot;: &quot;MOQUEGUA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;17&quot;,
            &quot;codigo_iso&quot;: &quot;PE-MOQ&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 197622,
                &quot;superficie_km2&quot;: &quot;15733.88&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-17.19420000&quot;,
                &quot;longitud&quot;: &quot;-70.93330000&quot;
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;nombre&quot;: &quot;PASCO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;18&quot;,
            &quot;codigo_iso&quot;: &quot;PE-PAS&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 294379,
                &quot;superficie_km2&quot;: &quot;25025.84&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-10.68250000&quot;,
                &quot;longitud&quot;: &quot;-76.25690000&quot;
            }
        },
        {
            &quot;id&quot;: 19,
            &quot;nombre&quot;: &quot;PIURA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;19&quot;,
            &quot;codigo_iso&quot;: &quot;PE-PIU&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 2069445,
                &quot;superficie_km2&quot;: &quot;35656.18&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-5.15250000&quot;,
                &quot;longitud&quot;: &quot;-80.65780000&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;nombre&quot;: &quot;PUNO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;20&quot;,
            &quot;codigo_iso&quot;: &quot;PE-PUN&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1279288,
                &quot;superficie_km2&quot;: &quot;66993.52&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-15.84030000&quot;,
                &quot;longitud&quot;: &quot;-70.02810000&quot;
            }
        },
        {
            &quot;id&quot;: 21,
            &quot;nombre&quot;: &quot;SAN MARTIN&quot;,
            &quot;codigo_ubigeo&quot;: &quot;21&quot;,
            &quot;codigo_iso&quot;: &quot;PE-SAM&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 965431,
                &quot;superficie_km2&quot;: &quot;51305.78&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-6.03470000&quot;,
                &quot;longitud&quot;: &quot;-76.97420000&quot;
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;nombre&quot;: &quot;TACNA&quot;,
            &quot;codigo_ubigeo&quot;: &quot;22&quot;,
            &quot;codigo_iso&quot;: &quot;PE-TAC&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 379400,
                &quot;superficie_km2&quot;: &quot;16075.73&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-18.00190000&quot;,
                &quot;longitud&quot;: &quot;-70.25190000&quot;
            }
        },
        {
            &quot;id&quot;: 23,
            &quot;nombre&quot;: &quot;TUMBES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;23&quot;,
            &quot;codigo_iso&quot;: &quot;PE-TUM&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 248097,
                &quot;superficie_km2&quot;: &quot;4668.50&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-3.57110000&quot;,
                &quot;longitud&quot;: &quot;-80.45920000&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;nombre&quot;: &quot;CALLAO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;24&quot;,
            &quot;codigo_iso&quot;: &quot;PE-CAL&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 1147951,
                &quot;superficie_km2&quot;: &quot;145.91&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.06310000&quot;,
                &quot;longitud&quot;: &quot;-77.14690000&quot;
            }
        },
        {
            &quot;id&quot;: 25,
            &quot;nombre&quot;: &quot;UCAYALI&quot;,
            &quot;codigo_ubigeo&quot;: &quot;25&quot;,
            &quot;codigo_iso&quot;: &quot;PE-UCA&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: 632859,
                &quot;superficie_km2&quot;: &quot;102199.28&quot;
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-8.36810000&quot;,
                &quot;longitud&quot;: &quot;-74.54330000&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments" data-method="GET"
      data-path="api/departments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments"
                    onclick="tryItOut('GETapi-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments"
                    onclick="cancelTryOut('GETapi-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="lectura-publica-GETapi-departments--id-">Ver Departamento</h2>

<p>
</p>

<p>Obtiene el detalle de un departamento específico por su ID.</p>

<span id="example-requests-GETapi-departments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/departments/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/departments/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-departments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 17,
        &quot;nombre&quot;: &quot;MOQUEGUA&quot;,
        &quot;codigo_ubigeo&quot;: &quot;17&quot;,
        &quot;codigo_iso&quot;: &quot;PE-MOQ&quot;,
        &quot;estadisticas&quot;: {
            &quot;poblacion&quot;: 197622,
            &quot;superficie_km2&quot;: &quot;15733.88&quot;
        },
        &quot;mapa&quot;: {
            &quot;latitud&quot;: &quot;-17.19420000&quot;,
            &quot;longitud&quot;: &quot;-70.93330000&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments--id-" data-method="GET"
      data-path="api/departments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments--id-"
                    onclick="tryItOut('GETapi-departments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments--id-"
                    onclick="cancelTryOut('GETapi-departments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-departments--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID del departamento (Ej: 15). Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="lectura-publica-GETapi-departments--id--provinces">Provincias de un Departamento</h2>

<p>
</p>

<p>Lista todas las provincias que pertenecen al departamento indicado.</p>

<span id="example-requests-GETapi-departments--id--provinces">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/departments/17/provinces" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/departments/17/provinces"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-departments--id--provinces">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1701,
            &quot;nombre&quot;: &quot;MARISCAL NIETO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;1701&quot;,
            &quot;departamento_id&quot;: 17,
            &quot;capital&quot;: &quot;Moquegua&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: null,
                &quot;superficie_km2&quot;: &quot;8671.58&quot;,
                &quot;altitud_msnm&quot;: 1428
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-17.19420000&quot;,
                &quot;longitud&quot;: &quot;-70.93330000&quot;
            }
        },
        {
            &quot;id&quot;: 1702,
            &quot;nombre&quot;: &quot;GENERAL SANCHEZ CERRO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;1702&quot;,
            &quot;departamento_id&quot;: 17,
            &quot;capital&quot;: &quot;Omate&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: null,
                &quot;superficie_km2&quot;: &quot;5681.71&quot;,
                &quot;altitud_msnm&quot;: 2169
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-16.67360000&quot;,
                &quot;longitud&quot;: &quot;-70.97060000&quot;
            }
        },
        {
            &quot;id&quot;: 1703,
            &quot;nombre&quot;: &quot;ILO&quot;,
            &quot;codigo_ubigeo&quot;: &quot;1703&quot;,
            &quot;departamento_id&quot;: 17,
            &quot;capital&quot;: &quot;Ilo&quot;,
            &quot;estadisticas&quot;: {
                &quot;poblacion&quot;: null,
                &quot;superficie_km2&quot;: &quot;1380.59&quot;,
                &quot;altitud_msnm&quot;: 33
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-17.62500000&quot;,
                &quot;longitud&quot;: &quot;-71.34330000&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments--id--provinces" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments--id--provinces"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments--id--provinces"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments--id--provinces" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments--id--provinces">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments--id--provinces" data-method="GET"
      data-path="api/departments/{id}/provinces"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments--id--provinces', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments--id--provinces"
                    onclick="tryItOut('GETapi-departments--id--provinces');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments--id--provinces"
                    onclick="cancelTryOut('GETapi-departments--id--provinces');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments--id--provinces"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/{id}/provinces</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments--id--provinces"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments--id--provinces"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-departments--id--provinces"
               value="17"
               data-component="url">
    <br>
<p>El ID del departamento padre. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="lectura-publica-GETapi-provinces--id-">Ver Provincia</h2>

<p>
</p>

<p>Muestra el detalle de una provincia específica.</p>

<span id="example-requests-GETapi-provinces--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/provinces/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/provinces/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-provinces--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Provincia no encontrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-provinces--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-provinces--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-provinces--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-provinces--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-provinces--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-provinces--id-" data-method="GET"
      data-path="api/provinces/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-provinces--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-provinces--id-"
                    onclick="tryItOut('GETapi-provinces--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-provinces--id-"
                    onclick="cancelTryOut('GETapi-provinces--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-provinces--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/provinces/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-provinces--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-provinces--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-provinces--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID de la provincia. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="lectura-publica-GETapi-provinces--id--districts">Distritos de una Provincia</h2>

<p>
</p>

<p>Lista todos los distritos que pertenecen a una provincia.</p>

<span id="example-requests-GETapi-provinces--id--districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/provinces/17/districts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/provinces/17/districts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-provinces--id--districts">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Provincia no encontrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-provinces--id--districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-provinces--id--districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-provinces--id--districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-provinces--id--districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-provinces--id--districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-provinces--id--districts" data-method="GET"
      data-path="api/provinces/{id}/districts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-provinces--id--districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-provinces--id--districts"
                    onclick="tryItOut('GETapi-provinces--id--districts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-provinces--id--districts"
                    onclick="cancelTryOut('GETapi-provinces--id--districts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-provinces--id--districts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/provinces/{id}/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-provinces--id--districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-provinces--id--districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-provinces--id--districts"
               value="17"
               data-component="url">
    <br>
<p>El ID de la provincia padre. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="lectura-publica-GETapi-districts--id-">Ver Distrito</h2>

<p>
</p>

<p>Muestra el detalle completo (coordenadas, ubigeo) de un distrito.</p>

<span id="example-requests-GETapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/districts/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/districts/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-districts--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Distrito no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-districts--id-" data-method="GET"
      data-path="api/districts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-districts--id-"
                    onclick="tryItOut('GETapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-districts--id-"
                    onclick="cancelTryOut('GETapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-districts--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID del distrito (Ubigeo). Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="lectura-publica-GETapi-search">Buscar Distritos</h2>

<p>
</p>

<p>Busca distritos por coincidencia de nombre.</p>

<span id="example-requests-GETapi-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/search?name=Miraflores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/search"
);

const params = {
    "name": "Miraflores",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 40107,
            &quot;nombre&quot;: &quot;MIRAFLORES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;040107&quot;,
            &quot;provincia_id&quot;: 401,
            &quot;codigo_postal&quot;: null,
            &quot;estadisticas&quot;: {
                &quot;superficie_km2&quot;: &quot;28.68&quot;,
                &quot;altitud_msnm&quot;: 2450
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-16.39470000&quot;,
                &quot;longitud&quot;: &quot;-71.52250000&quot;
            }
        },
        {
            &quot;id&quot;: 90406,
            &quot;nombre&quot;: &quot;MIRAFLORES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;090406&quot;,
            &quot;provincia_id&quot;: 904,
            &quot;codigo_postal&quot;: null,
            &quot;estadisticas&quot;: {
                &quot;superficie_km2&quot;: &quot;96.74&quot;,
                &quot;altitud_msnm&quot;: 3688
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-9.49390000&quot;,
                &quot;longitud&quot;: &quot;-76.81860000&quot;
            }
        },
        {
            &quot;id&quot;: 140115,
            &quot;nombre&quot;: &quot;MIRAFLORES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;140115&quot;,
            &quot;provincia_id&quot;: 1401,
            &quot;codigo_postal&quot;: null,
            &quot;estadisticas&quot;: {
                &quot;superficie_km2&quot;: &quot;9.62&quot;,
                &quot;altitud_msnm&quot;: 125
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.12170000&quot;,
                &quot;longitud&quot;: &quot;-77.02920000&quot;
            }
        },
        {
            &quot;id&quot;: 140136,
            &quot;nombre&quot;: &quot;SAN JUAN DE MIRAFLORES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;140136&quot;,
            &quot;provincia_id&quot;: 1401,
            &quot;codigo_postal&quot;: null,
            &quot;estadisticas&quot;: {
                &quot;superficie_km2&quot;: &quot;22.97&quot;,
                &quot;altitud_msnm&quot;: 133
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.16360000&quot;,
                &quot;longitud&quot;: &quot;-76.96360000&quot;
            }
        },
        {
            &quot;id&quot;: 140718,
            &quot;nombre&quot;: &quot;MIRAFLORES&quot;,
            &quot;codigo_ubigeo&quot;: &quot;140718&quot;,
            &quot;provincia_id&quot;: 1407,
            &quot;codigo_postal&quot;: null,
            &quot;estadisticas&quot;: {
                &quot;superficie_km2&quot;: &quot;226.24&quot;,
                &quot;altitud_msnm&quot;: 3677
            },
            &quot;mapa&quot;: {
                &quot;latitud&quot;: &quot;-12.27440000&quot;,
                &quot;longitud&quot;: &quot;-75.85030000&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-search" data-method="GET"
      data-path="api/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search"
                    onclick="tryItOut('GETapi-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search"
                    onclick="cancelTryOut('GETapi-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-search"
               value="Miraflores"
               data-component="query">
    <br>
<p>El nombre a buscar. Example: <code>Miraflores</code></p>
            </div>
                </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
