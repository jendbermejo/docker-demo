node {
    def app
    $JENKINS_SERVER_HOME="/var/jenkins_home/workspace/DockerSwarmDeployment/code" 
    currentBuild.result = "SUCCESS"
    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
         sh 'scp -r /var/jenkins_home/workspace/DockerSwarmDeployment/*  docker@$(docker-machine ip node1):/home/docker/'
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh '$JENKINS_SERVER_HOME/vendor/bin/phpunit -c $JENKINS_SERVER_HOME/tests/unit/phpunit.xml $JENKINS_SERVER_HOME/tests/unit'
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
