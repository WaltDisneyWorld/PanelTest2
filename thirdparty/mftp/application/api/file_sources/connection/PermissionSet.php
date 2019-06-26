<?php
    abstract class PermissionSet
    {
        /**
         * @var bool
         */
        protected $readable;

        /**
         * @var bool
         */
        protected $writable;

        /**
         * @var bool
         */
        protected $executable;

        public function isReadable()
        {
            return $this->readable;
        }

        public function isWritable()
        {
            return $this->writable;
        }

        public function isExecutable()
        {
            return $this->executable;
        }

        public function asNumeric()
        {
            return ($this->isExecutable() ? 1 : 0) + ($this->isWritable() ? 2 : 0) +
            ($this->isReadable() ? 4 : 0);
        }
    }
