<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement</title>
    <link rel="stylesheet" href="subscribe.css">

    @vite(['resources/css/subscribe.css', 'resources/js/app.js'])

</head>
<body>
    <div class="subscription-container">
        <h1>Choisissez votre Abonnement</h1>
        <div class="plans">
            <div class="plan">
                <h2>Abon. Pay Per Listing</h2>
                <p>500 FCFA / bien</p>
                <p></p>

                <form action="{{route('subscribe.store')}}" method="POST">
                    <input type="hidden" name="plan" value="pay_per_listing">
                    <script
                      src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                      data-public-key="pk_live_ckCSMu5RwMO89o4HA7P9DJw3"
                      data-button-text="Choisir"
                      data-button-class="button-class"
                      data-transaction-amount="100"
                      data-transaction-description="RMA, le gestionnaire de bien immobilier en ligne qu'il vous faut"
                      data-currency-iso="XOF">
                    </script>
                </form>
            </div>
            <div class="plan">
                <h2>Abonnement Mensuel</h2>
                <p>2 500 FCFA / mois</p>
                <ul>
                    <li>Gestion des locataires incluse</li>
                    <li>Emission de Contract de bail.</li>
                    <li>Mis en avant de bien.</li>
                </ul>

                <form action="{{route('subscribe.store')}}" method="POST">
                    <input type="hidden" name="field" value="monthly">
                    <script
                      src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                      data-public-key="pk_live_ckCSMu5RwMO89o4HA7P9DJw3"
                      data-button-text="Choisir"
                      data-button-class="button-class"
                      data-transaction-amount="2500"
                      data-transaction-description="RMA, le gestionnaire de bien immobilier en ligne qu'il vous faut"
                      data-currency-iso="XOF">
                    </script>
                </form>
            </div>
            <div class="plan">
                <h2>Abonnement Annuel</h2>
                <p>20 500 FCFA / an</p>
                <ul>
                    <li>Gestion des locataires incluse</li>
                    <li>Emission de Contract de bail.</li>
                    <li>Accès à des rapports Mensuels.</li>
                    <li>Mis en avant de bien.</li>
                    <li>Promotion des biens ou d'autres services partenaires.</li>
                </ul>

                <form action="{{route('subscribe.store')}}" method="POST">
                    <input type="hidden" name="plan" value="yearly">
                    <script
                      src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                      data-public-key="pk_live_ckCSMu5RwMO89o4HA7P9DJw3"
                      data-button-text="Choisir"
                      data-button-class="button-class"
                      data-transaction-amount="2500"
                      data-transaction-description="RMA, le gestionnaire de bien immobilier en ligne qu'il vous faut"
                      data-currency-iso="XOF">
                    </script>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
