<?php
    require_once dirname(__FILE__).'/PermissionSet.php';

    abstract class PermissionTypeIndex
    {
        const Read = 0;
        const Write = 1;
        const Execute = 2;
    }

    class StringPermissionSet extends PermissionSet
    {
        public function __construct($permissions)
        {
            if (3 != strlen($permissions)) {
                throw new InvalidArgumentException(sprintf(
                    "Permissions arg must be a string of length 3, got '%s'",
                    $permissions
                ));
            }

            $writeBit = substr($permissions, PermissionTypeIndex::Write, 1);
            $readBit = substr($permissions, PermissionTypeIndex::Read, 1);
            $executeBit = substr($permissions, PermissionTypeIndex::Execute, 1);

            if ('-' != $readBit) {
                $readBit = 'r';
            }

            if ('-' != $writeBit) {
                $writeBit = 'w';
            }

            if ('T' == $executeBit) {
                $executeBit = '-';
            }

            if ('-' != $executeBit) {
                $executeBit = 'x';
            }

            $this->validateModeBit('r', $readBit);
            $this->validateModeBit('w', $writeBit);
            $this->validateModeBit('x', $executeBit);

            $this->readable = 'r' == $readBit;
            $this->writable = 'w' == $writeBit;
            $this->executable = 'x' == $executeBit;
        }

        private function validateModeBit($expectedBit, $actualBit)
        {
            if ($actualBit != $expectedBit && '-' != $actualBit) {
                throw new InvalidArgumentException(sprintf(
                    "Invalid flag for %s bit, expected '%s' or '-', got '%s'",
                    $expectedBit,
                    $expectedBit,
                    $actualBit
                ));
            }
        }
    }
