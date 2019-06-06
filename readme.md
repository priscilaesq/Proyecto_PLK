# Como construir la imagen
  docker build -t lamp -f php.dockerfile .

# Como construir el contenedor y desplegarlo
  docker-compose up

# Como construir el contenedor y desplegarlo en background mode
  docker-compose up -d

# Detener contenedores
  docker-compose down

# Detener contenedores y restaurar volumenes
  docker-compose down -v

