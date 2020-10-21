<?php
if (isset($_POST['submit'])){
    include ("Product.php");
}
$currency = array (
    'USD' => 'United States Dollar',
    'ALL' => 'Albania Lek',
    'AFN' => 'Afghanistan Afghani',
    'ARS' => 'Argentina Peso',
    'AWG' => 'Aruba Guilder',
    'AUD' => 'Australia Dollar',
    'AZN' => 'Azerbaijan New Manat',
    'BSD' => 'Bahamas Dollar',
    'BBD' => 'Barbados Dollar',
    'BDT' => 'Bangladeshi taka',
    'BYR' => 'Belarus Ruble',
    'BZD' => 'Belize Dollar',
    'BMD' => 'Bermuda Dollar',
    'BOB' => 'Bolivia Boliviano',
    'BAM' => 'Bosnia and Herzegovina Convertible Marka',
    'BWP' => 'Botswana Pula',
    'BGN' => 'Bulgaria Lev',
    'BRL' => 'Brazil Real',
    'BND' => 'Brunei Darussalam Dollar',
    'KHR' => 'Cambodia Riel',
    'CAD' => 'Canada Dollar',
    'KYD' => 'Cayman Islands Dollar',
    'CLP' => 'Chile Peso',
    'CNY' => 'China Yuan Renminbi',
    'COP' => 'Colombia Peso',
    'CRC' => 'Costa Rica Colon',
    'HRK' => 'Croatia Kuna',
    'CUP' => 'Cuba Peso',
    'CZK' => 'Czech Republic Koruna',
    'DKK' => 'Denmark Krone',
    'DOP' => 'Dominican Republic Peso',
    'XCD' => 'East Caribbean Dollar',
    'EGP' => 'Egypt Pound',
    'SVC' => 'El Salvador Colon',
    'EEK' => 'Estonia Kroon',
    'EUR' => 'Euro Member Countries',
    'FKP' => 'Falkland Islands (Malvinas) Pound',
    'FJD' => 'Fiji Dollar',
    'GHC' => 'Ghana Cedis',
    'GIP' => 'Gibraltar Pound',
    'GTQ' => 'Guatemala Quetzal',
    'GGP' => 'Guernsey Pound',
    'GYD' => 'Guyana Dollar',
    'HNL' => 'Honduras Lempira',
    'HKD' => 'Hong Kong Dollar',
    'HUF' => 'Hungary Forint',
    'ISK' => 'Iceland Krona',
    'INR' => 'India Rupee',
    'IDR' => 'Indonesia Rupiah',
    'IRR' => 'Iran Rial',
    'IMP' => 'Isle of Man Pound',
    'ILS' => 'Israel Shekel',
    'JMD' => 'Jamaica Dollar',
    'JPY' => 'Japan Yen',
    'JEP' => 'Jersey Pound',
    'KZT' => 'Kazakhstan Tenge',
    'KPW' => 'Korea (North) Won',
    'KRW' => 'Korea (South) Won',
    'KGS' => 'Kyrgyzstan Som',
    'LAK' => 'Laos Kip',
    'LVL' => 'Latvia Lat',
    'LBP' => 'Lebanon Pound',
    'LRD' => 'Liberia Dollar',
    'LTL' => 'Lithuania Litas',
    'MKD' => 'Macedonia Denar',
    'MYR' => 'Malaysia Ringgit',
    'MUR' => 'Mauritius Rupee',
    'MXN' => 'Mexico Peso',
    'MNT' => 'Mongolia Tughrik',
    'MZN' => 'Mozambique Metical',
    'NAD' => 'Namibia Dollar',
    'NPR' => 'Nepal Rupee',
    'ANG' => 'Netherlands Antilles Guilder',
    'NZD' => 'New Zealand Dollar',
    'NIO' => 'Nicaragua Cordoba',
    'NGN' => 'Nigeria Naira',
    'NOK' => 'Norway Krone',
    'OMR' => 'Oman Rial',
    'PKR' => 'Pakistan Rupee',
    'PAB' => 'Panama Balboa',
    'PYG' => 'Paraguay Guarani',
    'PEN' => 'Peru Nuevo Sol',
    'PHP' => 'Philippines Peso',
    'PLN' => 'Poland Zloty',
    'QAR' => 'Qatar Riyal',
    'RON' => 'Romania New Leu',
    'RUB' => 'Russia Ruble',
    'SHP' => 'Saint Helena Pound',
    'SAR' => 'Saudi Arabia Riyal',
    'RSD' => 'Serbia Dinar',
    'SCR' => 'Seychelles Rupee',
    'SGD' => 'Singapore Dollar',
    'SBD' => 'Solomon Islands Dollar',
    'SOS' => 'Somalia Shilling',
    'ZAR' => 'South Africa Rand',
    'LKR' => 'Sri Lanka Rupee',
    'SEK' => 'Sweden Krona',
    'CHF' => 'Switzerland Franc',
    'SRD' => 'Suriname Dollar',
    'SYP' => 'Syria Pound',
    'TWD' => 'Taiwan New Dollar',
    'THB' => 'Thailand Baht',
    'TTD' => 'Trinidad and Tobago Dollar',
    'TRY' => 'Turkey Lira',
    'TRL' => 'Turkey Lira',
    'TVD' => 'Tuvalu Dollar',
    'UAH' => 'Ukraine Hryvna',
    'GBP' => 'United Kingdom Pound',
    'UYU' => 'Uruguay Peso',
    'UZS' => 'Uzbekistan Som',
    'VEF' => 'Venezuela Bolivar',
    'VND' => 'Viet Nam Dong',
    'YER' => 'Yemen Rial',
    'ZWD' => 'Zimbabwe Dollar'
);

