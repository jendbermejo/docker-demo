node {
    def app
    CWD="/home/docker/docker-demo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
       }

       stage('Build'){

         print "build"
         sh 'swarm.sh'
       
       }

       stage('Test'){

         print "test"

       }

       stage('Deploy'){

         print "deploy"
         sh 'stack.sh'
       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
