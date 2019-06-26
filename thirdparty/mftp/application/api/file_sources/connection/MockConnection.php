<?php

    require_once dirname(__FILE__).'/ConnectionBase.php';
    require_once dirname(__FILE__).'/../connection/StatOutputListItem.php';

    class MockStatOutputListItem extends StatOutputListItem
    {
        public function __construct($name, $fileStat)
        {
            parent::__construct($name, $fileStat);
            if ('src' == $name) {
                $this->link = true;
            }
        }
    }

    class MockConnection extends ConnectionBase
    {
        protected $protocolName = 'Mock';

        private $fixtures = array(
            '/linked-fixtures/test.txt' => 'I am a test file.',
            '/to-delete' => '',
            '/linked-fixtures/dir with spaces/file with spaces' => ' I have spaces in me.',
            '/linked-fixtures/  leading space.txt' => '   I have three leading spaces.',
        );

        private $linkedFixturesList = array(
            array(
                'name' => '  leading space.txt',
                'dev' => 16777220,
                'ino' => 37780461,
                'mode' => 33188,
                'nlink' => 1,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 31,
                'atime' => 1464002544,
                'mtime' => 1462431362,
                'ctime' => 1462431362,
                'blksize' => 4096,
                'blocks' => 8,
            ),
            array(
                'name' => '.hiddenfile',
                'dev' => 16777220,
                'ino' => 34796147,
                'mode' => 33188,
                'nlink' => 1,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 6,
                'atime' => 1463970607,
                'mtime' => 1459029310,
                'ctime' => 1459029310,
                'blksize' => 4096,
                'blocks' => 8,
            ),
            array(
                'name' => 'dir with spaces',
                'dev' => 16777220,
                'ino' => 34784714,
                'mode' => 16877,
                'nlink' => 3,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 102,
                'atime' => 1464003514,
                'mtime' => 1458977554,
                'ctime' => 1458977554,
                'blksize' => 4096,
                'blocks' => 0,
            ),
            array(
                'name' => 'empty-dir',
                'dev' => 16777220,
                'ino' => 34800179,
                'mode' => 16877,
                'nlink' => 2,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 68,
                'atime' => 1464003514,
                'mtime' => 1459035902,
                'ctime' => 1459035902,
                'blksize' => 4096,
                'blocks' => 0,
            ),
            array(
                'name' => 'oldfile.txt',
                'dev' => 16777220,
                'ino' => 37792391,
                'mode' => 33188,
                'nlink' => 1,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 9,
                'atime' => 1463970607,
                'mtime' => 1434991523,
                'ctime' => 1462447218,
                'blksize' => 4096,
                'blocks' => 8,
            ), array(
                'name' => 'test.txt',
                'dev' => 16777220,
                'ino' => 34731845,
                'mode' => 33188,
                'nlink' => 1,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 17,
                'atime' => 1464002544,
                'mtime' => 1458871912,
                'ctime' => 1458871912,
                'blksize' => 4096,
                'blocks' => 8,
            ), array(
                'name' => 'src',
                'dev' => 16777220,
                'ino' => 34731845,
                'mode' => 33188,
                'nlink' => 1,
                'uid' => 501,
                'gid' => 20,
                'rdev' => 0,
                'size' => 17,
                'atime' => 1464002544,
                'mtime' => 1458871912,
                'ctime' => 1458871912,
                'blksize' => 4096,
                'blocks' => 8,
            ),
        );

        private $localFixturesList = array(
            array(
            'name' => 'perm-update',
            'dev' => 16777220,
            'ino' => 34731845,
            'mode' => 0666,
            'nlink' => 1,
            'uid' => 501,
            'gid' => 20,
            'rdev' => 0,
            'size' => 17,
            'atime' => 1464002544,
            'mtime' => 1458871912,
            'ctime' => 1458871912,
            'blksize' => 4096,
            'blocks' => 8,
            ),
        );

        public function __construct($configuration)
        {
            parent::__construct($configuration);
        }

        private function checkFileNotFound($remotePath)
        {
            if (!array_key_exists($remotePath, $this->fixtures)) {
                @trigger_error("No such file or directory $remotePath");
                return false;
            }

            return true;
        }

        protected function handleConnect()
        {
            return $this->configuration->isValidHost();
        }

        protected function handleDisconnect()
        {
            return true;
        }

        protected function handleAuthentication()
        {
            $mockUsernameLength = strlen(MOCK_DEFAULT_USERNAME);

            return MOCK_DEFAULT_USERNAME == substr($this->configuration->getUsername(), 0, $mockUsernameLength)
            && MOCK_DEFAULT_PASSWORD == $this->configuration->getPassword();
        }

        protected function postAuthentication()
        {
            // pass
        }

        protected function handleListDirectory($path, $showHidden)
        {
            if ('/to-copy' == $path) {
                throw new Exception('This is not a directory');
            }

            $dirList = array();

            if ('/local-fixtures/' == $path) {
                $dirSource = $this->localFixturesList;
            } else {
                $dirSource = $this->linkedFixturesList;
            }

            foreach ($dirSource as $entry) {
                if (!$showHidden && '.' == substr($entry['name'], 0, 1)) {
                    continue;
                }

                $dirList[] = new MockStatOutputListItem($entry['name'], $entry);
            }

            return $dirList;
        }

        protected function handleDownloadFile($transferOperation)
        {
            if ('/local-fixtures/no-perms' == $transferOperation->getRemotePath()) {
                $this->setPermissionDeniedError();
                return false;
            }

            if (!$this->checkFileNotFound($transferOperation->getRemotePath())) {
                return false;
            }

            file_put_contents($transferOperation->getLocalPath(), $this->fixtures[$transferOperation->getRemotePath()]);

            return true;
        }

        protected function handleUploadFile($transferOperation)
        {
            if ('/local-fixtures/no-perms' == $transferOperation->getRemotePath()) {
                $this->setPermissionDeniedError();
                return false;
            }

            $fileContents = @file_get_contents($transferOperation->getLocalPath());
            if (false === $fileContents) {
                return false;
            }
            $this->fixtures[$transferOperation->getRemotePath()] = $fileContents;
            return true;
        }

        protected function handleDeleteFile($remotePath)
        {
            if ('/local-fixtures/readonly/file' == $remotePath) {
                $this->setPermissionDeniedError();
                return false;
            }

            if (!$this->checkFileNotFound($remotePath)) {
                return false;
            }

            unset($this->fixtures[$remotePath]);
            return true;
        }

        protected function handleMakeDirectory($remotePath)
        {
            if ('/local-fixtures/readonly/bad-dir' == $remotePath) {
                $this->setPermissionDeniedError();
                return false;
            }

            if ('/local-fixtures' == $remotePath) {
                @trigger_error('File exists');
                return false;
            }

            return true;
        }

        protected function handleDeleteDirectory($remotePath)
        {
            if ('/idontexist' == $remotePath) {
                $this->checkFileNotFound($remotePath);
                return false;
            }

            if ('/local-fixtures/readonly/directory' == $remotePath) {
                $this->setPermissionDeniedError();
                return false;
            }

            return true;
        }

        protected function handleRename($source, $destination)
        {
            $res = $this->handleCopy($source, $destination);
            if (false === $res) {
                return false;
            }
            unset($this->fixtures[$source]);
            return true;
        }

        protected function handleChangePermissions($mode, $remotePath)
        {
            if ('/idontexist' == $remotePath) {
                @trigger_error('Unknown error');
                return false;
            }

            if ('/local-fixtures/perm-update' == $remotePath) {
                $this->localFixturesList[0]['mode'] = $mode;
            } elseif (!$this->checkFileNotFound($remotePath)) {
                return false;
            }

            return true;
        }

        protected function handleCopy($source, $destination)
        {
            if ('/local-fixtures/readonly/file' == $source) {
                $this->setPermissionDeniedError();
                return false;
            }

            if (!$this->checkFileNotFound($source)) {
                return false;
            }

            $contents = $this->fixtures[$source];
            $this->fixtures[$destination] = $contents;
            return true;
        }

        public function deleteDirectory($remotePath)
        {
            $this->ensureConnectedAndAuthenticated('DELETE_DIRECTORY_OPERATION');
            if (!$this->handleDeleteDirectory($remotePath)) {
                $this->handleOperationError('DELETE_DIRECTORY_OPERATION', $remotePath, $this->getLastError());
            }
        }

        private function setPermissionDeniedError()
        {
            @trigger_error('Permission denied');
        }

        protected function handleGetFileInfo($remotePath)
        {
            // TODO: Implement handleGetFileInfo() method.
        }

        protected function handleGetCurrentDirectory()
        {
            return '/';
        }
    }
