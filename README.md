## VETERINARIA CITAS

![image](https://user-images.githubusercontent.com/124646372/218007488-fb2c02c3-abee-4a80-ae61-c8ea4578994e.png)


Se desarrolla sistema para el registro de citas, a continuacion se listan los items importantes de usabilidad e instalación del software. (' el sistema incluye funcionalidad de validación de fechas, registros de mascotas, usuarios, el sistema se puede adaptar facilmente a cualquier necesidad).

-Laravel framework
-servidor local Laragon
-Bd mysql para el ejercicio
-Css
-Bootstrap
-libreria de fullCalendar
-Libreria de moment
-libreria de Jquery


## Instalacion

-Después de clonar o instalar el repositorio, debes de ejecutar el comando *composer install* para que este actualice o instale archivos necesarios de laravel...
-Debes de tener un servidor de php ('Laragon - xampp o el de su preferencia')
-Importar a su motor de base de datos el script sql adjuntado en la carpeta SQL de la raiz del proyecto
-Nombre en .env para la base de datos: veterinaria
-.env: usuario root
-.env: usuario sin password

#Pasos de instalación con Laragon

1: clonar el repositorio
![image](https://user-images.githubusercontent.com/124646372/219443462-b329e305-9ae1-4d5b-ad2a-bb7069029151.png)

2: Tener instalado GIT en su sistema operativo
3: Clic derecho dentro de la carpeta 'www' en la raiz de su sistema C:\laragon\www, y finaliza dando clic en 'Git bash here'
![image](https://user-images.githubusercontent.com/124646372/219444054-3e2bcdac-f23f-40a0-ac6f-7dbd8916ed3d.png)
4: cuando ejecute la consola escribes el comando git clone seguido de la url clonada del repositorio.... git clone https://github.com/deiner96/veterinariaCitas.git  y le dan enter.
5. Abrir la raiz del proyecto ya clonado: C:\laragon\www\veterinariaCitas   estando ya en la raiz del proyecto, dar clic derecho y seleccionan la opcion 'Git bash here' y ejecutan el comando: composer install     el comando lo que hace es instalar archivos necesarios para el funcionamiento de cualquier proyecto laravel
6. IMPORTANTE verificar que el sistema le haya creado el archivo .env en la raiz del proyecto de lo contrario deberá eliminar la carpeta Vendor y ejecutar el comando: composer update --ignore-platform-reqs  si genera erro al fonalizar ejecutan el comando: composer install --ignore-platform-reqs
![image](https://user-images.githubusercontent.com/124646372/219448679-cccbaffc-6ef7-46aa-8f3e-cf1c80d28c38.png)

8. reinician laragon para que este automaticamente cree el enlace https para que abran el proyecto en su navegador
9. Luego de reiniciar Laragon dan clic en el icono superior derecho 'h' referente a las configuraciones host del sistema...
![image](https://user-images.githubusercontent.com/124646372/219445810-c42edc8a-903f-46db-b82e-31b278114c85.png)
![image](https://user-images.githubusercontent.com/124646372/219445970-99ba9048-9d05-4422-8660-96f588365cb5.png)
pueden copiar ese enlace en su navegador y ya validar
8. Descargar el sql y configurar a su necesidad


## Introduccion

-**El sistema permite registro de usuarios**

-**EL Sistema permite login y logout**

-**El sistema permite registro de mascotas**

-**El software permite el registro de citas unicas a un lapso de value de 45 minutos inicial o quemado ('puede modificarse manualmente')**

-**El software alerta si la fecha a registrar de la cita ya está caducada o no disponible**


### notas Importantes de usabilidad

- **Recuerde registrar primero al menos una mascota para poder registrar citas**
- **En el menu VISUALIZA Y REGISTRA TU CITA: al dar clic en una cuadricula de fecha se abrirá un modal, es facil de completar, finaliza con el boton guardar para poder registrar su cita**
- **En el menu VISUALIZA Y REGISTRA TU CITA: Al finalizar o al ya tener citas registradas podrá ver por (mes-semana-dia) las citas ya registradas por hora y fecha**


## Software-licencia

Desarrollado por Deiner joan loaiza giraldo
tecnólogo en análisis y desarrollo de sistemas de información
contacto: deinerlg17@gmail.com

**Codigo libre**
