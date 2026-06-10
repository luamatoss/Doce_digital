<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Utilizador.php';
?> 
 
 <!-- FOOTER -->
 <footer class="footer mt-auto py-4">
        <div class="container text-center">


            <!-- Logo -->
            <img src="<?= BASE_URL ?>Assets/Imagens/Icones/logo_doce_digital.png" alt="Doce Digital logo" style="max-width: 100px;">

            <!-- Links -->
            <div class="d-flex justify-content-center gap-3 mb-2">
            <a href="<?= BASE_URL ?>index.php">Home</a>
<a href="<?= BASE_URL ?>Pages/sobre_nos.php">Sobre</a>
                <a href="<?= BASE_URL ?>Pages/receitas.php" class="footer-link">Receitas</a>
                <a href="<?= BASE_URL ?>Pages/videos.php" class="footer-link">Tutoriais</a>
                <a href="<?= BASE_URL ?>Pages/contactos.php" class="footer-link">Contacto</a>
            </div>

            <!-- Redes Sociais -->
            <div class="d-flex justify-content-center gap-4 mt-3">
                <a href="https://instagram.com/simpa.baker" target="_blank" class="footer-icon"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.me/351937646633" target="_blank" class="footer-icon"><i
                        class="fa-brands fa-whatsapp"></i></a>
                <a href="mailto:jessica_amorim@hotmail.com" class="footer-icon"><i class="fa-solid fa-envelope"></i></a>
            </div>
            <!-- Copyright -->
                <small>&copy; Doce Digital</small>
            </div>

        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>Assets/JS/main.js"></script>
</body>
</html>