<?php

// Data Model for Secure Data Visualization Integrator

class SecureData {
  private $id;
  private $name;
  private $description;
  private $data;

  public function __construct($id, $name, $description, $data) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->data = $data;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getData() {
    return $this->data;
  }
}

class Visualization {
  private $id;
  private $type;
  private $secureData;

  public function __construct($id, $type, SecureData $secureData) {
    $this->id = $id;
    $this->type = $type;
    $this->secureData = $secureData;
  }

  public function getId() {
    return $this->id;
  }

  public function getType() {
    return $this->type;
  }

  public function getSecureData() {
    return $this->secureData;
  }
}

class Integrator {
  private $id;
  private $name;
  private $visualizations;

  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
    $this->visualizations = array();
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function addVisualization(Visualization $visualization) {
    $this->visualizations[] = $visualization;
  }

  public function getVisualizations() {
    return $this->visualizations;
  }
}

// Example usage
$secureData = new SecureData(1, 'Sales Data', 'Quarterly sales data', array('2019' => 1000, '2020' => 1200, '2021' => 1500));
$visualization = new Visualization(1, 'Bar Chart', $secureData);
$integrator = new Integrator(1, 'Sales Dashboard');
$integrator->addVisualization($visualization);

// Output the integrator's data
echo 'Integrator Name: ' . $integrator->getName() . '<br>';
echo 'Visualizations:<br>';
foreach ($integrator->getVisualizations() as $visualization) {
  echo 'Type: ' . $visualization->getType() . '<br>';
  echo 'Data: <br>';
  foreach ($visualization->getSecureData()->getData() as $year => $data) {
    echo $year . ': ' . $data . '<br>';
  }
  echo '<br>';
}

?>