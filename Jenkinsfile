pipeline {
    agent { docker 'php:latest' }

    environment {
        PROD_USER = credentials('PROD_USER')
        PROD_HOST_IP = credentials('PROD_HOST_IP')
        PROD_SSH_KEY_PATH = credentials('PROD_SSH_KEY_PATH')
        RELEASE_DOMAIN = 'emoji-api.maartendev.me'
    }

    stages {
       stage('Install dependencies'){
            steps {
                sh 'apt-get update'
                sh 'apt-get upgrade -y'
                sh 'apt-get install gnupg'
                sh 'curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer'
                sh 'composer self-update'
                sh 'curl -sL https://deb.nodesource.com/setup_8.x -o nodesource_setup.sh'
                sh 'bash nodesource_setup.sh'
                sh 'apt-get install nodejs'
                sh 'apt-get install build-essential'
            }
        }
        stage('Clear cache'){
            steps {
                sh 'php artisan cache:clear'
                sh 'php artisan config:clear'
            }
        }
        stage('Run migrations'){
            steps {
                sh 'php artisan migrate --force'
            }
        }

        stage('Warm up cache'){
            steps {
                sh 'composer install --optimize-autoloader'
                sh 'php artisan config:cache'
                sh 'php artisan route:cache'
            }
        }

        stage('Build assets'){
            steps {
                sh 'npm install'
                sh 'npm run prod'
            }
        }

        stage('deploy'){
            agent {
                label 'master'
            }
            steps {
                sh "ssh -o StrictHostKeyChecking=no ${PROD_USER}@${PROD_HOST_IP} -i ${PROD_SSH_KEY_PATH} 'rm -rf /var/www/${RELEASE_DOMAIN}/*'"
                sh "scp -o StrictHostKeyChecking=no -r -i ${PROD_SSH_KEY_PATH} . ${PROD_USER}@${PROD_HOST_IP}:/var/www/${RELEASE_DOMAIN}/"
            }
        }
    }
}
