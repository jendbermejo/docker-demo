node {
    def app
    
    $JENKINS_DATA_DIR="$JENKINS_HOME/workspace/SimpleDockerDemo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh 'swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh 'docker run phpunit/phpunit:6.5.3 -c tests/unit/phpunit.xml tests/unit'

       }

       stage('Deploy'){

         print "Deploying the Application"
         sh 'stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
