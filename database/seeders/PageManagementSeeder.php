<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageManagement;

class PageManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageManagement::create([
            'type'             => 'home',
            'meta_title'       => 'home',
            'meta_description' => 'home',
            'section_1'        => '<section class="main-banner">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>Turbocharged Choices, Unmatched Joys</h4>
                                                <h1>Buy Or Sell Your Car <span>On Broker Web</span></h1>
                                                <p>We offer outstanding customer service <span style="display:block">at great prices</span></p>
                                                <div>
                                                    <a href="http://trading.n2rdev.in/buyer-information" class="btn btn-primary">Buy a car</a>
                                                    <a href="http://trading.n2rdev.in/seller-information" class="ml-2 btn btn-secondary">Sell my car</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="http://trading.n2rdev.in/assets/images/car-2.png" alt="Car" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </section>',
            'section_2'         => '<section class="container why-buy">
                                    <h4 class="sub-title">Top highlights</h4>
                                    <h2>Select what you want</h2>
                                    <p class="special">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/buyers.png" alt="Buyers" class="img-fluid">
                                                <h4>Buyers</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                                                <a style="text-decoration: underline" href="http://trading.n2rdev.in/buyer-information" class="btn btn-link">Know More</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/sellers.png" alt="Sellers" class="img-fluid">
                                                <h4>Sellers</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                                                <a style="text-decoration: underline" href="http://trading.n2rdev.in/buyer-information" class="btn btn-link">Know More</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/engage.png" alt="Sellers" class="img-fluid">
                                                <h4>Live Stock</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                                                <a style="text-decoration: underline" href="http://trading.n2rdev.in/buyer/login" class="btn btn-link">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>',
            'section_3'         =>'<section class="container wedo">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="http://trading.n2rdev.in/assets/images/wedo.jpg" alt="We do" class="img-fluid">
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>About Us</h5>
                                            <h2>We love what we do</h2>
                                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore</blockquote>
                                            <a href="http://trading.n2rdev.in/about-us" class="btn btn-primary btn-lg">Know more</a>
                                        </div>
                                    </div>
                                </section>',
            'section_4'         =>'<section class="choose">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h3>Why Choose Us</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="float-right">
                                                <a href="http://trading.n2rdev.in/register" class="btn btn-outline btn-lg">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/realtime.png" alt="Realtime Vehicle Data" class="img-fluid">
                                                <h5>Realtime Vehicle Data</h5>
                                                <p>Configure vehicles in just a few clicks, from presales enquiries to delivery all in one place. </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/ready-stock.png" alt="Live vehicle stock availability" class="img-fluid">
                                                <h5>Live vehicle stock availability</h5>
                                                <p>Faster access to stock availability and lead time information, streamlining your order process for improved efficiency.</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/discount.png" alt="Vehicle Discounts" class="img-fluid">
                                                <h5>Vehicle Discounts</h5>
                                                <p>No more waiting for dealer discounts. Get instant access to discounts at the point of configuration.</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/choices.png" alt="Realtime Order Updates" class="img-fluid">
                                                <h5>Realtime Order Updates</h5>
                                                <p>Order status updates available within the system with full history and message logs.</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/easy.png" alt="Easy to use our system" class="img-fluid">
                                                <h5>Easy to use our system</h5>
                                                <p>A lot of attention and time have been spent to create a user fiendly system to improve customer experience.</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="box">
                                                <img src="http://trading.n2rdev.in/assets/images/icons/conversation.png" alt="Instant Messaging Service" class="img-fluid">
                                                <h5>Instant Messaging Service</h5>
                                                <p>Instant messaging facility to streamline interactions between brokers and dealers to cut down on emails and calls.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>',
            'section_5'         =>'<section class="container looking">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#">
                                            </a><div class="box"><a href="#">
                                                <h4>Are you looking for a Car?</h4>
                                                <p>We can help you buy quicker</p>
                                                </a><a href="http://trading.n2rdev.in/login" class="btn btn-outline">Buy Now</a>
                                            </div>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#">
                                            </a><div class="box"><a href="#">
                                                <h4>Do you want to sell your Car?</h4>
                                                <p>Enroll your stock and get buyers faster</p>
                                                </a><a href="http://trading.n2rdev.in/login" class="btn btn-outline">Sell Now</a>
                                            </div>
                                        
                                    </div>
                                </div>
                            </section>
                        <section class="container our-data">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <h5>20</h5>
                                        <p>Years of experience</p>
                                        <img src="http://trading.n2rdev.in/assets/images/icons/exp.png" alt="Years of experience" class="img-fluid">
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h5>560</h5>
                                        <p>Vehicles in stock</p>
                                        <img src="http://trading.n2rdev.in/assets/images/icons/stock.png" alt="Vehicles in stock" class="img-fluid">
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h5>75</h5>
                                        <p>Team members</p>
                                        <img src="http://trading.n2rdev.in/assets/images/icons/customers.png" alt="Team members" class="img-fluid">
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h5>120</h5>
                                        <p>Happy customers</p>
                                        <img src="http://trading.n2rdev.in/assets/images/icons/world.png" alt="Happy customers" class="img-fluid">
                                    </div>
                                </div>
                            </section>',
        ]);
        PageManagement::create([
            'type'             => 'seller',
            'meta_title'       => 'seller',
            'meta_description' => 'seller',
            'section_1'        => '<div class="page-header">
                                        <div class="row">
                                                <div class="col-sm-6">
                                                        <h1>Manage your stock through a dedicated <span>seller panel</span></h1>
                                                </div>
                                                <div class="col-sm-6">
                                                        <p>Experience effortless efficiency by simplifying your tasks with our services. Whether you utilize a custom-built DMS or manage your inventory through spreadsheets on Excel or Google Docs, we cater to all.</p>
                                                </div>
                                        </div>
                                </div>',
            'section_2'         => '<h2>All it takes is a CSV file or a live stock feed, and we will handle the rest.</h2><img src="http://trading.n2rdev.in/assets/images/add-stock.png" alt="Add Stock" class="img-fluid" style="border: 3px solid #ccc">',
            'section_3'         =>'<div class="grow-sales">
                        <div class="row">
                                <div class="col-sm-6">
                                        <h3>Grow your sales</h3>
                                        <p>Streamline your operations by disseminating your inventory to over 500 brokers, insurance firms, and finance companies within seconds. Upload your list weekly or on your preferred schedule, and watch your stock reach a wider audience effortlessly. </p>
                                        <p>Your listings will not only be searchable on our platform but also showcased on any participating broker\'s website.</p>
                                        <a href="http://trading.n2rdev.in/seller/register" class="btn btn-primary btn-lg">Sign Up</a>
                                </div>
                                <div class="col-sm-6">
                                        <img src="http://trading.n2rdev.in/assets/images/parking-lot.png" alt="Grow your sales" class="img-fluid">
                                </div>
                        </div>
                </div>',
            'section_4'         =>'<div class="we-have">
                        <h4>What we have</h4>
                        <p>We prioritize terms protection to ensure a seamless transaction process. Every buyer must adhere to our standard terms and conditions, including fleet terms specifying eligible buyers, invoicing criteria, and funding procedures. Additionally, we provide an automated system that safeguards your interests. It monitors each vehicle for a month, promptly alerting you if any attempt to alter V5 ownership is detected. This proactive measure helps identify and eliminate unscrupulous buyers from our system, ensuring a secure trading environment for all.</p>
                        <a href="http://trading.n2rdev.in/seller/register" class="btn btn-primary btn-lg">Become a seller</a>
                </div>',
        ]);

        PageManagement::create([
            'type'             => 'buyer',
            'meta_title'       => 'buyer',
            'meta_description' => 'buyer',
            'section_1'        => '<div class="by-banner">
                                    <div class="container-fluid">
                                            <div class="row">
                                                    <div class="col-sm-6">
                                                            <h1><span class="looking">Looking</span> for the <span style="display: block">Right Stock?</span></h1>
                                                            <p>We have got you covered. We know that finding the right stock is often the toughest aspect of a brokers job. While selling the same model is straightforward, ensuring you secure the best price and shield yourself from untrustworthy suppliers is crucial.</p>
                                                            <a href="http://trading.n2rdev.in/buyer/login" class="btn btn-primary btn-lg">Buy Now</a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <img src="http://trading.n2rdev.in/assets/images/banner-art.png" alt="Buyer" class="img-fluid">
                                                    </div>
                                            </div>
                                            
                                    </div>
                            </div>',
            'section_2'         => '<div class="container">
                                    <div class="place-order mt-5">
                                            <div class="row">
                                                    <div class="col-sm-6">
                                                            <h3>How to place your order?</h3>
                                                            <p>Just place your van order. We will verify its availability and send you an invoice. It is typically available in 99% of cases or something very close.</p>
                                                            <div class="flex-list">
                                                                    <div class="d-flex">
                                                                            <div class="icon">
                                                                                    <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Check" class="img-fluid">
                                                                            </div>
                                                                            <div class="list">
                                                                                    <p>Create a buyer account</p>    
                                                                            </div>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                            <div class="icon">
                                                                                    <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Check" class="img-fluid">
                                                                            </div>
                                                                            <div class="list">
                                                                                    <p>Search your stock</p>    
                                                                            </div>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                            <div class="icon">
                                                                                    <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Check" class="img-fluid">
                                                                            </div>
                                                                            <div class="list">
                                                                                    <p>Check vehicle details</p>    
                                                                            </div>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                            <div class="icon">
                                                                                    <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Check" class="img-fluid">
                                                                            </div>
                                                                            <div class="list">
                                                                                    <p>Place your order</p>    
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                            <div class="btn-group">
                                                                    <a href="http://trading.n2rdev.in/buyer/login" class="btn btn-primary btn-lg">See live stock</a>
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <img src="http://trading.n2rdev.in/assets/images/place-order2.png" alt="Place Order" class="img-fluid" style="border: 3px solid #ccc">   
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="simple">
                                            <h2 class="mt-4"><strong>It is that simple</strong></h2>
                                            <p>For instance, consider the Ford Mustang page. Customers can easily check availability for all Mustangs or specific ones. It is user-friendly. Alternatively, keep us updated with the invoice details. If you need a stock feed, simply integrate the API key, especially for WordPress sites, or use our API key. While some sites may require custom adjustments, the return on investment is rapid. Focus on vehicle inquiries you can fulfill, not mythical unicorns!</p>
                                            <img src="http://trading.n2rdev.in/assets/images/s-live-stock.png" alt="Live stock" class="img-fluid" style="border: 3px solid #ccc">
                                            <div class="mt-2 text-center">
                                                    <a href="http://trading.n2rdev.in/buyer/login" class="btn btn-primary btn-lg">Login as a Buyer</a>
                                            </div>
                                    </div>
                            </div>',
        ]);

         PageManagement::create([
            'type'             => 'about',
            'meta_title'       => 'about',
            'meta_description' => 'about',
            'section_1'        => '<div class="about-banner">
                                        <div class="container-fluid">
                                                <h1>About Us</h1>
                                                <p>Brokerweb is a straight forward and user-friendly software designed to facilitate vehicle trading for both buyers and sellers</p>
                                                <a href="http://trading.n2rdev.in/customer-support" class="btn btn-primary btn-lg">Get in touch</a>     
                                        </div>
                                </div>',
            'section_2'         => '<div class="about-us">
                <h2 class="text-center">Trade <span style="color:#c73d15">Buyers</span> Features and Benefits</h2>
                <div class="row">
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/sedan.png" alt="Live Vehicle Stock" class="img-fluid">
                                        <h5>Live Vehicle Stock</h5>
                                        <p>Access real-time vehicle stock directly on your website</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/finder.png" alt="Dedicated Website for Stock Search" class="img-fluid">
                                        <h5>Dedicated Website for Stock Search</h5>
                                        <p>Easily search for available stock through a dedicated website</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/price-label.png" alt="Transparent Pricing" class="img-fluid">
                                        <h5>Transparent Pricing</h5>
                                        <p>Prices are clearly displayed for each vehicle</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/convenient.png" alt="Convenient Purchase Process" class="img-fluid">
                                        <h5>Convenient Purchase Process</h5>
                                        <p>When a purchase is made, invoicing can be handled directly through Brokerweb, either to you or your funder</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/deal.png" alt="Single Point of Contact" class="img-fluid">
                                        <h5>Single Point of Contact</h5>
                                        <p>Deal directly with Brokerweb for all transactions, simplifying the process and reducing complexity</p>
                                </div>
                        </div>
                </div>
                <h2 class="text-center second-h2">Trade <span style="color:#c73d15">Sellers</span> Features and Benefits</h2>
                <div class="row">
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/upload.png" alt="Effortless Stock Upload" class="img-fluid">
                                        <h5>Effortless Stock Upload</h5>
                                        <p>Upload your vehicle stock and prices via CSV files, simplifying the listing process</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/add.png" alt="Manual Addition Options" class="img-fluid">
                                        <h5>Manual Addition Options</h5>
                                        <p>Add vehicles manually using registration numbers or via an API feed</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/cone.png" alt="Vetting Process" class="img-fluid">
                                        <h5>Vetting Process</h5>
                                        <p>Brokerweb carefully vets every trade seller, ensuring reliability and quality</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/checklist.png" alt="Indemnification" class="img-fluid">
                                        <h5>Indemnification</h5>
                                        <p>Provides indemnity for trade buyers and finance companies for each seller, offering added security and peace of mind</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/tick.png" alt="Streamlined Communication" class="img-fluid">
                                        <h5>Streamlined Communication</h5>
                                        <p>Deal with only one company for all transactions, minimizing administrative hassle</p>
                                </div>
                        </div>
                </div>
        </div>',
        'section_3'         => '<div class="keys">
                <h3>A brief intro of our company</h3>
                <div class="flex-list">
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Established Reputation" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Established Reputation:</strong> Founded in 2010, Brokerweb has a decade-long history of facilitating vehicle trades across the UK.</p>
                                </div>
                        </div>
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Simplified Vehicle Supply and Finance" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Simplified Vehicle Supply and Finance:</strong> Brokerweb aims to simplify the often complex process of vehicle supply and finance. By providing easy access to vehicle stock, it enables buyers to focus on finding the best deals for their customers.</p>
                                </div>
                        </div>
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="http://trading.n2rdev.in/assets/images/icons/check-success.png" alt="Check" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Customer-Centric Approach:</strong> By shifting the burden of vehicle sourcing to the customer, Brokerweb allows buyers to focus on serving their clients more effectivelOverall, Brokerweb offers a comprehensive solution for both trade buyers and sellers, aiming to streamline the vehicle trading process while prioritizing transparency, convenience, and reliability.</p>
                                </div>
                        </div>
                </div>
        </div>',
        ]);
        PageManagement::create([
            'type'             => 'term',
            'meta_title'       => 'Terms and Conditions',
            'meta_description' => 'Terms and Conditions',
            'section_1'        => '<div class="container">
                    <h1 class="mt-4">Terms and Conditions</h1>
                    <p>Welcome to [Your Company]! These terms and conditions outline the rules and regulations for the use of [Your Company]\'s Website, located at [Your Website URL].</p>
                    <p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use [Your Company] if you do not agree to take all of the terms and conditions stated on this page.</p>
                    <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                    <p><strong>Cookies</strong></p>
                    <p>We employ the use of cookies. By accessing [Your Company], you agreed to use cookies in agreement with the [Your Company]\'s Privacy Policy.</p>
                    <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
                </div>',
        ]);
        PageManagement::create([
            'type'             => 'privacy',
            'meta_title'       => 'Privacy Policy',
            'meta_description' => 'Privacy Policy',
            'section_1'        => '<div class="container">
                    <h1 class="mt-4">Privacy Policy</h1>
                    <p>Welcome to [Your Company]! These terms and conditions outline the rules and regulations for the use of [Your Company]\'s Website, located at [Your Website URL].</p>
                    <p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use [Your Company] if you do not agree to take all of the terms and conditions stated on this page.</p>
                    <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                    <p><strong>Cookies</strong></p>
                    <p>We employ the use of cookies. By accessing [Your Company], you agreed to use cookies in agreement with the [Your Company]\'s Privacy Policy.</p>
                    <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
                </div>',
        ]);
    }
}
