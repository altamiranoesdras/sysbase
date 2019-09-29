## Instalación
  ### Clonar repositorio
    git clone https://github.com/altamiranoesdras/sysbase.git

  ### Acceder a la carpeta del repositorio clonado
    cd sysbase
    
  ### Descargar dependencias 
    npm install 
    composer install 		
    
  ### Copiar archivo de entornos y editar 
    cp .env.example .env 
    (nombre y credenciales de la base de datos en nevo archivo .env)
    
  ### Generar clave de encryptacio para la app
    php artisan key:generate
  
  ### Crear tablas y datos
    php artisan migrate --seed
    
  ### Instalar clientes por defecto de Laravel Passport 
     php artisan passport:install
     
  ### Credenciales de acceso
    Usuario : admin
    Password : admin
  
 Listo
 
   ### Puedes probar el generador de formularios y/o API con el siguiente comando
    php artisan infyom:api_scaffold --fromTable --tableName=notas Nota
 
 ## Programas recomendados

  ### Laragon
    https://sourceforge.net/projects/laragon/files/releases/3.1/laragon-wamp.exe
      
  ### Sublime text
    https://www.sublimetext.com/3


