# bopfest
### Proyecto de prácticas de Sistemas de Información Basados en Web (SIBW) - Ingeniería del Software.

Lenguajes utilizados:

* HTML
* CSS
* Javascript
* PHP

Tecnologías utilizadas:

- Sistema de plantillas [Twig](https://twig.symfony.com/)
- Base de datos: MySQL
- llamadas asíncronas AJAX con vanilla javascript (XMLHTTPRequest)


Este proyecto ha sido desarrollado utilizando el patrón Modelo Vista Controlador (MVC)


Principales características implementadas:

- Sistema de conexión de usuarios ( con diferentes privilegios para acceder o no a las funcionalidades de la web)
- Eventos:
	- Es posible añadir eventos nuevos mediante un formulario.
	- Es posible editar un evento en tiempo real en su página de evento.
	- Es posible eliminar eventos desde el panel de control (sólo usuarios con dicho privilegio).
- Sistema de comentarios para cada evento
	- Los usuarios moderadores pueden eliminar y/o editar comentarios.
- Sistema de etiquetas para eventos, posibilidad de filtrar en tiempo real por etiquetas.
- Sistema de palabras prohibidas para sustituir por asteriscos (*) en tiempo real al escribir un comentario.
- Galería: cada evento tiene su propia galería de imágenes


Todas las peticiones HTTP han sido implementadas siguiendo el estilo de arquitectura software RESTful.
Las peticiones GET, POST, PUT y DELETE se han implementado utilizando URL's limpias


Se ha tratado de aprovechar al máximo la funcionalidad que aporta el sistema de plantillas Twig, pudiendo renderizar sólo las secciones que difieran de un evento a otro y manteniendo todas las secciones que se mantienen iguales a lo largo de todas las páginas del mismo tipo.


La base de datos utilizada en MySQL tiene la siguiente estructura:

	+---------------------+
	| Tables_in_sibw      |
	+---------------------+
	| comentarios         |
	| etiquetas           |
	| etiquetas_eventos   |
	| eventos             |
	| galeria             |
	| imagenes_eventos    |
	| palabras_prohibidas |
	| polaroids           |
	| usuarios            |
	+---------------------+


Práctica realizada por:

- [Víctor Peralta Cámara](https://github.com/victorperalta93)
- [Diego García Aurelio](https://github.com/diegogaraur)
