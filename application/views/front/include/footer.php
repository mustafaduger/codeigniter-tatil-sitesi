
<footer class="revealed">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <h3>Yardım</h3>
                    <a href="tel://004542344599" id="phone">0212 444 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@tatilistanbul.com</a>
                    
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Hakkımızda</a>
                        </li>
                        <li><a href="#">SSS</a>
                        </li>
                        <li><a href="#">Blog</a>
                        </li>
                        <li><a href="#">İletişim</a>
                        </li>
                        <li><a href="#">Giriş Yap</a>
                        </li>
                        <li><a href="#">Kayıt Ol</a>
                        </li>
                        <li><a href="#">Kullanım Şartları</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6" id="newsletter">
                    <h3>Newsletter</h3>
                    <p>Join our newsletter to keep be informed about offers and news.</p>
                    <div id="message-newsletter_2"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                        <div class="form-group">
                            <input name="email_newsletter_2" id="email_newsletter_2" type="email" value="" placeholder="Your mail" class="form-control">
                        </div>
                        <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                    </form>
                </div>
               <!--  <div class="col-md-2 col-sm-6">
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="styled-select">
                        <select class="form-control" name="currency" id="currency">
                            <option value="USD" selected>USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="RUB">RUB</option>
                        </select>
                    </div>
                </div> -->
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-google"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-instagram"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-pinterest"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-vimeo"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a>
                            </li>
                            <li><a href="#"><i class="icon-linkedin"></i></a>
                            </li>
                        </ul>
                        <p>© Citytours 2015</p>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </footer>
    <!-- End footer -->!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

    <?php $this->load->view('front/include/script'); ?>