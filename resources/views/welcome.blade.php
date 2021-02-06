@extends('layouts.master')
@section('content')
<div id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicator" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block img-fluid w-100" src="img/slider1cropped.jpg" alt="First slide">
                
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="img/slider3.1.jpg" alt="Second slide">
                
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="img/slider4.JPG" alt="Third slide">
                
            </div>
        </div>
        <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!----------------About-------------->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2> Despre noi</h2>
                <div class="about-content">
                    În ceea ce ne privește pe noi, această afacere este întemeiată din forțe proprii, din pasiunea pentru lavandă și prelucratele sale. Oferim produse de calitate, naturale, prelucrate în condiții bune și întreținute cu grijă.
                </div>
            </div>
            
            <div class="col-md-6 findButton">
                <button class="findmore" onclick="location.href='/about'"><span>Află mai multe </span></button>
            </div>
        </div>
    </div>

</section>
<!--------------Servicii------------>
<section id="services">
        <div class="container">
            <div class="inner-container">
                <h1>Procesul de prelucrare</h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3 mb-4">
                    <a href="/manufacture">
                    <div class="text-center">
                        <div class="card card-body">
                            <div class="icon">
                                <i class="fab fa-pagelines" style="font-size: 64px;"> </i>
                            </div>
                        <h3 class="card-title">Recoltare</h3>
                        <p class="card-text">Se recoltează lavanda, <br> urmând ca o parte să se lase la uscat, pe când o parte trece <br> în procesul următor.</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3 mb-4">
                    <a href="/manufacture">
                    <div class="text-center">
                        <div class="card card-body">
                            <div class="icon">
                                <i class="fab fa-pagelines" style="font-size: 64px;"></i>
                            </div>
                            <h3 class="card-title">Distilare</h3>
                            <p class="card-text">Cu ajutorul acestui proces<br> se obține apa florală împreună <br> cu uleiul esențial, iar resturile<br> trec în procesul următor.</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-lg-3 mb-4">
                    <a href="/manufacture">
                    <div class="text-center">
                        <div class=" card card-body">
                            <div class="icon">
                                <i class="fab fa-pagelines" style="font-size: 64px;"></i>
                            </div>
                            <h3 class="card-title">Resturile se salvează!</h3>
                            <p class="card-text">În ciuda faptului că multe lucruri procesate nu pot fi reciclate, ei bine, resturile noastre da !</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div> 
        </div>       
</section>
<!---------------------------Preturi---------->
<section id="price">
    <div class="container">
        <h1> Produsele noastre </h1>
            <div class="row mb-5">
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1"> Apă florală</h2>
                        <p class="card-text">10 lei</p>
                        <p class="card-text">100ml</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> 100ml</li>
                            <li><i class="far fa-check-circle"></i> 500ml</li>
                            <li><i class="far fa-check-circle"></i> 1l</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/2'">Detalii</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1"> Ulei esențial</h2>
                        <p class="card-text">20 lei</p>
                        <p class="card-text">10ml</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> 30ml</li>
                            <li><i class="far fa-check-circle"></i> 50ml</li>
                            <li><i class="far fa-check-circle"></i> 100ml</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/1'">Detalii</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1"> Săpun</h2>
                        <p class="card-text">5 lei</p>
                        <p class="card-text">100g</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> 100g</li>
                            <li><i class="far fa-check-circle"></i> 250g</li>
                            <li><i class="far fa-check-circle"></i> 250g</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/3'">Detalii</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1"> Sirop</h2>
                        <p class="card-text">25 lei</p>
                        <p class="card-text">330ml</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> 330ml</li>
                            <li><i class="far fa-check-circle"></i> 750ml</li>
                            <li><i class="far fa-check-circle"></i> 1l</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/4'">Detalii</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1"> Buchete florale</h2>
                        <p class="card-text">25 lei</p>
                        <p class="card-text">la comandă</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> mici</li>
                            <li><i class="far fa-check-circle"></i> medii</li>
                            <li><i class="far fa-check-circle"></i> mari</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/6'">Detalii</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 my-3">
                    <div class="card card-body">
                        <h2 class="card-title1">Brichete de foc</h2>
                        <p class="card-text">50 lei</p>
                        <p class="card-text">1kg</p>
                        <ul>
                            <li><i class="far fa-check-circle"></i> </li>
                            <li><i class="far fa-check-circle"></i> 250g</li>
                            <li><i class="far fa-check-circle"></i> 250g</li>
                        </ul>
                        <button type="button" class="btn btn-primary" onclick="location.href='products/5'">Detalii</button>
                    </div>
                </div>
            </div>            
    </div>
