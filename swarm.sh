eval $(docker-machine env node1 --shell sh)
docker swarm init --advertise-addr $(docker-machine ip node1)

TOKEN=$(docker swarm join-token -q manager)

for i in 2 ; do
  eval $(docker-machine env node$i --shell sh)
  docker swarm join --advertise-addr $(docker-machine ip node$i) \ --token $TOKEN $(docker-machine ip node1):2377
done

eval $(docker-machine env node1 --shell sh)
docker node ls
