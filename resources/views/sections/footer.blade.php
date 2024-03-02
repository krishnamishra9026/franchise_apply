<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Broker Web" class="img-fluid">
                </div>
            </div>
            <div class="col-sm-3">
                <h4>Office</h4>
                <ul class="list-unstyled">
                    <li class="list-item">31 Old Fields Road, Bocam park</li>
                    <li class="list-item">Pencoed, Bridgend</li>
                    <li class="list-item">CF35 5LJ</li>
                    <li><a style="text-decoration: underline" href="mailto:info@email.com">Email: info@email.com</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4>Important Links</h4>
                <ul class="list-unstyled">
                    <li class="list-item"><a href="{{ url('about-us')}}">About Broker Web</a></li>
                    <li class="list-item"><a href="{{ url('seller-information')}}">For Sellers</a></li>
                    <li class="list-item"><a href="{{ url('buyer-information')}}">For Buyers</a></li>
                    <li class="list-item"><a href="#">Blogs</a></li>
                    <li class="list-item"><a href="{{ url('customer-support')}}">Support</a></li>
                    <li class="list-item"><a href="{{ url('terms-conditions')}}">Terms & Conditions</a></li>
                     <li class="list-item"><a href="{{ url('privacy-policy')}}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4>Connect with us</h4>
                <ul class="list-inline">
                    <li class="list-inline-item"><a target="_blank" href="#"><img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Facebook" class="img-fluid"></a></li>
                    <li class="list-inline-item"><a target="_blank" href="#"><img src="{{ asset('assets/images/icons/instagram.png') }}" alt="Instagram" class="img-fluid"></a></li>
                </ul>
            </div>
        </div>
        <hr style="border-color: #fff;margin-top:0">
        <p class="text-center"><img src="{{ asset('assets/images/icons/copyright.png') }}" alt="Copyright" class="img-fluid"> Copyright 2024. Broker Web. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.6.3/js/jquery.mmenu.min.js"></script>

<script>
    var myMenu = $("#menu");

    // initialize mmenu
    myMenu.mmenu({});

    // initialize mmenu API
    var myMenuAPI = myMenu.data( "mmenu" );


    // function to set to specific subMenu
    function setMMenu(subMenu) {
    // set to subMenu
    var current = myMenu.find(subMenu);

    // myMenuAPI.setSelected(current.first());
    myMenuAPI.openPanel(current.closest(".mm-panel"));
    }

    // function to open mmmenu to specific subMenu
    function openMMenu() {
    myMenuAPI.open();
    }

    function openNav() {
        document.getElementById("mySidebar").style.width = "320px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>
