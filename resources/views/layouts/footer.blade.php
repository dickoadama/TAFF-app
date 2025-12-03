<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Section À propos -->
            <div class="footer-section">
                <div class="footer-logo">
                    <div class="footer-logo-img">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="footer-logo-text">TAFF</div>
                </div>
                <p class="footer-description">
                    TAFF est une plateforme innovante qui met en relation les particuliers et les professionnels 
                    pour tous types de travaux. Nous facilitons la recherche, la sélection et la gestion de vos projets.
                </p>
                <div class="footer-social">
                    <a href="#" class="footer-social-link text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-social-link text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="footer-social-link text-pink-500 hover:text-pink-700">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social-link text-blue-800 hover:text-blue-900">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="footer-social-link text-red-600 hover:text-red-800">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Section Liens rapides -->
            <div class="footer-section">
                <h3 class="footer-heading">Liens rapides</h3>
                <ul class="footer-links">
                    <li class="footer-link">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-chevron-right"></i> Accueil
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('artisans.index') }}">
                            <i class="fas fa-chevron-right"></i> Artisans
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('service-categories.index') }}">
                            <i class="fas fa-chevron-right"></i> Catégories
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('quotes.index') }}">
                            <i class="fas fa-chevron-right"></i> Devis
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('invoices.index') }}">
                            <i class="fas fa-chevron-right"></i> Factures
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('works.index') }}">
                            <i class="fas fa-chevron-right"></i> Réalisations
                        </a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('partners.index') }}">
                            <i class="fas fa-chevron-right"></i> Partenaires
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Section Contact -->
            <div class="footer-section">
                <h3 class="footer-heading">Contact</h3>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="footer-contact-text">
                        <strong>Adresse</strong>
                        Abidjan, Côte d'Ivoire
                    </div>
                </div>
                
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="footer-contact-text">
                        <strong>Téléphone</strong>
                        +225 07 672 942 55<br>
                        +225 07 779 695 75
                    </div>
                </div>
                
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="footer-contact-text">
                        <strong>Email</strong>
                        dickoadama08@gmail.com<br>
                        sidikibamba278@gmail.com
                    </div>
                </div>
                
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="footer-contact-text">
                        <strong>Horaires</strong>
                        Lundi - Vendredi: 8h - 18h<br>
                        Samedi: 9h - 12h
                    </div>
                </div>
            </div>
            
            <!-- Section Newsletter -->
            <div class="footer-section">
                <h3 class="footer-heading">Newsletter</h3>
                <p class="footer-description">
                    Abonnez-vous à notre newsletter pour recevoir les dernières actualités et offres.
                </p>
                <div class="footer-newsletter">
                    <form class="footer-newsletter-form">
                        <input type="email" class="footer-newsletter-input" placeholder="Votre email" required>
                        <button type="submit" class="footer-newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-grid">
                <div class="footer-copyright">
                    &copy; {{ date('Y') }} TAFF. Tous droits réservés. 
                    Développé avec <i class="fas fa-heart" style="color: #ef4444;"></i> par 
                    <a href="https://github.com/dickoadama" target="_blank">dickoadama</a>
                </div>
                <div class="footer-links-bottom">
                    <a href="{{ route('legal.terms') }}">Conditions d'utilisation</a>
                    <a href="{{ route('legal.privacy') }}">Politique de confidentialité</a>
                    <a href="{{ route('legal.mentions') }}">Mentions légales</a>
                    <a href="{{ route('contacts.index') }}">Contact</a>
                </div>
            </div>
        </div>
    </div>
</footer>