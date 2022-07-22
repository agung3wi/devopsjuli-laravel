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
                sh 'ssh-keyscan -H "52.221.180.133" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@52.221.180.133:/home/ubuntu/dev.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=public/upload --exclude=.git"
            }
        }
    }

    // Integration Test
    stage("Test"){
        //
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "integration test"'
        }
    }

    // Deploy Production
    stage("Deploy"){
        // deploy env dev
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-dev']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "13.215.253.152" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@13.215.253.152:/home/ubuntu/prod.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=public/upload --exclude=.git"
            }
        }
    }
}
