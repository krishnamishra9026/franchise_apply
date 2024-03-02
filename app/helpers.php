<?php 

use App\Models\CarSeller;

if(! function_exists('getStatus')) {
    function getStatus($status)
    {
        switch ($status) {
            case 0:
            $order_status = 'Created';
            break;
            case 1:
            $order_status = 'Pending';
            break;
            case 2:
            $order_status = 'Accepted';
            break;
            case 3:
            $order_status = 'Completed';
            break;
            case 4:
            $order_status = 'Rejected';
            break;
            case 5:
            $order_status = 'Shipped';
            break;
            case 6:
            $order_status = 'Processing';
            break;
            default:
            $order_status = 'Created';
            break;
        }
                
        return $order_status;
    }
} 


if(! function_exists('getInvoiceStatus')) {
    function getInvoiceStatus($status)
    {
        switch ($status) {
            case 0:
            $order_status = 'Unpaid';
            break;
            case 1:
            $order_status = 'Paid';
            break;
            case 2:
            $order_status = 'Accepted';
            break;
            case 3:
            $order_status = 'Completed';
            break;
            case 4:
            $order_status = 'Rejected';
            break;
            default:
            $order_status = 'Created';
            break;
        }
                
        return $order_status;
    }
} 


if(! function_exists('getCarSeller')) {
    function getCarSeller($car_id, $seller_id)
    {
       $CarSellerExist =  CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->exists();
        if ($CarSellerExist) {
            return CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->first();
        }else{
            return new CarSeller();
        }        
    }
} 


if(! function_exists('getCarSellerPriceTotal')) {
    function getCarSellerPriceTotal($car_id, $seller_id)
    {
       $CarSellerExist =  CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->exists();
        if ($CarSellerExist) {
            $car_seller = CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->first();

            return $total = ($car_seller->car_base_price + $car_seller->car_road_tax + $car_seller->car_registration_fee + $car_seller->car_delivery_charge);
        }else{
            return 0;
        }        
    }
}


if(! function_exists('getCarSellerPriceGrandTotal')) {
    function getCarSellerPriceGrandTotal($car_id, $seller_id)
    {
     $CarSellerExist =  CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->exists();
     if ($CarSellerExist) {
        $car_seller = CarSeller::where(['car_id' => $car_id, 'seller_id' => $seller_id])->first();

        $total = ($car_seller->car_base_price + $car_seller->car_road_tax + $car_seller->car_registration_fee + $car_seller->car_delivery_charge);

        $vat = ($total*5)/100;
        return  $grand_total = $total+$vat;


    }else{
        return 0;
    }        
}
}

?>
