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

*composer install*
-Debes de tener un servidor de php ('Laragon - xampp o el de su preferencia')
-Importar a su motor de base de datos el script sql adjuntado en la carpeta SQL de la raiz del proyecto
-Nombre en .env para la base de datos: veterinaria
-.env: usuario root
-.env: usuario sin password

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
