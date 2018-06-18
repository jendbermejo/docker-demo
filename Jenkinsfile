node {
    def app
    $BUILD_HOME="/var/jenkins_home/workspace/DockerSwarmDeployment/code" 
    $APP_HOMEE="/home/docker/"

    currentBuild.result = "SUCCESS"
    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
         sh 'scp -r $BUILD_HOME/*  docker@$(docker-machine ip node1):$APP_HOME'
         
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh '$BUILD_HOME/vendor/bin/phpunit -c $BUILD_HOME/tests/unit/phpunit.xml $BUILD_HOME/tests/unit'
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