?>
<html>
<head>
    <title>Create Cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3> Create Cart and Calculate the bill</h3>



    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Enter Amount of T-shirt</label>
            <input type="text" class="form-control" name="tshirt" aria-describedby="emailHelp" placeholder="Enter Amount T-shirt">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Enter Amount of Shoes</label>
            <input type="text" class="form-control"  name="shoes" placeholder="Amount of Shoes">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Enter Amount of Jackets</label>
            <input type="text" class="form-control"  name="jacket" placeholder="Amount of Shoes">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Enter Amount of Pants</label>
            <input type="text" class="form-control"  name="pants" placeholder="Amount of Shoes">
        </div>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Currency</label>
                <select id="inputState" class="form-control" name="currency">

                    <?php while ($ProductObj = current($currency)) { ?>
                     <option value="<?php echo key($currency) . "<br>"; ?>">   <?php echo key($currency) . "<br>"; ?> </option>
                    <?php next($currency); } ;?>
                </select>
            </div>
            <br>

        <button type="submit" class="btn btn-primary" name="submit">Calculate</button>
    </form>

    <dl class="row">
        <dt class="col-sm-3">subtotal</dt>
        <dd class="col-sm-9"> <?php echo (isset($_GET['sub']) && isset($_GET['Currency']))? "   " . $_GET['sub'] . " " . $_GET['Currency']:"" ?> </dd>

        <dt class="col-sm-3">Taxes</dt>
        <dd class="col-sm-9">
            <p><?php echo  (isset($_GET['tax']) && isset($_GET['Currency']) ) ? "   " . $_GET['tax'] . " " . $_GET['Currency']: "" ?></p>
        </dd>

        <dt class="col-sm-3">Discount</dt>
        <dd class="col-sm-9">
            <?php if (isset($_GET[0]) ){ ?>
            <?php for ($i = 0 ; $i < count($_GET[0]) ; $i++){ ?>
                <span> <?php echo (isset( $_GET[0][$i] )) ? $_GET[0][$i] : ""  ?> </span>
                <span> <?php echo (isset( $_GET[1][$i]) && isset($_GET[2][$i]) && isset($_GET['Currency']) ) ? $_GET[1][$i] . "% off  : " . "<b>-". $_GET[2][$i] . " " . $_GET['Currency'] . "</b>" : "" ?> </span>
                <br>
            <?php } ?>
            <?php } ?>
        </dd>

        <dt class="col-sm-3 text-truncate">total</dt>
        <dd class="col-sm-9"><?php  echo  ( isset($_GET['total'] ) && isset($_GET['Currency']) )  ? "   " . $_GET['total'] . " " . $_GET['Currency'] : ""?></dd>
    </dl>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>