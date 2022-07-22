node {
    checkout scm

    // deploy env dev
    stage("Build"){
        docker.image('shippingdocker/php-composer:7.4').inside('-u root') {
            sh 'rm composer.lock'
            sh 'composer install'
        }
    }

    // Testing
    stage("Test"){
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "Ini adalah test"'
        }
    }

    // Deploy
    stage("Deploy"){
        // deploy env dev
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-dev']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$IP_HOST" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@$IP_HOST:/home/ubuntu/$HOSTNAME/ --exclude=.env --exclude=storage --exclude=public/upload --exclude=.git"
            }
        }
    }
}
