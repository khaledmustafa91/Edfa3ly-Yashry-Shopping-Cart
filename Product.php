<?php

class Product{
    protected $price = 0;
    protected $discount = 0;
    protected $taxes = 0;
    protected $numOfItems = 0;
    protected $isDiscounted = false; // Check if this product is discounted or not
    protected $Currency="USD";
    public function calculatePrice(){
        return $this->getNumOfItems() * $this->getPrice(); // multiply number of items to product price
    }
    public function calculateDiscount(){
        return ($this->getPrice() * $this->getDiscount()) / 100; // Calculate the discount by multiply the price to discount and divide into 100
    }
    public function calculateAll(){
        // in this function calculate all prices product price, discount and the taxes then return total price
        $totalPrice = $this->calculatePrice();
        $totalDiscount = $this->calculateDiscount();
        $totalTaxes = $this->applyTaxes();
        return  $totalPrice - $totalDiscount + $totalTaxes ;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setDiscount($discount,$product=null){
        // Here check if product array is null or not
        if(!is_null($product)) {
            // if is not null then offers is exist
            $applyDiscounted = true; // boolean to check if all conditions applied
            // loop for all product array to apply all conditions
            while ($ProductObj = current($product)) {
                if ($ProductObj->getNumOfItems() < key($product)) { // Here check if customer product items number is less than number of offer product
                    $applyDiscounted = false; // if less then we can't apply the discount
                }
                next($product);
            }
            if($applyDiscounted){
                $this->discount = $discount;
            }
        }
        else{
            $this->discount = $discount;
        }
        $this->isDiscounted = true; // set the isDiscounted to true
    }
    public function setNumOfItems($numOfItems){
        $this->numOfItems = $numOfItems;
    }
    public function setTaxes($taxes){
        $this->taxes = $taxes;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
    }
    public function getDiscount(){
        return $this->discount;
    }
    public function getNumOfItems(){
        return $this->numOfItems;
    }
    public function increaseNumofItem(){
        $this->numOfItems++;
    }
    public function getTaxes(){
        return $this->taxes;
    }
    public function getIsDiscounted(){
        return $this->isDiscounted;
    }
    public function getCurrency()
    {
        return $this->Currency;
    }
    public function applyTaxes(){
        return  ($this->calculatePrice() * $this->getTaxes() ) / 100;
    }
    public function ChangeCurrency(){
        // API to get the currency conversion
        // Fetching JSON
        $req_url = 'https://v6.exchangerate-api.com/v6/4bdac2669578daa6817b7d18/latest/USD';
        $response_json = file_get_contents($req_url);
        // Continuing if we got a result
        if(false !== $response_json) {

            // Try/catch for json_decode operation
            try {

                // Decoding
                $response = get_object_vars(json_decode($response_json));
                // Check for success
                if('success' === $response['result']) {
                    // YOUR APPLICATION CODE HERE, e.g.
                    $base_price = $this->getPrice(); // Your price in USD
                    foreach ($response['conversion_rates'] as $CurrencyName => $val) {
                        // here subtract the string to make a compare between tow strings
                        $curClassName = substr($this->Currency,0,3);
                        $curName =substr($CurrencyName,0,3);
                        if ($curClassName == $curName) {
                            $this->setPrice($base_price * $val);
                            break;                        }
                    }
                }
            }
            catch(Exception $e) {
                echo "Theres some errors";
            }
        }
    }
}
class Tshirt extends Product{

}
class Shoes extends Product{

}
class Jacket extends Product{

}

class Pants extends Product{

}
if(isset($_POST['submit'])) {

    // Create instance of all products
    $tShirtObj = new Tshirt();
    $shoesObj = new Shoes();
    $jacketObj = new Jacket();
    $pantsObj = new Pants();

    $allProducts = array();
    array_push($allProducts, $tShirtObj, $jacketObj, $shoesObj,$pantsObj); // push all products to an array

    // Set prices in USD
    $tShirtObj->setPrice(10.99);
    $pantsObj->setPrice(14.99);
    $jacketObj->setPrice(19.99);
    $shoesObj->setPrice(24.99);

    // here if the user change the currency we will change it
    if(!empty($_POST['currency'])) {
        $selected = strval($_POST['currency']);
        if($selected != "USD") {
            $tShirtObj->setCurrency($selected);
            $pantsObj->setCurrency($selected);
            $jacketObj->setCurrency($selected);
            $shoesObj->setCurrency($selected);

            $tShirtObj->ChangeCurrency();
            $pantsObj->ChangeCurrency();
            $jacketObj->ChangeCurrency();
            $shoesObj->ChangeCurrency();
        }
    }

    // here set number of items user entered in the form
    $tShirtObj->setNumOfItems($_POST['tshirt']);
    $jacketObj->setNumOfItems($_POST['jacket']);
    $shoesObj->setNumOfItems($_POST['shoes']);
    $pantsObj->setNumOfItems($_POST['pants']);

    // if any offers will put it here and can edit it here or make admin panel to control that
    $shoesObj->setDiscount(10);
    $jacketObj->setDiscount(50, array(2 => &$tShirtObj));

    // set all taxes
    $tShirtObj->setTaxes(14);
    $shoesObj->setTaxes(14);
    $jacketObj->setTaxes(14);
    $pantsObj->setTaxes(14);

    // calculate sub total without taxes or discount
    $subtotal = $tShirtObj->calculatePrice() + $shoesObj->calculatePrice() + $jacketObj->calculatePrice() + $pantsObj->calculatePrice();

    // calculate all taxes
    $taxs = $tShirtObj->applyTaxes() + $shoesObj->applyTaxes() + $jacketObj->applyTaxes() + $pantsObj->applyTaxes();


    // Here calculate discount if the user enter number of items greater than 0
    // save the result of all product in array to pass it in url and display it into the form
    $DiscountsBool = true;
    $discountItems = array();
    $discountItemsDiscount = array();
    $discountItemsDiscountValue = array();
    $total = 0;
    for ($index = 0; $index < count($allProducts); $index++) {
        if ($allProducts[$index]->getIsDiscounted() == true && $allProducts[$index]->getNumOfItems() > 0 && $allProducts[$index]->getDiscount() > 0) {
            if ($DiscountsBool) {
                echo "Discounts: " . "<br>";
                echo $allProducts[$index]->getDiscount() . "% off " . get_class($allProducts[$index]) . ": " . $allProducts[$index]->calculateDiscount() . "<br>";
                $DiscountsBool = false;
            } else {
                echo $allProducts[$index]->getDiscount() . "% off " . get_class($allProducts[$index]) . ": " . $allProducts[$index]->calculateDiscount() . "<br>";
            }
            $total+=$allProducts[$index]->calculateAll();
            array_push($discountItems,get_class($allProducts[$index]));
            array_push($discountItemsDiscount,$allProducts[$index]->getDiscount());
            array_push($discountItemsDiscountValue,$allProducts[$index]->calculateDiscount());
        }
        elseif($allProducts[$index]->getNumOfItems() > 0){
            $total += $allProducts[$index]->calculatePrice() + $allProducts[$index]->applyTaxes();
        }
    }

    // combine all data into one array and pass it
    $data = array("sub"=>$subtotal , "tax"=>$taxs, $discountItems, $discountItemsDiscount , $discountItemsDiscountValue,"total"=>$total , "Currency"=>$tShirtObj->getCurrency());
    header("Location: index.php?" . http_build_query($data));
}
?>