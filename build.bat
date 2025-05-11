@echo off

if "%1"=="-f" (

    echo Creando la imagen a partir del Dockerfile...

    docker build -t mysql-games .

    echo Creada la imagen, ahora el contenedor...

    docker run -d --name games -p 3306:3306 mysql-games

    echo Creado el contenedor, listo para usar :D

) else if "%1"=="-d" (

    echo Borrando el contenedor y la imagen...

    docker stop games

    docker rm games

    docker rmi mysql-games

    echo Se ha borrado el contenedor y la imagen :D

) else (

    echo Levantando el contenedor...

    docker start games

    echo Listo para usar :D

)