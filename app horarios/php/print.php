<?php
    function imprimir($data){
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
    
        echo "<script>console.log(`Console: " . $console . "`);</script>";
    };
?>