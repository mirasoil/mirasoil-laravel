@extends('layouts.master')
@section('content')
<div class="container">
            <div class="titlu-about">
                <h1 class="animate__animated animate__rubberBand animate__repeat-2">Povestea noastră</h1> 
            </div>
            <div class="text-about">
                <p>
                    În ceea ce ne privește pe noi, totul a început acum 4 ani, în anul 2016 mai exact, când am decis să facem această plantație. Pe teritoriul fertil al zonei noastre, a fost destul de dificil de întreținut din cauza ierburilor care creșteau printre rânduri,
                    însă cu mult efort am reușit să-i facem față.<br>În primul an, producția nu a fost una destul de mare însă asta se întâmplă în general în primul an de recoltă, urmând ca abia din al treilea an să poată produce o cantitate suficientă
                    de ulei.
                </p>
                <h2>Galerie</h2>
            </div>
        </div>
    <div class="row m-0 p-1">
        <div class="col-3 p-1">
            <img src="img/lav1.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav2.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav3.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav5.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav8.jpg" style="width:100%" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav7.jpg" style="width:100%" onclick="openModal();currentSlide(6)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav6.jpg" style="width:100%" onclick="openModal();currentSlide(7)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav9.jpg" style="width:100%" onclick="openModal();currentSlide(8)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav32.jpg" style="width:100%" onclick="openModal();currentSlide(9)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav34.jpg" style="width:100%" onclick="openModal();currentSlide(10)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav15.jpg" style="width:100%" onclick="openModal();currentSlide(11)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav11.jpg" style="width:100%" onclick="openModal();currentSlide(12)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav10.jpg" style="width:100%" onclick="openModal();currentSlide(13)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav20.jpg" style="width:100%" onclick="openModal();currentSlide(14)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav36.jpg" style="width:100%" onclick="openModal();currentSlide(15)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav18.jpg" style="width:100%" onclick="openModal();currentSlide(16)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav17.jpg" style="width:100%" onclick="openModal();currentSlide(17)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav22.jpg" style="width:100%" onclick="openModal();currentSlide(18)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav14.jpg" style="width:100%" onclick="openModal();currentSlide(19)" class="hover-shadow cursor">
        </div>
        <div class="col-3 p-1">
            <img src="img/lav25.jpg" style="width:100%" onclick="openModal();currentSlide(20)" class="hover-shadow cursor">
        </div>
    </div>

    <div id="myModal" class="modal modal-c">
        <span class="close close-c cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content modal-content-c">

            <div class="mySlides">
                <div class="numbertext">1 / 20</div>
                <img src="img/lav1.jpg" alt="Anul1" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 20</div>
                <img src="img/lav2.jpg" alt="Anul2" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 20</div>
                <img src="img/lav3.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 20</div>
                <img src="img/lav5.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">5 / 20</div>
                <img src="img/lav6.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">6 / 20</div>
                <img src="img/lav7.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">7 / 20</div>
                <img src="img/lav8.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">8 / 20</div>
                <img src="img/lav9.jpg" alt="Anul3" style="width:100%">
            </div>

            <div class="caption-container">
                <p id="caption"></p>
            </div>
            <div class="mySlides">
                <div class="numbertext">9 / 20</div>
                <img src="img/lav32.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">10 / 20</div>
                <img src="img/lav34.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">11 / 20</div>
                <img src="img/lav15.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">12 / 20</div>
                <img src="img/lav11.jpg" alt="Anul1" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">13 / 20</div>
                <img src="img/lav10.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">14 / 20</div>
                <img src="img/lav20.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">15 / 20</div>
                <img src="img/lav36.jpg" alt="Anul1" style="width:100%">
            </div><div class="mySlides">
                <div class="numbertext">16 / 20</div>
                <img src="img/lav18.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">17 / 20</div>
                <img src="img/lav17.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">18 / 20</div>
                <img src="img/lav22.jpg" alt="Anul1" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">19 / 20</div>
                <img src="img/lav14.jpg" alt="Anul1" style="width:100%">
            </div><div class="mySlides">
                <div class="numbertext">20 / 20</div>
                <img src="img/lav25.jpg" alt="Anul1" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div class="row m-0 bg-dark">
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav1.jpg" style="width:100%" onclick="currentSlide(1)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav2.jpg" style="width:100%" onclick="currentSlide(2)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav3.jpg" style="width:100%" onclick="currentSlide(3)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav5.jpg" style="width:100%" onclick="currentSlide(4)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav6.jpg" style="width:100%" onclick="currentSlide(5)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav7.jpg" style="width:100%" onclick="currentSlide(6)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav8.jpg" style="width:100%" onclick="currentSlide(7)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav9.jpg" style="width:100%" onclick="currentSlide(8)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav32.jpg" style="width:100%" onclick="currentSlide(9)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav34.jpg" style="width:100%" onclick="currentSlide(10)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav15.jpg" style="width:100%" onclick="currentSlide(11)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav11.jpg" style="width:100%" onclick="currentSlide(12)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav10.jpg" style="width:100%" onclick="currentSlide(13)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav20.jpg" style="width:100%" onclick="currentSlide(14)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav36.jpg" style="width:100%" onclick="currentSlide(15)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav18.jpg" style="width:100%" onclick="currentSlide(16)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav17.jpg" style="width:100%" onclick="currentSlide(17)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav22.jpg" style="width:100%" onclick="currentSlide(18)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav14.jpg" style="width:100%" onclick="currentSlide(19)" >
                </div>
                <div class="col-1 p-1">
                    <img class="demo cursor" src="img/lav25.jpg" style="width:100%" onclick="currentSlide(20)" >
                </div>
            </div>
        </div>
    </div>
    <div class="text-about container">
        <p>
            Am decis astfel să ne dedicăm timpul acestei plantații din dragoste și pasiune pentru produse naturale, fapt pentru care am decis să înființăm un proiect susținut din fonduri europene pentru a răspândi calitatea produselor noastre pe piață. În anul 2019,
            am parcurs formalitățile pentru încadrarea în proiect, urmând ca anul acesta să fie aprobat și pus în aplicare. Între timp, anul 3 de cultivare ne-a adus o oarecare surpriză. Datorită îngrijirii atente, plantația a atins în luna iulie 2019
            anul de vârf al recoltei, producând peste 30 de litri de ulei esențial, 150 de litri de ulei esențial și peste 200 de kg de brichete de foc, obținute din resturile deja prelucrate pentru a extrage uleiul esențial.
            <br>Nu demult am început să ne creem o imagine proprie a firmei, căutând un nume potrivit, care să ne reprezinte mai departe. Procesul a durat destul de mult, în ciuda așteptărilor, însă putem spune că a meritat răbdarea. Am încercat să ne
            jucăm cu mai multe cuvinte care ne reprezintă și să le combinăm, iar acest lucru a dus la următorul rezultat:<br>

        </p>

        <div class="rebus-logo">
            <h3>MiraSoil</h3>
            <p class="rebus" style="letter-spacing: 5px;">ARO<span><b>M</b></span>A</p>
            <p class="rebus1" style="letter-spacing: 5px;">TERAP<span><b>I</b></span>E</p>
            <p class="rebus2" style="letter-spacing: 5px;">FLOA<span><b>R</b></span>E</p>
            <p class="rebus3" style="letter-spacing: 5px;">LAV<span><b>A</b></span>NDA</p>
            <p class="rebus4" style="letter-spacing: 5px;"><span><b>S</b></span>APUN</p>
            <p class="rebus5" style="letter-spacing: 5px;">SIR<span><b>O</b></span>P</p>
            <p class="rebus6" style="letter-spacing: 5px;">BR<span><b>I</b></span>CHETE</p>
            <p class="rebus7" style="letter-spacing: 5px;">U<span><b>L</b></span>EI</p>

        </div>
        <p>De asemenea, <b>"MIRA"</b> provine și de la primele 4 litere din numele localității: <b>"MIRASLĂU"</b>, dar și de la cuvântul <b>"MIRACOL"</b>, având astfel dublu înțeles, fapt care îl face și mai deosebit. În ceea ce privește cuvântul <b>"SOIL"</b>,
            acesta provine din englezescul: <b>"SOIL"</b>, semnificând <i>stratul superior al pământului, cel fertil, în care cresc plantele.</i> De asemenea, apare și cuvântul <b>"OIL"</b>, care semnifică cea mai importantă parte din întreg procesul
            de producție, și anume
            <i>uleiul esențial de lavandă.</i>
        </p>
        <p>Astfel, încercăm să ducem tradiția mai departe, respectând obiceiurile de până acum, mai exact recoltarea manuală și producerea de semi-fabricate și produse finite manual, cu atenție. Pentru mai multe detalii vă stăm la dispoziție și pe paginile
            de socializare unde încercăm să fim cât mai activi, oferindu-vă o gamă largă de servicii și rețete pe care le puteți prepara chiar dumneavostră acasă.<br>
            <p class="bottom-text"> Mulțumim pentru atenția acordată și sprijinul dumneavoastră !</p>
        </p>
    </div>
@endsection