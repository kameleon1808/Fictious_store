@include('components.header.header')

<h1><strong>Ime i prezime:</strong> {{ $details['name'] }}</h1>
<h2><strong>Ime kompanije:</strong> {{ $details['company_name'] }}</h2>
<p><strong>Broj telefona: </strong> {{ $details['phone'] }}</p>
<p><strong>Napomene: </strong> {{ $details['comments'] }}</p>
<p><strong>Adresa za isporuku: </strong>{{ $details['shipping_address'] }}</p>


<p><strong>Kolicina proizvoda:</strong> {{ $details['prod_qty'] }}</p>
<p><strong>Proizvod:</strong> {{ $details['article_name'] }}</p>

<p>Thank you</p>

@include('components.footer.footer')
