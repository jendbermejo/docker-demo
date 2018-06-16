DOCKER_HOST=192.168.99.102
docker swarm init --advertise-addr $DOCKER_HOST
TOKEN=$(docker swarm join-token -q manager)

for i in 2 ; do
  eval $(docker-machine env node$i)
  docker swarm join --advertise-addr $(docker-machine ip node$i) \ --token $TOKEN $(docker-machine ip node1):2377
done
eval $(docker-machine env node1)
docker node ls
