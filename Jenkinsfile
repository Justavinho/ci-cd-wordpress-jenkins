pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_DIR = "${WORKSPACE}"
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build (no-op for Compose)') {
            steps {
                echo 'No se construye imagen custom por ahora (se usan imágenes oficiales)'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Desplegando con docker compose'
                sh '''
                cd ${COMPOSE_PROJECT_DIR}
                docker compose down
                docker compose pull
                docker compose up -d
                '''
            }
        }
    }

    post {
        success {
            echo 'Despliegue completado exitosamente.'
        }
        failure {
            echo 'El despliegue ha fallado. Revisar logs.'
        }
    }
}
