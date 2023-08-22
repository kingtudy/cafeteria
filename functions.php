<?php
function pre($input){
    echo '<pre style="background: #0e1a14; border: 3px solid #116d00; border-radius: 25px; color: #0ea14a; position: fixed; top: 0; left: 0; z-index: 999; padding: 20px; margin: 25px;">', print_r($input, true), '</pre>';
}

