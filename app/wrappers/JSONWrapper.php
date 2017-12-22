<?php

namespace wrappers;

abstract class JSONWrapper
{
    public function __toString()
    {
        global $app; // TODO -> MIRAR A VER COMO HACERLO MEDIANTE SINGLETON

        $properties = get_object_vars($this);

        if (count($properties)) {
            foreach ($properties as $key => $val) {
                if (!is_array($val) && !strlen($val)) {
                    unset($properties[$key]);
                } else if (is_array($val)) {
                    if (count($val)) {
                        foreach ($val as $key2 => $elem) {
                            $properties[$key][$key2] = $elem->__toString();
                        }
                    }
                }
            }
        }

        return json_encode($properties);
    }
}

?>
