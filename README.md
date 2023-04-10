# OM-Ilustraciones
## Temática
 Este proyecto es una tienda web de venta de ilustraciones personalizadas.
 
 Al entrar en la página nos lleva a una landing page que tendrá navegación, así como galerías con los distintos estilos de ilustración.
 
 Hay dos tipos de usuarios. Los clientes, quienes son los que realizan los encargos. También están los administradores, que pueden administrar por ejemplo las imagenes de las distintas galerías, los encargos, los usuarios...
 
 Los clientes realizan encargos, donde suben una la foto a ilustrar junto a diferentes características como el estilo de ilustración, número de personas, tamaño,    cantidad, así como un comentario para escribir algún mensaje como por ejemplo alguna indicación.

## Tecnologías
· Laravel 8
· PHP
· React
· JavaScript
· HTML5
· CSS3
· MySQL
· AWS

## Mockup provisional
En estos enlaces se pueden encotrar dos ejemplos de mockup de la página web. [Ejemplo 1](https://www.figma.com/file/3dfb7Uxak8I49CnrDpv5sz/Olga-Mart%C3%ADn-Ilustraciones?node-id=35%3A296&t=xLPs5jU21W7MlNWG-1), [Ejemplo 2](https://www.figma.com/file/OV8TEyGdTw9BVNSb3WZUYO/Proyecto-Final?node-id=0%3A1&t=zBj04deHTcwupfkz-1)

## Esquema E/R provisional
La base de datos será ampliada con una entidad Carrito, que tiene una relación 1 a 1 con Usuario, así como 0 a N con Encargo. De esta manera un usuario tiene un carrito y el carrito puede tener 0 o muchos encargos.
![image](https://user-images.githubusercontent.com/72193242/230787643-3073c120-4246-4821-9dc4-dfdeb91a43e2.png)
