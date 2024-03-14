<?php
use PHPUnit\Framework\TestCase;

require_once 'StrReverse.php';

class StrReverseTest extends TestCase {
    public function testBasic() {
        $input = "Is 'cold' now, tHIrd-part? can`t";
        $expected = "Si 'dloc' won, dRIht-trap? nac`t";
        $this->assertEquals($expected, strReverse($input));
    }

    public function testReversalWithPunctuation() {
        $input = "Hello, world! - How are you?";
        $expected = "Olleh, dlrow! - Woh era uoy?";
        $this->assertEquals($expected, strReverse($input));
    }

    public function testReversalWithMixedCaseAndPunctuation() {
        $input = "HeLLo, WoRlD!";
        $expected = "OlLEh, DlRoW!";
        $this->assertEquals($expected, strReverse($input));
    }

    public function testReversalWithLeadingAndTrailingSpaces() {
        $input = "  Hello, ---   world!  ";
        $expected = "  Olleh, ---   dlrow!  ";
        $this->assertEquals($expected, strReverse($input));
    }

    public function testReversalWithEmptyString() {
        $input = "";
        $expected = "";
        $this->assertEquals($expected, strReverse($input));
    }
}