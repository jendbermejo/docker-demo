eval $(docker-machine env node1 --shell sh)
docker stack deploy -c $JENKINS_HOME/workspace/DockerSwarmDeployment/docker-compose.yml stock13
