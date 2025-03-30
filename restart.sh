docker-compose down --volumes --remove-orphans     
docker network prune
docker-compose build
docker-compose up