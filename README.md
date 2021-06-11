# Gold Pegadaian

### Warning

please use composer version 1.x.x in order to implement this library

### Install

```composer require jauharibill/scrapping-api-pegadaian:2.0```

### POC

```
<?php

require "vendor/autoload.php";

use Gold\Pegadaian;

class Index {
    public function execute() {
        $peg = new Pegadaian();
        return $peg->getSellingPrice()->getContents();
    }
}

$test = new Index();
echo $test->execute();

```

### Result

```
[[1619827200000,867000],[1619913600000,868000],[1620000000000,868000],[1620086400000,870000],[1620172800000,873000],[1620259200000,869000],[1620345600000,875000],[1620432000000,885000],[1620518400000,885000],[1620604800000,869000],[1620691200000,885000],[1620777600000,884000],[1620864000000,882000],[1620950400000,877000],[1621036800000,883000],[1621123200000,887000],[1621209600000,887000],[1621296000000,888000],[1621382400000,897000],[1621468800000,895000],[1621555200000,897000],[1621641600000,904000],[1621728000000,904000],[1621814400000,904000],[1621900800000,904000],[1621987200000,904000],[1622073600000,914000],[1622160000000,912000],[1622246400000,909000],[1622332800000,914000],[1622419200000,914000],[1622505600000,914000],[1622592000000,914000],[1622678400000,909000],[1622764800000,908000],[1622851200000,908000],[1622937600000,911000],[1623024000000,911000]]
```


### License
MIT
