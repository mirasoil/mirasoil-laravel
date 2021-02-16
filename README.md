<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Administrator

La autentificare exista 2 posibilitati:
-logare ca si client existent in baza de date
-logare ca si administrator

Pentru a doua optiune avem urmatoarele avantaje:
-o interactiune mult mai usoara cu ajutorul interfetei cu baza de date: adaugare, modificare sau stergerea produselor din baza de date aferenta
-administratorul nu are acces la partea de client (cos de cumparaturi) si vice-versa, utilizatorii nu pot accesa interfata responsabila de comunicarea cu baza de date
-pe partea de administrator se vor implementa cereri cu ajutorul Ajax pentru o mai buna interactiune

## Utilizator

Pentru utilizator, logarea in sistem il redirectioneaza pe pagina contului sau unde are optiunea de actualizare a datelor personale.
-pagina de produse este magazinul propriu-zis, acesta poate adauga momentan un singur produs din aceasta pagina, avand posibilitatea modificarii cantitatii ulterior, in pagina aferenta cosului (cart.blade.php)
-la fel ca si in cazul administratorului, se doreste implementarea de cereri ajax pentru majoritatea optiunilor disponibile: adauga in cos, modifica, sterge, goleste cos, majoritatea fiind deja implementate
-la plasarea comenzii, utilizatorul este redirectionat pe pagina de verificare a comenzii (revieworder) unde trebuie sa isi poata modifica datele de livrare si facturare (momentan se stocheaza doar in tabela orders fara a fi actualizate si in tabela principala, users)
-dupa salvarea datelor aferente comenzii, utilizatorului ii este pus la dispozitie un formular de plata (implementat cu Stripe) unde isi poate introduce detaliile cardului
-de aici, datele vor fi stocate intr-o alta tabela cel mai probabil si afisate ulterior pe pagina de comenzi (care pe moment nu exista) la care utilizatorul va avea acces si in viitor

## Cos de cumparaturi

Initial, cosul de cumparaturi a fost implementat cu sesiune insa acesta s-a dovedid destul de "nepractic" la stocarea detaliilor aferente comenzii, fapt pentru care am renuntat complet la aceasta metoda, implementand libraria "bumbummen99/shoppingcart" pentru o mai buna gestionare a cosului
-partea ce tine de cosul de cumparaturi a trebuit modificata complet deoarece metodele folosite anterior nu corespundeau functiilor predefinite in librarie
-astfel, cosul de cumparaturi este momentan nefunctional, plasarea comenzii se poate face pentru nu mai mult de 1 produs din fiecare datorita esuarii implementarii cererii ajax pentru actualizarea cantitatii unui produs deja existent in cos

## Contributii

1. Shopping cart: (https://packagist.org/packages/bumbummen99/shoppingcart)
2. GraphQL: (https://www.twilio.com/blog/build-graphql-powered-api-laravel-php) - uninstalled
3. Contact form: (https://www.positronx.io/laravel-contact-form-example-tutorial/)
4. Newsletter: (https://packagist.org/packages/spatie/laravel-newsletter) - needs to be stored in a database
5. Stripe: (https://github.com/stripe/stripe-php)
6. Auth: (https://pusher.com/tutorials/multiple-authentication-guards-laravel)
7. Mailable: (https://mailchimp.com/)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
