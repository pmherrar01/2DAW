# Proyecto: Sitio web de una marca de ropa (con todos los apartados requeridos)

## 1) Clasificación de elementos de diseño (percepción visual)

- Elementos de identificación
  - Logotipo y nombre de la marca
  - Eslogan de temporada (si aplica)
  - Favicon e identidad cromática
  - Tipografía corporativa
  - Pie de página con derechos y datos legales

- Elementos de navegación
  - Menú principal global: Mujer, Hombre, Infantil, Accesorios, Novedades, Ofertas
  - Navegación por facetas/filtros: talla, color, precio, material, colección, disponibilidad
  - Buscador con criterios (texto, categoría, rango de precio, color, talla)
  - Migas de pan (breadcrumbs)
  - Selector de idioma: ES, EN, FR, DE, PT
  - Enlaces utilitarios: Mapa del sitio, Contacto, Tiendas
  - Paginación en listados
  - Enlaces a detalle de producto

- Elementos de contenido
  - Listados de productos por categoría
  - Fichas de producto: nombre, precio, imagen principal, galería, descripción, composición, guía de tallas
  - Banners/Hero de campaña
  - Información de contacto: dirección de la marca y oficinas/tiendas
  - Mapa del sitio (estructura del portal)
  - Políticas: envíos, devoluciones, privacidad, términos
  - Contenido multidioma

- Elementos de interacción
  - Botón “Añadir a favoritos” (lista personalizada)
  - Controles de filtros (checkbox, radio, rango de precio, select)
  - Buscador (input + submit)
  - Selector de idioma
  - Formulario de sugerencias (nombre, email, asunto, mensaje, consentimiento)
  - Interacciones de accesibilidad: foco visible, estados hover/active, validación
  - Compartir en redes (opcional)

### Boceto / Sketch del sitio
Consulta el wireframe:
- Ver wireframe: [wireframe-home.svg](wireframe-home.svg)

El wireframe muestra:
- Cabecera con logotipo, menú global, buscador y selector de idioma.
- Hero de campaña.
- Listado de productos destacados.
- Barra lateral con filtros y accesos (Favoritos y Mapa del sitio).
- Pie con contacto, tiendas, políticas y redes.

---

## 2) Tipo de estructura de navegación y justificación

Estructura recomendada: Híbrida (Jerárquica + Facetas)
- Jerarquía principal por categorías: Mujer, Hombre, Infantil, Accesorios, Novedades, Ofertas.
- Dentro de cada categoría, navegación por facetas (talla, color, precio, material, colección).
- Justificación:
  - La jerarquía facilita el reconocimiento y acceso inicial (modelo mental estándar en e-commerce).
  - Las facetas permiten refinar rápidamente según preferencias, mejorando encontrabilidad y eficiencia.
  - Se mantienen accesos globales (buscador, selector de idioma, contacto, mapa del sitio) que soportan tareas transversales.
  - Escalable para campañas y colecciones temporales (hubs desde “Novedades”).

---

## 3) Guía de estilos
La guía de estilos completa está separada en el archivo “guia-de-estilos.md”.

- Ver guía de estilos: [guia-de-estilos.md](guia-de-estilos.md)

Incluye: identidad visual, paleta cromática, tipografías, grid y espaciado, componentes UI (header, navegación, tarjetas de producto, botones, formularios, filtros, mensajes), estados de interacción, i18n, accesibilidad, iconografía y ejemplos de uso.

---

## 4) Estructura HTML5 de la página principal (solo estructura)
Se entrega en el archivo “index.html” con la estructura semántica, sin programación de funcionalidades. Incluye:
- Cabecera con logotipo, navegación principal, buscador y selector de idioma.
- Secciones de hero y listados de productos.
- Barra lateral con filtros y accesos clave.
- Pie con información de contacto, tiendas y enlaces legales.
- Formulario de sugerencias.
- Marcado accesible e internacionalizable.

Pantallazo de la estructura (wireframe renderizado como SVG):
- Ver pantallazo: [pantallazo-home.svg](pantallazo-home.svg)