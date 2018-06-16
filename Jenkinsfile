node {
    def app

    currentBuild.result = "SUCCESS"

    try {

       stage('Checkout'){

          checkout scm
       }

       stage('Test'){

         print "test"


       }

       stage('Build Docker'){

         print "build"
       
       }

       stage('Deploy'){

         print "build"

       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
