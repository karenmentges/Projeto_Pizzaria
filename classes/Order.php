<?php
	class Order{
	    private $code;
	    private $codClient;
	    private $deliveryFee;
	    private $deliveryType;
	    private $dateOrder;
	    private $status;
	    private $itens; // array de objetos do tipo ItemCarrinho

		public function getCode() {
			return $this->code;
		}

		public function setCode($code) {
			$this->code = $code;
			return $this;
		}

		public function getCodClient() {
			return $this->codClient;
		}

		public function setCodClient($codClient) {
			$this->codClient = $codClient;
			return $this;
		}

		public function getDeliveryFee() {
			return $this->deliveryFee;
		}

		public function setDeliveryFee($deliveryFee) {
			$this->deliveryFee = $deliveryFee;
			return $this;
		}

		public function getDeliveryType() {
			return $this->deliveryType;
		}

		public function setDeliveryType($deliveryType) {
			$this->deliveryType = $deliveryType;
			return $this;
		}

		public function getDateOrder() {
			return $this->dateOrder;
		}

		public function setDateOrder($dateOrder) {
			$this->dateOrder = $dateOrder;
			return $this;
		}

		public function getStatus() {
			return $this->status;
		}

		public function setStatus($status) {
			$this->status = $status;
			return $this;
		}

		public function getItens() {
			return $this->itens;
		}

		public function setItens($itens) {
			$this->itens = $itens;
			return $this;
		}
	}
?>