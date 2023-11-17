# Sistema de Incidencias Web
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
[![License](https://img.shields.io/github/license/Ileriayo/markdown-badges?style=for-the-badge)](https://mit-license.org/)

Este es un sistema web para la gestión de incidencias, desarrollado con Laravel y Bootstrap.

## Descripción del Proyecto
El Sistema de Incidencias Web es una aplicación diseñada para permitir a los usuarios reportar, seguir y resolver incidencias de manera eficiente. Con una interfaz intuitiva basada en Bootstrap y un backend robusto construido con Laravel, la aplicación proporciona una plataforma completa para la gestión de problemas.

### Características Principales
- :memo: Registro y autenticación de usuarios.
- :bar_chart: Creación y seguimiento de incidencias.
- :busts_in_silhouette: Asignación de incidencias a equipos o individuos responsables.
- :speech_balloon: Historial de seguimiento y comentarios para cada incidencia.

## Tecnologías Utilizadas
La aplicación está construida utilizando las siguientes tecnologías:
- **PHP**: [8.2.11]
- **Laravel**: [10.31.0]
- **Bootstrap**: [5.3.2]

## Instalación
A continuación se describen los pasos para configurar la aplicación localmente:
### Prerrequisitos
Asegúrese de tener instalado lo siguiente:

- :whale: [Docker](https://www.docker.com/)
- :package: [Imagen de Docker](https://hub.docker.com/_/phpmyadmin)

### Pasos de Instalación

1. **Crear el contenedor Docker con la imagen correspondiente:**
   > Asegúrese de tener Docker instalado.
   
    Utilice el siguiente comando para crear el contenedor:
     ```bash
     docker run -d -p 3306:3306 --name phpmyadmin -e PMA_HOST=db phpmyadmin/phpmyadmin
     
2. **Clonar el repositorio:**
   ```git
   git clone https://github.com/AnderLH/Reto-1-DI-SGE.git
3. **Ejecutar las migraciones:**
    ```bash
    php artisan migrate
    
4. **Ejecutar las semillas:**
    ```bash
    php artisan db:Seed DatabaseSeeder
    
5. **Iniciar el servidor:**
    ```bash
    ./vendor/bin/sail up -d
    
La aplicación estará disponible en el localhost.

## Uso
- :globe_with_meridians: Acceda a la aplicación a través de su navegador.
- :key: Inicie sesión o registre una nueva cuenta.
- :computer: Navegue por la interfaz para crear, asignar y seguir incidencias.

## Documentación
La documentación completa de la aplicación, se encuentra en el siguiente <a href="https://docs.google.com/document/d/1hRvqnwDtugAcNwjM6PoeQO0K-DOKeIddRQky6NoFnYs/edit?usp=sharing">documento</a>.

## Contacto
Para preguntas o problemas, puede ponerse en contacto con los mantenedores del proyecto:
- :computer:  [Ander](ander.lopezdevallejohi@elorrieta-errekamari.com)
- :computer:  [Baichun](baichun.qi@elorrieta-errekamari.com)
## Licencia
Distribuido bajo la [MIT license](https://opensource.org/licenses/MIT).