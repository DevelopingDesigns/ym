<?php

class CPTP_Product_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'CPTP_Product') );
	}

	function test_class_access() {
		$this->assertTrue( cpt_product()->product instanceof CPTP_Product );
	}

  function test_cpt_exists() {
    $this->assertTrue( post_type_exists( 'cptp-product' ) );
  }
}
