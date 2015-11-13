<?php

class ExampleTest extends PHPUnit_Framework_TestCase{

  public function testExample()
   {
       // Arrange
       $a = true;

       // Act
       $b = $a;

       // Assert
       $this->assertEquals($a, $b);
   }
}
