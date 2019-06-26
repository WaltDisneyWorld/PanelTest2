<?php

    require_once dirname(__FILE__).'/../../constants.php';
    require_once dirname(__FILE__).'/ConfigurationBase.php';

    abstract class SFTPAuthenticationMode
    {
        const Password = 0;
        const PublicKeyFile = 1;
        const HostKeyFile = 2;
        const Agent = 3;

        public static function fromString($modeName)
        {
            switch ($modeName) {
                case 'Password':
                    return SFTPAuthenticationMode::Password;
                    break;
                case 'PublicKeyFile':
                    return SFTPAuthenticationMode::PublicKeyFile;
                    break;
                case 'HostKeyFile':
                    return SFTPAuthenticationMode::HostKeyFile;
                    break;
                case 'Agent':
                    return SFTPAuthenticationMode::Agent;
                    break;
                default:
                    throw new InvalidArgumentException('SFTPAuthenticationMode must be one of Password, PublicKeyFile, 
                    HostKeyFile or Agent.');
            }
        }
    }

    class SFTPConfiguration implements ConfigurationBase
    {
        /**
         * @var string
         */
        private $host;

        /**
         * @var int
         */
        private $authenticationMode;

        /**
         * @var string
         */
        private $remoteUsername;

        /**
         * @var string
         */
        private $initialDirectory;

        /**
         * @var null string
         */
        private $password;

        /**
         * @var null string
         */
        private $publicKeyFilePath;

        /**
         * @var null string
         */
        private $privateKeyFilePath;

        /**
         * @var null string
         */
        private $localUsername;

        /**
         * @var bool
         */
        private $validateHostKey;

        /**
         * @var null string
         */
        private $hostKey;

        /**
         * @var int
         */
        private $port;

        public function __construct(
            $host,
            $authenticationMode,
            $remoteUsername,
            $initialDirectory = '',
            $password = null,
            $publicKeyFilePath = null,
            $privateKeyFilePath = null,
            $localUsername = null,
            $validateHostKey = null,
            $hostKey = null,
            $port = null
        ) {
            $this->validateAuthenticationMode($authenticationMode, 'authenticationMode');

            Validation::validateNonEmptyString($host, 'host');
            Validation::validateString($initialDirectory, true);
            Validation::validateNonEmptyString($remoteUsername, 'remoteUsername');
            Validation::validateBoolean($validateHostKey, true);
            Validation::validateInteger($port, true);

            if ($validateHostKey) {
                Validation::validateNonEmptyString($hostKey, 'hostKey');
            }

            if (SFTPAuthenticationMode::Password == $authenticationMode) {
                $this->validatePasswordAuthenticationParameters($password, 'password');
            } elseif (SFTPAuthenticationMode::PublicKeyFile == $authenticationMode
                || SFTPAuthenticationMode::HostKeyFile == $authenticationMode) {
                $this->validateKeyAuthenticationParameters($publicKeyFilePath, $privateKeyFilePath);
            }

            $this->host = $host;
            $this->authenticationMode = $authenticationMode;
            $this->remoteUsername = $remoteUsername;
            $this->initialDirectory = $initialDirectory;
            $this->password = is_null($password) ? '' : $password;
            $this->publicKeyFilePath = $publicKeyFilePath;
            $this->privateKeyFilePath = $privateKeyFilePath;
            $this->localUsername = $localUsername;
            $this->validateHostKey = is_null($validateHostKey) ? false : $validateHostKey;
            $this->hostKey = $hostKey;
            $this->port = is_null($port) ? SFTP_DEFAULT_PORT : $port;
        }

        private function validateAuthenticationMode($authenticationMode)
        {
            if (!is_int($authenticationMode)) {
                throw new InvalidArgumentException("AuthenticationMode must be an integer, got '$authenticationMode''");
            }
            if ($authenticationMode < SFTPAuthenticationMode::Password
                || $authenticationMode > SFTPAuthenticationMode::Agent) {
                throw new InvalidArgumentException('AuthenticationMode is out of range.');
            }
        }

        private function validatePasswordAuthenticationParameters($password)
        {
            Validation::validateString($password, true);
        }

        private function validateKeyAuthenticationParameters($publicKeyFilePath, $privateKeyFilePath)
        {
            if (!is_string($publicKeyFilePath) || 0 == strlen($publicKeyFilePath)) {
                throw new InvalidArgumentException('Public key file must be provided for public key authentication.');
            }

            if (!is_string($privateKeyFilePath) || 0 == strlen($privateKeyFilePath)) {
                throw new InvalidArgumentException('Private key file must be provided for public key authentication.');
            }
        }

        /**
         * @return string
         */
        public function getHost()
        {
            return $this->host;
        }

        /**
         * @return int
         */
        public function getAuthenticationMode()
        {
            return $this->authenticationMode;
        }

        /**
         * @return string
         */
        public function getRemoteUsername()
        {
            return $this->remoteUsername;
        }

        /**
         * @return string
         */
        public function getInitialDirectory()
        {
            return $this->initialDirectory;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getPublicKeyFilePath()
        {
            return $this->publicKeyFilePath;
        }

        public function getPrivateKeyFilePath()
        {
            return $this->privateKeyFilePath;
        }

        public function getLocalUsername()
        {
            return $this->localUsername;
        }

        /**
         * @return bool
         */
        public function isValidateHostKey()
        {
            return $this->validateHostKey;
        }

        public function getHostKey()
        {
            return $this->hostKey;
        }

        /**
         * @return int
         */
        public function getPort()
        {
            return $this->port;
        }

        /**
         * @return bool
         */
        public function isAuthenticationModePassword()
        {
            return SFTPAuthenticationMode::Password == $this->getAuthenticationMode();
        }

        /**
         * @return bool
         */
        public function isAuthenticationModePublicKeyFile()
        {
            return SFTPAuthenticationMode::PublicKeyFile == $this->getAuthenticationMode();
        }

        /**
         * @return bool
         */
        public function isAuthenticationModeAgent()
        {
            return SFTPAuthenticationMode::Agent == $this->getAuthenticationMode();
        }
    }
