<!-- Footer -->
    <footer class="footer bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="footer-logo" style="margin-bottom: 20px;">
                        <img src="/images/logo/footer_logo.png" alt="Well Logo" style="height: 50px;">
                    </div>
                    <p style="color: #aaa; width: 300px;">Wellness Balance provides healthy supplements to maintain your health</p>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-nav">NAVIGATION</h5>
                    <ul class="list-unstyled">
                        <li><a  href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li><a href="{{ url('/products') }}"class="text-white">Shop</a></li>
                        <li><a  href="{{ url('/about') }}" class="text-white">About us</a></li>
                        <li><a  href="{{ url('/contact') }}" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-nav">SUPPORT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Help Centre</a></li>
                        <li><a href="#" class="text-white">Contact Us</a></li>
                        <li><a  href="{{ url('/faq') }}" class="text-white">FAQ's</a></li>
                        <li><a  href="{{ url('/privacy-policy') }}" class="text-white">Privacy Policy</a></li>
                        <li><a  href="{{ url('/cancellation-refunds') }}" class="text-white">Cancellation & Refunds</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="footer-nav">SOCIALS</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">YouTube</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright text-center mt-4">
                <p>&copy; {{ date('Y') }} Natural Balance Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
