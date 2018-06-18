node {
    def app
    currentBuild.result = "SUCCESS"
    
    try {

       stage('Preparation'){

         print "Cloning the Github Repo"
         checkout scm
         sh 'echo $PWD'
         sh 'scp -r /var/jenkins_home/workspace/DockerSwarmDeployment/*  docker@$(docker-machine ip node1):/home/docker/docker-demo/'
       }

       stage('Build'){

         print "Initializing the Swarm cluster"
         sh '$PWD/swarm.sh'
       
       }

       stage('Test'){

         print "Running PHPUnit"
         sh '/var/jenkins_home/workspace/DockerSwarmDeployment/code/vendor/bin/phpunit -c /var/jenkins_home/workspace/DockerSwarmDeployment/code/tests/unit/phpunit.xml /var/jenkins_home/workspace/DockerSwarmDeployment/code/tests/unit'
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
