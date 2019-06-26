<?php

    class PathOperations
    {
        public static function join()
        {
            $pathComponents = array();

            foreach (func_get_args() as $pathComponent) {
                if ('' !== $pathComponent) {
                    if ('/' == substr($pathComponent, 0, 1)) {
                        $pathComponents = array();
                    }  // if we're back at the root then reset the array
                    $pathComponents[] = $pathComponent;
                }
            }

            return preg_replace('#/+#', '/', join('/', $pathComponents));
        }

        public static function normalize($path)
        {
            $pathComponents = array();
            $realPathComponentFound = false;  // ..s should be resolved only if they aren't leading the path
            $pathPrefix = '/' == substr($path, 0, 1) ? '/' : '';

            foreach (explode('/', $path) as $pathComponent) {
                if (0 == strlen($pathComponent) || '.' == $pathComponent) {
                    continue;
                }

                if ('..' == $pathComponent && $realPathComponentFound) {
                    unset($pathComponents[count($pathComponents) - 1]);
                    continue;
                }

                $pathComponents[] = $pathComponent;
                $realPathComponentFound = true;
            }

            return $pathPrefix.join('/', $pathComponents);
        }

        public static function directoriesMatch($dir1, $dir2)
        {
            return PathOperations::normalize($dir1) == PathOperations::normalize($dir2);
        }

        public static function remoteDirname($path)
        {
            // on windows machines $dirName will be \ for root files, we want it to be / for remote paths
            $dirName = dirname($path);
            return ('\\' == $dirName) ? '/' : $dirName;
        }

        public static function directoriesInPath($directoryPath)
        {
            $directories = array();
            while ('/' != $directoryPath && null != $directoryPath && '' != $directoryPath) {
                $directories[] = $directoryPath;
                $directoryPath = self::remoteDirname($directoryPath);
            }

            return $directories;
        }

        public static function ensureTrailingSlash($path)
        {
            if (0 == strlen($path)) {
                return '/';
            }

            if ('/' != substr($path, strlen($path) - 1, 1)) {
                $path .= '/';
            }

            return $path;
        }

        public static function isParentPath($parent, $child)
        {
            $normalizedChild = self::ensureTrailingSlash(self::normalize($child));
            $normalizedParent = self::ensureTrailingSlash(self::normalize($parent));

            return substr($normalizedChild, 0, strlen($normalizedParent)) == $normalizedParent;
        }

        public static function getFirstPathComponent($path)
        {
            $pathWithoutLeadingSlashes = preg_replace('|^(/+)|', '', $path);

            $pathComponents = explode('/', $pathWithoutLeadingSlashes);
            return (0 == count($pathComponents)) ? '' : $pathComponents[0];
        }

        public static function stripTrailingSlash($path)
        {
            return '/' === substr($path, -1) ? substr($path, 0, -1) : $path;
        }

        public static function recursiveDelete($path)
        {
            if (true === is_dir($path)) {
                $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

                foreach ($files as $file) {
                    if (true !== in_array($file->getBasename(), array('.', '..'))) {
                        $removeSuccess = true;

                        if (true === $file->isDir()) {
                            $removeSuccess = @rmdir($file->getPathName());
                        } elseif ((true === $file->isFile()) || (true === $file->isLink())) {
                            $removeSuccess = @unlink($file->getPathname());
                        }

                        if (!$removeSuccess) {
                            return false;
                        }
                    }
                }

                return @rmdir($path);
            } elseif ((true === is_file($path)) || (true === is_link($path))) {
                return @unlink($path);
            }

            return false;
        }

        public static function pathDepthCompare($path1, $path2)
        {
            // naive function for ordering paths based on their depth; more slashes == deeper
            $slashCount1 = substr_count($path1, '/');
            $slashCount2 = substr_count($path2, '/');

            if ($slashCount1 == $slashCount2) {
                return strcasecmp($path1, $path2);
            } // if same depth, just alphabetical sort. doesn't really matter

            return ($slashCount1 > $slashCount2) ? -1 : 1;
        }
    }

    function pathDepthCompare($path1, $path2)
    {
        // Wrap the static method above, as PHP doesn't understand passing a static method to usort
        return PathOperations::pathDepthCompare($path1, $path2);
    }
