node {
    def app
    $PWD="/var/jenkins_home/workspace/SimpleDockerDemo"

    currentBuild.result = "SUCCESS"

    try {

       stage('Preparation'){

          checkout scm
          sh 'docker-machine ssh node1 cd docker-demo'
          sh 'echo $PWD'
          sh 'git pull'
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
