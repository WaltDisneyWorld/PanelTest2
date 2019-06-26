<?php
    require_once dirname(__FILE__).'/PermissionSet.php';

    class IntegerPermissionSet extends PermissionSet
    {
        public function __construct($mask)
        {
            if (!is_int($mask) || $mask < 0 || $mask > 7) {
                throw new InvalidArgumentException('Mask must be an integer 0 <= x <= 7');
            }

            $this->readable = 0 != ($mask & 4);
            $this->writable = 0 != ($mask & 2);
            $this->executable = 0 != ($mask & 1);
        }
    }
