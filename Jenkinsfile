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

        stage('Static Analysis') {
            steps {
                echo 'Ejecutando análisis estático sobre el código del WordPress personalizado (PHPStan + PHP_CodeSniffer)'
                sh '''
                cd ${WORKSPACE}/wp-custom
                ./analysis/static_analysis.sh
                '''
            }
        }

        stage('Build (no-op for Compose)') {
            steps {
                echo 'No se construye imagen adicional aquí: se usan Docker Compose + Dockerfile de wp-custom.'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Desplegando stack principal (WordPress oficial) con docker compose'
                sh '''
                cd ${COMPOSE_PROJECT_DIR}
                docker compose down
                docker compose pull
                docker compose up -d
                '''

                echo 'Desplegando stack WordPress personalizado (puerto 8081)'
                sh '''
                cd ${WORKSPACE}/wp-custom
                docker compose down
                docker compose build
                docker compose up -d
                '''
            }
        }
    }

    post {
        success {
            echo 'Pipeline completado exitosamente: análisis estático OK y ambos WordPress desplegados.'
        }
        failure {
            echo 'El pipeline ha fallado. Revisar especialmente el stage de Static Analysis para ver los problemas detectados.'
        }
    }
}
