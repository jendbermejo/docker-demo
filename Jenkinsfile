node {
    def app

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
       }

       stage('Build'){

         print "build"
         sh 'docker-compose build'
       
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
