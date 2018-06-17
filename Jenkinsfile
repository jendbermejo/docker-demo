node {
    def app
    $PWD="/var/jenkins_home/workspace/SimpleDockerDemo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
       }

       stage('Build'){

         print "build"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "test"

       }

       stage('Deploy'){

         print "deploy"
         sh '$PWD/stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
