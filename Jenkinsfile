node {
    def app
    CWD="/var/jenkins_home/workspace/SimpleDockerDemo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
       }

       stage('Build'){

         print "build"
         sh 'ls $CWD'
       
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
