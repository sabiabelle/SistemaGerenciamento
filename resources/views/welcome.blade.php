@include('layouts.includes.header')

@yield('conteudo')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner_text">
                    <div class="banner_text">
                        <br><br><br><br><br>
                        <h1> Expert em micropigmentação e High Performer em Microblading</h2>
                            <h4 style="color: white;">Meu objetivo é deixar um mundo mais bonito com sobrancelhas
                                perfeitas! Marque seu horário e realce seu olhar!</h4>
                            <br>
                            <div class="banner_btn">
                                <a href="#" class="btn_1"> <img src="/icons/whats.png"> Whatsapp</a>
                                <a href="#" class="btn_1"><img src="/icons/insta.png"> Instagram</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- Service part start-->
<section class="priceing_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-lg-6 col-sm-10">
                <div class="section_tittle">
                    <img src="/menu/7.png" alt="icon">
                    <h2>Procedimentos e Preços</h2>
                    <p>Good morning forth gathering doesn't god gathering man and had moveth there dry sixth
                        dominion rule divided behold after had he did not move .</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6">
                <div class="single_pricing_item">
                    <div class="single_pricing_text">
                        <h5>Design de sobrancelha</h5>
                        <h6>R$ 40.00</h6>
                        <p>Sobrancelhas alinhadas e pigmentadas</p>
                    </div>
                </div>
                <div class="single_pricing_item">
                    <div class="single_pricing_text">
                        <h5>Micropigmentação </h5>
                        <h6>R$ 10.00</h6>
                        <p>Micropigmentação/ Microblading</p>
                    </div>
                </div>
                <div class="single_pricing_item">
                    <div class="single_pricing_text">
                        <h5>Depilação Corporal</h5>
                        <h6>R$ 10.00</h6>
                        <p>Pele limpa, lisa e macia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
            <div class="single_pricing_item">
                    <div class="single_pricing_text">
                        <h5>Depilação fácil/ Egípcia</h5>
                        <h6>R$ 10.00</h6>
                        <p>Depilação tradicional.</p>
                    </div>
                </div>
                <div class="single_pricing_item"> 
                    <div class="single_pricing_text">
                        <h5>Maquiagem Profissional</h5>
                        <h6>R$ 10.00</h6>
                        <p>Make para noivas, debutantes, formandas, madrinhas, profissionais, festas e etc.</p>
                    </div>
                </div>
                <div class="single_pricing_item">      
                    <div class="single_pricing_text">
                        <h5>Cursos</h5>
                        <h6>R$ 10.00</h6>
                        <p>Their days lesser and every firmament</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service part end-->

<!--::review_part start::-->
<section class="review_part gray_bg section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="client_review_part owl-carousel">
                    <div class="client_review_single">
                        <img src="/app-assets/img/Quote.png" class="Quote" alt="quote">
                        <div class="client_review_text">
                            <p>Also made from. Give may saying meat there from heaven it lights face had is gathered
                                god dea earth light for life may itself shall whales made they're blessed whales
                                also made from give
                                may saying meat. There from heaven it lights face had amazing place</p>
                        </div>
                        <div class="client_img">
                            <img src="/app-assets/img/client/client_1.png" alt="">
                        </div>
                        <h4>Vaninha Borges, <span>Empreendedora e palestrante.</span></h4>
                    </div>
                    <div class="client_review_single">
                        <div class="client_review_text media-body">
                        <img src="/banner.jpg" >
                        </div>  
                    </div>
                    <div class="client_review_single">
                        <div class="client_review_text media-body">
                        <img src="/app-assets/img/vn.jpeg"> 
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::review_part end::-->

@include('layouts.includes.footer')