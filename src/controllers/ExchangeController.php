<?php

class ExchangeController 
{

    public static function allOffersList(){





        include VIEWS . "exchange/readAllOffers.php";
    }

    public static function allWishesList(){





        include VIEWS . "exchange/readAllWishes.php";
    }

    public static function tradeDetail(){





        include VIEWS . "exchange/exchangePlace.php";
    }

    public static function myTradesList(){





        include VIEWS . "exchange/historique.php";
    }


    public static function tradeDetail(){





        include VIEWS . "exchange/historiqueDetail.php";
    }
















}


?>