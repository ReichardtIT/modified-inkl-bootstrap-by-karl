<?php
//~ require_once 'vfsStream/vfsStream.php';
require_once(DIR_WS_INCLUDES.'external/klarna/api/transport/xmlrpc-3.0.0.beta/lib/xmlrpc.inc');
require_once(DIR_WS_INCLUDES.'external/klarna/api/transport/xmlrpc-3.0.0.beta/lib/xmlrpc_wrappers.inc');
require_once('../Klarna.php');

/**
 * Test class for KlarnaEncoding.
 * Generated by PHPUnit on 2011-01-28 at 09:47:45.
 */
class KlarnaEncodingTest extends PHPUnit_Framework_TestCase {

    public function dataproviderTestGetRegexp() {
        return array(
            array('/^[0-9]{6,6}(([0-9]{2,2}[-\+]{1,1}[0-9]{4,4})|([-\+]{1,1}[0-9]{4,4})|([0-9]{4,6}))$/', KlarnaEncoding::PNO_SE),
            array('/^[0-9]{6,6}((-[0-9]{5,5})|([0-9]{2,2}((-[0-9]{5,5})|([0-9]{1,1})|([0-9]{3,3})|([0-9]{5,5))))$/', KlarnaEncoding::PNO_NO),
            array('/^[0-9]{6,6}(([A\+-]{1,1}[0-9]{3,3}[0-9A-FHJK-NPR-Y]{1,1})|([0-9]{3,3}[0-9A-FHJK-NPR-Y]{1,1})|([0-9]{1,1}-{0,1}[0-9A-FHJK-NPR-Y]{1,1}))$/i', KlarnaEncoding::PNO_FI),
            array('/^[0-9]{8,8}([0-9]{2,2})?$/', KlarnaEncoding::PNO_DK),
            array('/^[0-9]{7,9}$/', KlarnaEncoding::PNO_DE),
            array('/^[0-9]{7,9}$/', KlarnaEncoding::PNO_NL),
            array('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z0-9-][a-zA-Z0-9-]+)+$/', KlarnaEncoding::EMAIL),
        );
    }

    /**
     * @dataProvider dataproviderTestGetRegexp
     * @param string $result A regexp string
     * @param int $enc PNO/SSN encoding constant
     */
    public function testGetRegexp($result, $enc) {
        $this->assertEquals($result, KlarnaEncoding::getRegexp($enc));
    }

    /**
     * @expectedException KlarnaException
     */
    public function testGetRegexpException() {
        $this->assertEquals("", KlarnaEncoding::getRegexp(0));
    }

    public function dataProviderGetPNOArrayValid() {
        return $this->getPNOArray('VALID');
    }

    public function dataProviderGetPNOArrayInvalid() {
        return $this->getPNOArray('INVALID');
    }

    public function getPNOArray($tag) {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $file = dirname(__FILE__).'/data/UnitPersonTestList.xml';
        if(!$dom->load($file)) {
            echo "Failed to load";
        }
        $xpath = new DOMXpath($dom);

        $query = "/root/".$tag."[@id='Persons']/child::node()";
        $tmp = array();
        foreach ($xpath->query($query) as $node) {
            if(!($node instanceof DOMElement)) continue;
            $tagName = $node->tagName;
            $pnoNode = $xpath->query('//PNO', $node)->item(0);
            $countryNode = $xpath->query('//COUNTRY', $node)->item(0);
            $country = 0;
            $c = $countryNode->nodeValue;
            switch ($c) {
                case 'SE':
                    $country = KlarnaEncoding::PNO_SE;
                    break;
                case 'NO':
                    $country = KlarnaEncoding::PNO_NO;
                    break;
                case 'FI':
                    $country = KlarnaEncoding::PNO_FI;
                    break;
                case 'DK':
                    $country = KlarnaEncoding::PNO_DK;
                    break;
                case 'DE':
                    $country = KlarnaEncoding::PNO_DE;
                    break;
                case 'NL':
                    $country = KlarnaEncoding::PNO_NL;
                    break;
                default:
                    throw new Exception('Unknown country?');
            }
            $tmp[] = array(
                $pnoNode->nodeValue, //string
                $country
            );
        }
        return $tmp;
    }

    /**
     * @dataProvider dataProviderGetPNOArrayValid
     * @param string $pno PNO/SSN string
     * @param int $enc PNO/SSN encoding constant
     */
    public function testCheckPNOValidPersons($pno, $enc) {
        $this->assertTrue(KlarnaEncoding::checkPNO($pno, $enc));
    }

    /**
     * @dataProvider dataProviderGetPNOArrayInvalid
     * @param string $pno PNO/SSN string
     * @param int $enc PNO/SSN encoding constant
     */
    public function testCheckPNOInvalidPersons($pno, $enc) {
        $this->assertTrue(KlarnaEncoding::checkPNO($pno, $enc));
    }

    /**
     * @todo Implement testCheckPNOException()
     */
    public function testCheckPNOException() {
        $this->markTestIncomplete(
                'This test is incomplete for now.'
        );
    }

}
?>
