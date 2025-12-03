<?php get_header(); ?>

<main class="site-main">
    <section class="hero">
        <div class="container">
            <h1>🚀 WordPress Personalizado - CI/CD Pipeline</h1>
            <p class="subtitle">Desplegado automáticamente con Jenkins, Docker y GitHub</p>
            <div class="version-info">
                <span class="badge">Versión 3.0</span>
                <span class="badge">Deploy: <?php echo date('Y-m-d H:i:s'); ?></span>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>🔧 Tecnologías Implementadas</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="icon">🐳</div>
                    <h3>Docker</h3>
                    <p>Contenedores para WordPress y MariaDB con volúmenes persistentes</p>
                </div>
                <div class="feature-card">
                    <div class="icon">⚙️</div>
                    <h3>Jenkins</h3>
                    <p>Pipeline automatizado con stages de análisis y deploy</p>
                </div>
                <div class="feature-card">
                    <div class="icon">📊</div>
                    <h3>Análisis Estático</h3>
                    <p>PHPStan y PHP_CodeSniffer para calidad de código</p>
                </div>
                <div class="feature-card">
                    <div class="icon">🔄</div>
                    <h3>GitHub</h3>
                    <p>Control de versiones y trigger automático de builds</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pipeline-info">
        <div class="container">
            <h2>📋 Flujo del Pipeline</h2>
            <ol class="pipeline-steps">
                <li><strong>Checkout:</strong> Jenkins clona el repositorio desde GitHub</li>
                <li><strong>Static Analysis:</strong> PHPStan y PHPCS validan el código</li>
                <li><strong>Build:</strong> Docker construye la imagen personalizada</li>
                <li><strong>Deploy:</strong> Docker Compose levanta los contenedores</li>
            </ol>
        </div>
    </section>

    <section class="status">
        <div class="container">
            <div class="status-box success">
                <h3>✅ Estado del Sistema</h3>
                <p><strong>Pipeline:</strong> SUCCESS</p>
                <p><strong>Servidor:</strong> <?php echo gethostname(); ?></p>
                <p><strong>PHP:</strong> <?php echo phpversion(); ?></p>
                <p><strong>WordPress:</strong> <?php echo get_bloginfo('version'); ?></p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
