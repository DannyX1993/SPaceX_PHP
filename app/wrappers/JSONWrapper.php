<?php

namespace wrappers;

abstract class JSONWrapper
{
    public function __toString()
    {
        global $app;
        // TODO -> MIRAR A VER COMO HACERLO MEDIANTE SINGLETON

        $properties = get_object_vars($this);

        if (count($properties)) {
            foreach ($properties as $key => $val) {
                if (!strlen($val)) unset($properties[$key]);
            }
        }

        return json_encode($properties);
    }
}

?>
