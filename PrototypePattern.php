<?php
abstract class Shape {
	public $id;
	public $type;
	
	function __construct() {}
	
	public function getType(): string {
		return $this->type;
	}
	
	public function getId(): int {
		return $this->id;
	}
	
	public function setId(int $id): void {
		$this->id = $id;
	}
	
	abstract public function draw(): void;
}

class Rectangle extends Shape {
	function __construct() {
		parent::__construct();
		$this->type = 'Rectangle';
	}
	
	public function draw(): void {
		echo 'Inside Rectangle::draw() method.<br/>';
	}
}

class Square extends Shape {
	function __construct() {
		parent::__construct();
		$this->type = 'Square';
	}
	
	public function draw(): void {
		echo 'Inside Square::draw() method.<br/>';
	}
}

class Circle extends Shape {
	function __construct() {
		parent::__construct();
		$this->type = 'Circle';
	}
	
	public function draw(): void {
		echo 'Inside Circle::draw() method.<br/>';
	}
}

class ShapeCache {
	function __construct() {
		$this->shapeMap = [];
	}
	
	public function getShape(int $shapeId): object {
		$shapeCache = $this->shapeMap[$shapeId];
		return $shapeCache;
	}
	
	public function loadCache(): void {
		$circle = new Circle();
		$circle->setId(1);
		$this->shapeMap[$circle->getId()] = $circle;
		
		$square = new Square();
		$square->setId(2);
		$this->shapeMap[$square->getId()] = $square;
		
		$rectangle = new Rectangle();
		$rectangle->setId(3);
		$this->shapeMap[$rectangle->getId()] = $rectangle;
	}
}

$shapeCache = new ShapeCache();
$shapeCache->loadCache();

$clonedShape = $shapeCache->getShape(1);
echo 'Shape : ' . $clonedShape->type . '<br/>';
$clonedShape2 = $shapeCache->getShape(2);
echo 'Shape : ' . $clonedShape2->type . '<br/>';
$clonedShape3 = $shapeCache->getShape(3);
echo 'Shape : ' . $clonedShape3->type . '<br/>';
?>