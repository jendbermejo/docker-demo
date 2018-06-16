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
         sh 'ssh docker@192.168.99.100 docker stack ls' 
       
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
