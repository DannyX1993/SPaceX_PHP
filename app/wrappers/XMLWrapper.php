<?php

namespace wrappers;

abstract class XMLWrapper
{
    public function __toString()
    {
        global $app; // TODO -> MIRAR A VER COMO HACERLO MEDIANTE SINGLETON

        $properties = get_object_vars($this);

        $xmlData = new \SimpleXMLElement('<data/>');
        $this->_convert2XML($xmlData, $properties);
        return $xmlData->asXML();
    }

    private function _convert2XML(&$xmlData, $properties)
    {
        if (count($properties)) {
            foreach ($properties as $key => $value) {
                if (strlen($value)) {
                    if (is_numeric($key)) {
                        $key = 'item' . $key; //dealing with <0/>..<n/> issues
                    }
                    if (is_array($value)) {
                        $subnode = $xmlData->addChild($key);
                        $this->_convert2XML($value, $subnode);
                    } else {
                        $xmlData->addChild("$key", htmlspecialchars("$value"));
                    }
                }
            }
        }
    }
}

?>
