
# Jas-Hash

Allows you to encrypt text to "TERRIFYING" text + decryption in the opposite direction

## Examples  

-Encryption
*[encrypt] = http://vm-0.jawadsoft.koding.kd.io/Jas-Hash/?cmd=encrypt&text=[YOUR-TEXT-GOES-HERE] 
-Decryption
*[decrypt] = http://vm-0.jawadsoft.koding.kd.io/Jas-Hash/?cmd=decrypt&text=[ENCRYPTED-TEXT] 


## How to use? 

- ENCRYPTION
-----------

```php

<?php


require_once "JasHash.class.php";

$_Hash  = new Jas_Hash();
echo $_Hash->encrypt("Hello world !");
// Output : 0:119:4:108:9:72:10:33:0588000780011-6-8-7-4-9-2-3-1-10-0-12-11-5

```

- DECRYPTION
-----------

```php

<?php


require_once "JasHash.class.php";

$_Hash  = new Jas_Hash();
echo $_Hash->decrypt("0:119:4:108:9:72:10:33:0588000780011-6-8-7-4-9-2-3-1-10-0-12-11-5");
// Output : Hello world !
```



## Changelog

### 0.1

----

