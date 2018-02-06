## Instalación
  ### Clonar repositorio
    git clone https://github.com/altamiranoesdras/sysbase.git

  ### Acceder a la carpeta del repositorio clonado
    cd sysbase
    
  ### Descargar dependencias 
    npm install -g bower (si no tienes instalado bower)
    composer install 		
    bower install
    
  ### Copiar archivo de entornos y editar 
    cp .env.example .env 
      (Colocar base de datos en archivo .env)
    
  ### Generar clave de encryptacio para la app
    php artisan key:generate
  
  ### Crear tablas y datos
    php artisan migrate --seed
    
  ### Credenciales de acceso
    Usuario : admin
    Password : admin
  
 Listo
 
   ### Puedes probar el generador de formularios con el siguiente comando
    php artisan infyom:api_scaffold --fromTable --tableName=notas Nota
 
 ## Programas recomendados

  ### Laragon
    https://sourceforge.net/projects/laragon/files/releases/3.1/laragon-wamp.exe
      
  ### Sublime text
    https://www.sublimetext.com/3


