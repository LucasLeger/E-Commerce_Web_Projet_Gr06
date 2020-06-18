<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Votre commande</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <h4>From:</h4>
                <strong>Gamebreak</strong><br>
                20 boulevard du Général de Gaulle <br>
                44200, Nantes<br>
                Tel : 0203040506 <br>
                Mail : gamebreak@contact.com <br>

                <br>
            </div>

            <div class="col-xs-4">
                <h2>Gamebreak</h2>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Commande numéro :</th>
                            <td class="text-right">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Date :</th>
                            <td class="text-right">25/06/2020</td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin-bottom: 0px">&nbsp;</div>
            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Item List</th>
                    <th>Prix</th>
                    <th class="text-right">Code</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><div><strong>Service</strong></div>
                        <p>Jeux-vidéos</p></td>
                        <td>60€</td>
                        <td class="text-right">9MQ4-YPQY-CU4Y-BER6</td>
                </tr>
            </tbody>
        </table>

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Total </div></th>
                                <td style="padding: 5px" class="text-right"><strong> 60€ </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-8 invbody-terms">
                    Thank you for your business. <br>
                    <br>
                    <h4>Payment Terms</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
                </div>
            </div>
        </div>

    </body>
    </html>