#!/usr/bin/env bash
set -e

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SRC_DIR="${PROJECT_DIR}/src/wp-content/themes"

echo "==============================================="
echo " Iniciando análisis estático del WordPress personalizado"
echo " Directorio analizado: ${SRC_DIR}"
echo "==============================================="

if [ ! -d "${SRC_DIR}" ]; then
    echo "ERROR: El directorio ${SRC_DIR} no existe. Abortando análisis estático."
    exit 1
fi

cd "${PROJECT_DIR}"

echo "Instalando/actualizando dependencias de análisis (composer install)..."
composer install --no-interaction --no-progress

echo "-----------------------------------------------"
echo " Ejecutando PHPStan (análisis de tipos y lógica)"
echo "-----------------------------------------------"
./vendor/bin/phpstan analyse -c phpstan.neon || {
    echo "PHPStan encontró problemas. Revisar la salida anterior."
    exit 1
}

echo "-----------------------------------------------"
echo " Ejecutando PHP_CodeSniffer (estándares de código)"
echo "-----------------------------------------------"
./vendor/bin/phpcs || {
    echo "PHP_CodeSniffer encontró violaciones de estándares. Revisar la salida anterior."
    exit 1
}

echo "==============================================="
echo " Análisis estático completado SIN errores fatales."
echo "==============================================="
