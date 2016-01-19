<?php

namespace TiloBaller\Persistence\Driver;

abstract class AbstractDriver implements DriverInterface {

    /**
     * @return array
     */
    public function getOptions() {
        return array();
    }
}