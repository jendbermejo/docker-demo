node {
    def app
    $JENKINS_HOME="/var/jenkins_home/workspace/DockerSwarmDeployment/code" 
    currentBuild.result = "SUCCESS"
    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
         sh 'ssh docker@$(docker-machine ip node1) mkdir /home/docker/project'
         sh 'scp -r /var/jenkins_home/workspace/DockerSwarmDeployment/*  docker@$(docker-machine ip node1):/home/docker/docker-demo/'
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh '$JENKINS_HOME/vendor/bin/phpunit -c $JENKINS_HOME/tests/unit/phpunit.xml $JENKINS_HOME/tests/unit'
       }

       stage('Deploy'){

         print "Deploying the Application"
         sh '$PWD/stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
