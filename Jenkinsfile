node {
    def app

    currentBuild.result = "SUCCESS"

    try {

       stage('Checkout Repo'){

          checkout scm
       }

       stage('Run Test'){

         print "test"


       }

       stage('Run Build'){

         print "build"
         sh 'php --version'
       
       }

       stage('Run Deploy'){

         print "build"

       }

    }
    catch (err) {

        currentBuild.result = "FAILURE"
        throw err
    }
}
