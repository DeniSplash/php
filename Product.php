<?php
class Product
{
	private string $title;
    private float $price = 0.0;
    private array $components = [];

	public function __construct (string $title, float $price = 0.0) {
		$this->setTitle($title);
		$this->setPrice($price);
	}
	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): void {
		$this->title = $title;
	}
	public function getPrice(): float {
		return $this->price;
	}
	public function setPrice(float $price): void {
		$this->price = $price;
	}
	public function getComponents(): array {
		return $this->components;
	}
	public function addComponent(Product $product): void {
		$this->components[] = $product;
		$this->updatePrace($product->price);
	}
	private function updatePrace(float $price) : void {
		$this->price += $price;
	}
}