</section>
<!-------------------Contact----------------->
<section id="contact">
    <div class="container ">
        <h1>Contact</h1>
        <div class="row ">
            <div class="col-md-6 ">
                <form class="contact-form " action="includes/contact.inc.php" method="POST">
                    <div class="form-group ">
                        <input type="text " name="name" class="form-control contact-control  " placeholder="Numele dumneavoastră " required="required">
                    </div>
                    <div class="form-group ">
                        <input type="tel" name="phone" class="form-control contact-control  " placeholder="Număr de telefon " required="required">
                    </div>
                    <div class="form-group ">
                        <input type="email " name="email" class="form-control contact-control  " placeholder="Email " required="required">
                    </div>
                    <div class="form-group ">
                        <textarea class="form-control contact-control  " name="message" rows="4 " placeholder="Mesaj " required="required"></textarea>
                    </div>
                    <button type="submit" name="contact-submit" class="btn btn-primary" data-toggle="modal" data-target="#errorsystem">Trimite mesaj</button>
                </form>
            </div>
            <div class="col-md-6 contact-info ">
                <div class="follow "><b>Adresă:</b> <a href="https://www.google.ro/maps/place/Mirasoil/@46.3684154,23.6983053,17z/data=!3m1!4b1!4m5!3m4!1s0x47495b1cddbd8c7f:0xc5717c5adb87f1ba!8m2!3d46.3684154!4d23.700494"> <i class="fas fa-map-marker-alt"></i> </a> Str. Principală, Nr. 130, Miraslău, Alba</div>
                <div class="follow "><b>Telefon: </b><a href="tel:+40754916986"><i class="fas fa-phone-alt"> </i> </a> +40754916986</div>
                <div class="follow "><b>Email: </b><a href="mailto:contact@mirasoil.ro"><i class="fas fa-envelope"> </i> </a>contact@mirasoil.ro</div>
                <div class="follow "><label><b>Social: </b> </label>
                    <a href="https://www.facebook.com/mirasoil16/"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/mirasoil16/"><i class="fab fa-instagram "></i></a>
                    <a href="https://www.instagram.com/mirasoil16/"><i class="fab fa-google-plus-g"></i></a>

                </div>
            </div>
        </div>
    </div>
</section>
<!---Social--->
<section id="social">
    <div class="container">
        <h2 class="follow">Fii la curent cu toate noutățile! </h2>
        <div class="row">
            <div class="col-md-5 m-3">
                <iframe class="embed-responsive embed-responsive-1by1" id="fbsection" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmirasoil16%2Fposts%2F130384935324771" height="611" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
            <div class="col-md-5 m-3">
                <div class="fb-post" data-href="https://www.facebook.com/mirasoil16/posts/172198311143433" data-show-text="true" data-width=""><blockquote cite="https://www.facebook.com/mirasoil16/posts/172198311143433" class="fb-xfbml-parse-ignore"><p>Pachet promoțional: 2 sticluțe de ulei esențial de lavandă + 1 sticluță de apă florală la prețul de 50 de lei..</p>Posted by <a href="https://www.facebook.com/mirasoil16/">MiraSoil</a> on&nbsp;<a href="https://www.facebook.com/mirasoil16/posts/172198311143433">Thursday, September 3, 2020</a></blockquote></div>
            </div>
            </div>
        </div>
    
</section>
@endsection
