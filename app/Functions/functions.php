<?php

// Global functions will be here...

function is(&$e) {
    return $e ? '\'' . addslashes($e) . '\'' : 'NULL';
}
