<?php
require_once 'solution.php';
$factory = new ElectronicPartFactory;

$screen1 = $factory->create('Screen', array(
    "manufacturer" => 'Samsung', 
    "price" => 723, 
    "model" => 'S24F350FH', 
    "panel" => 'PLS', 
    "size" => 24
));
$screen2 = $factory->create('Screen', array(
    "manufacturer" => 'Samsung', 
    "price" => 620, 
    "model" => 'S22F350FH', 
    "panel" => 'TN', 
    "size" => 21.5
));

$screen3 = $factory->create('Screen', array(
    "manufacturer" => 'Philips', 
    "price" => 1517, 
    "model" => '273V5LHAB', 
    "panel" => 'TFT', 
    "size" => 27
));

$screen4 = $factory->create('Screen', array(
    "manufacturer" => 'Samsung', 
    "price" => 2074, 
    "model" => 'C27F591FD', 
    "panel" => 'VA', 
    "size" => 27
));

$mouse1 = new Mouse('Microsoft', 129, 'Mobile Mouse 1850', false);
$mouse2 = new Mouse('LogiTech', 799, 'MX Master', false);
$mouse3 = new Mouse('LogiTech', 128, 'M185', true);
$mouse4 = new Mouse('HP', 99, 'X3000 H2C22AA', false);

$keyboard1 = new Keyboard('Microsoft', 325, 'Natural Ergonomic 4000', true);
$keyboard2 = new Keyboard('Logitech', 285, 'G105', true);
$keyboard3 = new Keyboard('RAPOO', 189, 'E6100', false);
$keyboard4 = new Keyboard('Corsair', 799, 'K95', true);

$computer1 = new Computer(
    'GIGABYTE', 
    3059, 
    '',
    'GA-Z170-HD3', 
    'INTEL I7-6700', 
    'WD1TB', 
    '8GB DDR4 Hyper-X', 
    'Intel® HD Graphics 530'
);
$computer2 = new Computer(
    'AMD', 
    2418, 
    '',
    'ASUS A88XM-A/USB3.1', 
    'AMD A-Series Quad Core A10-7870K 3.9GHz', 
    'SanDisk SSD Plus 240GB', 
    'Kingston 8GB DDR3 1600MHz', 
    'AMD Radeon R7 Graphics'
);
$computer3 = new Computer(
    'Intel', 
    1580, 
    '',
    '', 
    'Intel Core i3-7100 3.9Ghz', 
    '500GB 7200RPM', 
    '4GB DDR4 2100Mhz',
    'Intel Skylake GT2 HD Graphics 630'
);

$pur1 = new purchase($screen1, $mouse1, $keyboard1, $computer1);
$pur2 = new purchase($screen4, $mouse3, $keyboard1, $computer3);
$pur3 = new purchase($screen3, $mouse2, $keyboard4, $computer1);
$pur4 = new purchase($screen2, $mouse1, $keyboard2, $computer2);



/* 
    Screen manufacturer: Samsung, model: S24F350FH, panel: PLS, size: 24, Price: 723
    Mouse manufacturer: Microsoft, model: Mobile Mouse 1850, isWired: false, Price: 129
    Keyboard manufacturer: Microsoft, model: Natural Ergonomic 4000, isWired: true, Price: 325
    Computer manufacturer: GIGABYTE, manufacturer: GIGABYTE, price: 3059, model: , motherboard: GA-Z170-HD3, processor: INTEL I7-6700, hardDrive: WD1TB, ram: 8GB DDR4 Hyper-X, graphicCard: Intel® HD Graphics 530

    Screen manufacturer: Samsung, model: C27F591FD, panel: VA, size: 27, Price: 2074
    Mouse manufacturer: LogiTech, model: M185, isWired: true, Price: 128
    Keyboard manufacturer: Microsoft, model: Natural Ergonomic 4000, isWired: true, Price: 325
    Computer manufacturer: Intel, manufacturer: Intel, price: 1580, model: , motherboard: , processor: Intel Core i3-7100 3.9Ghz, hardDrive: 500GB 7200RPM, ram: 4GB DDR4 2100Mhz, graphicCard: Intel Skylake GT2 HD Graphics 630

    Screen manufacturer: Philips, model: 273V5LHAB, panel: TFT, size: 27, Price: 1517
    Mouse manufacturer: LogiTech, model: MX Master, isWired: false, Price: 799
    Keyboard manufacturer: Corsair, model: K95, isWired: true, Price: 799
    Computer manufacturer: GIGABYTE, manufacturer: GIGABYTE, price: 3059, model: , motherboard: GA-Z170-HD3, processor: INTEL I7-6700, hardDrive: WD1TB, ram: 8GB DDR4 Hyper-X, graphicCard: Intel® HD Graphics 530

    Screen manufacturer: Samsung, model: S22F350FH, panel: TN, size: 21.5, Price: 620
    Mouse manufacturer: Microsoft, model: Mobile Mouse 1850, isWired: false, Price: 129
    Keyboard manufacturer: Logitech, model: G105, isWired: true, Price: 285
    Computer manufacturer: AMD, manufacturer: AMD, price: 2418, model: , motherboard: ASUS A88XM-A/USB3.1, processor: AMD A-Series Quad Core A10-7870K 3.9GHz, hardDrive: SanDisk SSD Plus 240GB, ram: Kingston 8GB DDR3 1600MHz, graphicCard: AMD Radeon R7 Graphics

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $pur1->getFullPurchaseDetailsHTML() ?>
</body>
</html>