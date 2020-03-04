<?php
interface IElectronicPart {
    public function getSpecs();
    public function getSpecsHTML($isFirst);   
}

class ElectronicPart {
    private $manufacturer;
    private $price;
    private $model;

    function makeHtmlRow($params, $isFirst = false, $firstTdLen = 6, $firstTdContent = '') {
        $html = '<tr>';
        if ($isFirst) {
            $html .= '<td rowspan='. $firstTdLen.'>'.$firstTdContent.'</td>';
        }
        foreach($params as $key) {
            $html .= '<td>' . $key . '</td>';
        }
        $html .= '</tr>';
        return $html;

    }
}

class Screen extends ElectronicPart implements IElectronicPart {
    private $size;
    private $panel;
    private $myParams;
    public function __construct($paramsArray) {
        $this->myParams = $paramsArray;
        $this->manufacturer = $paramsArray['manufacturer'];
        $this->price = $paramsArray['price'];
        $this->model = $paramsArray['model'];
        $this->panel = $paramsArray['panel'];
        $this->size = $paramsArray['size'];
    }

    public function getSpecs() {
        return 
            'Screen manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', panel: '. $this->panel . 
            ', size: '. $this->size . 
            ', Price: ' . $this->price;
    }

    public function getSpecsHTML($isFirst = false, $firstTdLen = 6, $firstTdContent = '') {
        return $this->makeHtmlRow($this->myParams, $isFirst, $firstTdLen, $firstTdContent);
    }
}

class Mouse extends ElectronicPart implements IElectronicPart{
    private $isWired;

    public function __construct($manufacturer, $price, $model, $isWired) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->isWired = $isWired;
    }

    public function getSpecs() {
        $isWiredStr = $this->isWired ? 'true' : 'false';
        return 
            'Mouse manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', isWired: '. $isWiredStr . 
            ', Price: ' . $this->price;
    }

    public function getSpecsHTML($isFirst) {}
}

class Keyboard extends ElectronicPart implements IElectronicPart{
    private $isWired;

    public function __construct($manufacturer, $price, $model, $isWired) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->isWired = $isWired;
        $this->model = $model;
    }

    public function getSpecs() {
        $isWiredStr = $this->isWired ? 'true' : 'false';

        return 
            'Keyboard manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', isWired: '. $isWiredStr . 
            ', Price: ' . $this->price;
    }

    public function getSpecsHTML($isFirst) {}
}

class Computer extends ElectronicPart implements IElectronicPart{
    private $motherboard;
    private $processor;
    private $hardDrive;
    private $ram;
    private $graphicCard;

    public function __construct(
        $manufacturer, $price, $model, 
        $motherboard, $processor, $hardDrive, $ram, $graphicCard) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->motherboard = $motherboard;
        $this->processor = $processor;
        $this->hardDrive = $hardDrive;
        $this->ram = $ram;
        $this->graphicCard = $graphicCard;
    }
    public function getSpecs() {
        return 
            'Computer manufacturer: ' . $this->manufacturer . 
            ', manufacturer: '. $this->manufacturer . 
            ', price: '. $this->price . 
            ', model: '. $this->model . 
            ', motherboard: '. $this->motherboard . 
            ', processor: '. $this->processor . 
            ', hardDrive: '. $this->hardDrive . 
            ', ram: '. $this->ram . 
            ', graphicCard: ' . $this->graphicCard;
    }

    public function getSpecsHTML($isFirst) {

    }
}

class ElectronicPartFactory {
    function create($objectName, $paramsArray) {
        switch ($objectName) {
            case 'Screen':
                return new Screen($paramsArray);
            case 'Mouse':
                return new Mouse($paramsArray);
        }
    }
}

class purchase {
    private $screen;
    private $mouse;
    private $keyboard;
    private $computer;

    public function __construct($screen, $mouse, $keyboard, $computer) {
        $this->screen = $screen;
        $this->mouse = $mouse;
        $this->keyboard = $keyboard;
        $this->computer = $computer;   
    }

    public function getFullPurchaseDetails() {
        return $this->screen->getSpecs()."\n".
                $this->mouse->getSpecs()."\n".
                $this->keyboard->getSpecs()."\n".
                $this->computer->getSpecs()."\n";
    }

    public function getFullPurchaseDetailsHTML() {
        return "<table>".
                    $this->screen->getSpecsHTML(true, 2, 'Computer 1'). 
                    $this->screen->getSpecsHTML().
                "</table>";
             //   $this->mouse->getSpecsHTML($isFirst)."\n".
             //   $this->keyboard->getSpecsHTML($isFirst)."\n".
             //   $this->computer->getSpecsHTML($isFirst)."\n";
    }
}
?>