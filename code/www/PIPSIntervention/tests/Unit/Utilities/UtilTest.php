<?php

namespace Utilities;

use App\Utilities\Util;
use Tests\TestCase;

class UtilTest extends TestCase
{
    private array $inArray = array(
        array('idx1' => 'One', 'idx2' => 'Two'),
        array('idx1' => 'One', 'idx2' => 'Two'),
        array('idx1' => 'one', 'idx2' => 'Two'),
        array('idx1' => 'one', 'idx2' => 'Two'),
        );

    public function testFilterArrayByValueReturnsValidArray() {
        $expected = array(
            array('idx1' => 'One', 'idx2' => 'Two'),
            array('idx1' => 'One', 'idx2' => 'Two'),
        );
        $actual = Util::filterArrayByValue($this->inArray, 'idx1', 'One');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
    public function testFilterArrayReturnsEmptyArrayWithEmptyInputArray() {
        $expected = array();
        $actual = Util::filterArrayByValue(array(), 'idx1', 'One');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
    public function testFilterArrayReturnsEmptyArrayWithEmptyProperty() {
        $expected = array();
        $actual = Util::filterArrayByValue($this->inArray, '', 'One');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
    public function testFilterArrayReturnsEmptyArrayWithUnknownProperty() {
        $expected = array();
        $actual = Util::filterArrayByValue($this->inArray, 'fred', 'One');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
    public function testFilterArrayReturnsEmptyArrayWithEmptyValue() {
        $expected = array();
        $actual = Util::filterArrayByValue($this->inArray, 'idx1', '');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
    public function testFilterArrayReturnsEmptyArrayWithUnknownValue() {
        $expected = array();
        $actual = Util::filterArrayByValue($this->inArray, 'idx1', 'Two');
        $this->assertSameSize($expected, $actual);
        $this->assertEquals($expected, $actual);
    }

    public function testAddHTMLSuperscriptOrdinalReturnsAnEmptyStringWithAnEmptyInput() : void {
        $inStr = '';
        $expected = '';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturnsInputWithAnInputThatDoesNotEndInANumber() : void {
        $inStr = 'fred';
        $expected = 'fred';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns1stWithAnInputThatEndsIn1() : void {
        $inStr = 'fred1';
        $expected = 'fred1<sup>st</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns2ndWithAnInputThatEndsIn2() : void {
        $inStr = 'fred2';
        $expected = 'fred2<sup>nd</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns3rdWithAnInputThatEndsIn3() : void {
        $inStr = 'fred3';
        $expected = 'fred3<sup>rd</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns4thWithAnInputThatEndsIn4() : void {
        $inStr = 'fred4';
        $expected = 'fred4<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns5thWithAnInputThatEndsIn5() : void {
        $inStr = 'fred5';
        $expected = 'fred5<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns6thWithAnInputThatEndsIn6() : void {
        $inStr = 'fred6';
        $expected = 'fred6<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns7thWithAnInputThatEndsIn7() : void {
        $inStr = 'fred7';
        $expected = 'fred7<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns8thWithAnInputThatEndsIn8() : void {
        $inStr = 'fred8';
        $expected = 'fred8<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns9thWithAnInputThatEndsIn9() : void {
        $inStr = 'fred9';
        $expected = 'fred9<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }
    public function testAddHTMLSuperscriptOrdinalReturns0thWithAnInputThatEndsIn0() : void {
        $inStr = 'fred10';
        $expected = 'fred10<sup>th</sup>';
        $actual = Util::AddHTMLSuperscriptOrdinal($inStr);
        $this->assertEquals($expected, $actual);
    }

}
