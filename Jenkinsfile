node {
    def app
    
    $JENKINS_DATA_DIR="$JENKINS_HOME/workspace/SimpleDockerDemo"
    $DOCKER_SWARM_MGR="/home/docker/docker-demo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$DOCKER_SWARM_MGR/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh 'docker run phpunit/phpunit:6.5.3 -c tests/unit/phpunit.xml tests/unit'

       }

       stage('Deploy'){

         print "Deploying the Application"
         sh '$DOCKER_SWARM_MGR/stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
