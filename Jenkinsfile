pipeline {
    agent { label 'webserver' }

    environment {
        PROD_USER = credentials('PROD_USER')
        PROD_HOST_IP = credentials('PROD_HOST_IP')
        PROD_SSH_KEY_PATH = credentials('PROD_SSH_KEY_PATH')
        EMOJI_API_DB_NAME = credentials('EMOJI_API_DB_NAME')
        EMOJI_API_DB_USER = credentials('EMOJI_API_DB_USER')
        EMOJI_API_DB_PASSWORD = credentials('EMOJI_API_DB_PASSWORD')
        RELEASE_DOMAIN = 'emoji-api.maartendev.me'
        DEPLOY_PATH = "/var/www/${RELEASE_DOMAIN}"
    }

    stages {
      stage('Configure enviroment variables for application'){
            steps {
                sh 'sed -i -e "s/DB_DATABASE=/DB_DATABASE=${EMOJI_API_DB_NAME}/g" "${DEPLOY_PATH}/.env"'
                sh 'sed -i -e "s/DB_USERNAME=/DB_USERNAME=${EMOJI_API_DB_USER}/g" "${DEPLOY_PATH}/.env"'
                sh 'sed -i -e "s/DB_PASSWORD=/DB_PASSWORD=${EMOJI_API_DB_PASSWORD}/g" "${DEPLOY_PATH}/.env"'
            }
        }
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
                sh "cp -r ${WORKSPACE}/* ${DEPLOY_PATH}/"
            }
        }
    }
}
