    <!--header containing Navigation and Logo-->
    <header>
        <div class="menu">
            <div class="logo">
                <a href="/"><img src= "img/DC_Logo.png" alt="Logo"></a>
            </div>
            <nav id="nav">
                <!--Navigation Lists-->
                <ul>
                    <li><a class="active" href="">Order Now</a></li>
                    <li><a href="Special.html">Special Order</a></li>
                    <li><a href="https://damodarcinemas.com.fj/damodar/find-us--contact">Contact Us</a></li>
                    <li><a href="Feedback.html">Customer Feedback</a></li>
                    <a href="" class="cart"><img class="cart-img" src="img/cart.png" alt=""><span><sup>4</sup></span></a>

                </ul>
                <!--Login and Registration Buttons-->

                @if (Route::has('login'))
                @auth
                    
               
                <div class="buttons">
                    <a id="loginButton" class="btn_login" href="{{ route('login') }}">Login</a>
                    <a id="loginButton" class="btn_register" href="{{ route('register') }}">Register</a>
                </div>
                @endauth
                @endif
            </nav>
            
        </div>
    </header>