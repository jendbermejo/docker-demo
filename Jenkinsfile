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
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh 'echo $JENKINS_DATA_DIR/README.md'

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
