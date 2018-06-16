node {
    def app

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
       }

       stage('Build'){

         print "build"
         sh 'ssh -A docker@192.168.99.102'
       
       }

       stage('Test'){

         print "test"

       }

       stage('Deploy'){

         print "deploy"

       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
