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
                sh "cp .env.example .env"
                sh 'sed -i -e "s/DB_DATABASE=homestead/DB_DATABASE=${EMOJI_API_DB_NAME}/g" .env'
                sh 'sed -i -e "s/DB_USERNAME=homestead/DB_USERNAME=${EMOJI_API_DB_USER}/g" .env'
                sh 'sed -i -e "s/DB_PASSWORD=secret/DB_PASSWORD=\"${EMOJI_API_DB_PASSWORD}\"/g" .env'
                sh "sudo chown -R www-data:${PROD_USER} storage/"
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

        stage('Run migrations'){
            steps {
                sh 'php artisan migrate:refresh --seed --force'
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
