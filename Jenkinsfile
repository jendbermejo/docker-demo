node {
    def app
    currentBuild.result = "SUCCESS"
    
    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
         sh 'scp -r /var/jenkins_home/workspace/DockerSwarmDeployment/*  docker@$(docker-machine ip node1):/home/docker/docker-demo/'
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
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
