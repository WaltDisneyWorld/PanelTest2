<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

class elFinderSession implements elFinderSessionInterface
{
    protected $started = FALSE;

    protected $keys = [];

    protected $base64encode = FALSE;

    protected $opts = [
        'base64encode' => FALSE,
        'keys'         => [
            'default'   => 'elFinderCaches',
            'netvolume' => 'elFinderNetVolumes',
        ],
    ];

    public function __construct($opts)
    {
        $this->opts         = array_merge($this->opts, $opts);
        $this->base64encode = !empty($this->opts['base64encode']);
        $this->keys         = $this->opts['keys'];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function start()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        } else {
            set_error_handler([$this, 'session_start_error'], E_NOTICE);
            session_start();
            restore_error_handler();
        }
        $this->started = session_id() ? TRUE : FALSE;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        if ($this->started) {
            session_write_close();
        }
        $this->started = FALSE;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $empty = NULL)
    {
        $closed = FALSE;
        if (!$this->started) {
            $closed = TRUE;
            $this->start();
        }

        $data = NULL;

        if ($this->started) {
            $session = &$this->getSessionRef($key);
            $data    = $session;
            if ($data && $this->base64encode) {
                $data = $this->decodeData($data);
            }
        }

        $checkFn = NULL;
        if (!is_null($empty)) {
            if (is_string($empty)) {
                $checkFn = 'is_string';
            } elseif (is_array($empty)) {
                $checkFn = 'is_array';
            } elseif (is_object($empty)) {
                $checkFn = 'is_object';
            } elseif (is_float($empty)) {
                $checkFn = 'is_float';
            } elseif (is_int($empty)) {
                $checkFn = 'is_int';
            }
        }

        if (is_null($data) || ($checkFn && !$checkFn($data))) {
            $session = $data = $empty;
        }

        if ($closed) {
            $this->close();
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $data)
    {
        $closed = FALSE;
        if (!$this->started) {
            $closed = TRUE;
            $this->start();
        }
        $session = &$this->getSessionRef($key);
        if ($this->base64encode) {
            $data = $this->encodeData($data);
        }
        $session = $data;

        if ($closed) {
            $this->close();
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        $closed = FALSE;
        if (!$this->started) {
            $closed = TRUE;
            $this->start();
        }

        list($cat, $name) = array_pad(explode('.', $key, 2), 2, NULL);
        if (is_null($name)) {
            if (!isset($this->keys[$cat])) {
                $name = $cat;
                $cat  = 'default';
            }
        }
        if (isset($this->keys[$cat])) {
            $cat = $this->keys[$cat];
        } else {
            $name = $cat.'.'.$name;
            $cat  = $this->keys['default'];
        }
        if (is_null($name)) {
            unset($_SESSION[$cat]);
        } else {
            if (isset($_SESSION[$cat]) && is_array($_SESSION[$cat])) {
                unset($_SESSION[$cat][$name]);
            }
        }

        if ($closed) {
            $this->close();
        }

        return $this;
    }

    protected function &getSessionRef($key)
    {
        $session = NULL;
        if ($this->started) {
            list($cat, $name) = array_pad(explode('.', $key, 2), 2, NULL);
            if (is_null($name)) {
                if (!isset($this->keys[$cat])) {
                    $name = $cat;
                    $cat  = 'default';
                }
            }
            if (isset($this->keys[$cat])) {
                $cat = $this->keys[$cat];
            } else {
                $name = $cat.'.'.$name;
                $cat  = $this->keys['default'];
            }
            if (is_null($name)) {
                if (!isset($_SESSION[$cat])) {
                    $_SESSION[$cat] = NULL;
                }
                $session = &$_SESSION[$cat];
            } else {
                if (!isset($_SESSION[$cat]) || !is_array($_SESSION[$cat])) {
                    $_SESSION[$cat] = [];
                }
                if (!isset($_SESSION[$cat][$name])) {
                    $_SESSION[$cat][$name] = NULL;
                }
                $session = &$_SESSION[$cat][$name];
            }
        }

        return $session;
    }

    protected function encodeData($data)
    {
        if ($this->base64encode) {
            $data = base64_encode(serialize($data));
        }

        return $data;
    }

    protected function decodeData($data)
    {
        if ($this->base64encode) {
            if (is_string($data)) {
                if (($data = base64_decode($data)) !== FALSE) {
                    $data = @unserialize($data);
                } else {
                    $data = NULL;
                }
            } else {
                $data = NULL;
            }
        }

        return $data;
    }

    protected function session_start_error($errno, $errstr)
    {
    }
}
