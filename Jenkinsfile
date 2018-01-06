pipeline {
    agent { label 'webserver' }

    environment {
        PROD_USER = credentials('PROD_USER')
        PROD_HOST_IP = credentials('PROD_HOST_IP')
        PROD_SSH_KEY_PATH = credentials('PROD_SSH_KEY_PATH')
        RELEASE_DOMAIN = 'emoji-api.maartendev.me'
        DEPLOY_PATH = "/var/www/${RELEASE_DOMAIN}"
    }

    stages {
        stage('Install composer dependencies'){
            steps {
                sh 'composer install --optimize-autoloader'
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
            steps {
                sh "rm -rf ${DEPLOY_PATH}/*"
                sh "cp -r ${WORKSPACE}/* ${DEPLOY_PATH}/*"
            }
        }
    }
}
