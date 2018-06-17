node {
    def app
    $PIPELINE="SimpleDockerDemo"
    $JENKINS_DATA_DIR="$JENKINS_HOME/workspace/$PIPELINE"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$JENKINS_DATA_DIR/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh 'docker run phpunit/phpunit:6.5.3 -c tests/unit/phpunit.xml tests/unit'

       }

       stage('Deploy'){

         print "Deploying the Application"
         sh '$JENKINS_DATA_DIR/stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
