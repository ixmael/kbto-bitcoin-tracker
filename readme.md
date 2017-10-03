# KTBO-bitcoin-tracker
Rastrea el tipo de cambio del Bitcoin a pesos mexicanos.

## Instalación
Es necesario tener instalado [Composer](https://getcomposer.org/) y [npm](https://www.npmjs.com/).

### Servidor
El proyecto utiliza [Laravel](https://laravel.com/). El proyecto se encuentra en la carpeta **bitcoin_tracker**.

Para instalar las dependencias hay que ejecutar lo siguiente en la carpeta **bitcoin_tracker**:
```bash
composer install
```

#### Configuración
El proyecto requiere el archivo de parámetros **bitcoin_tracker/env**. Los parámetros básicos del proyecto están en el archivo
**bitcoin_tracker/.env.example**.
```
cp bitcoin_tracker/.env.example bitcoin_tracker/.env
```

Hay que generar la llave para la aplicación con el siguiente comando (dentro de la carpeta *bitcoin_tracker*):
```
php artisian key:generate
```

##### Parámetros
Los parámetros básicos que hay que iniciar son:
* **APP_NAME**: Nombre de la aplicación
* **APP_ENV**: Ambiente de la aplicación. Para producción este parámetro debe
ser **"production"**.
* **APP_URL**: URL de la aplicación.

* **DB_* **: Establece la conección con la base de datos.


Además de los parámetros básicos del proyecto (base de datos, url de la
aplicación) se agregaron los siguientes parámetros:
* **BITSO_API**: es la url para consultar la API de [BITSO](https://bitso.com/). Por el momento se utiliza el siguiente nodo *https://api.bitso.com/v3/ticker/?book=btc_mxn*.
* **TRACKER_TIME_FETCH**: Establece la periodicidad de la consulta entre la interfaz web y la aplicación PHP. Esta consulta sólo depende de los registros existentes en la base de datos y no tiene que ver con la consulta a la API de BITSO.

##### Crear el esquema en la base de datos
El proyecto necesita una base de datos donde se almacena la consulta a la API de BITSO. Para crear las tablas requeridas se ejecuta el siguiente comando:
```bash
php artisian migrate
```

##### Worker
El proceso que alimenta la base de datos con la consulta a la API de BITSO se realiza a través de un comando. Para llevar a cabo la consulta se utiliza el comando
```bash
php artisian bitcoin:update
```

Para automatizar la consulta a la API se recomienda utilizar **cron**. Para agregar la tarea al crontab.
```bash
crontab -e
```
Agregar la siguiente línea (ejecuta el comando de actualización cada 5 minutos):
```
*/5 * * * * php /path/to/project/bitcoin_tracker/artisan bitcoin:update
```

### Interfaz de usuario
Los archivos para la interfaz gráfica son generados con npm. Las siguientes operaciones ser llevan a cabo en la carpeta **bitcoin_tracker**.

Primero se instalan las dependencias de npm con el siguiente comando:
```bash
npm install
```

Una vez terminadas se generan los archivos con la siguiente instrucción:
```bash
npm run production
```
