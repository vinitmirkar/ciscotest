<?php

class SSH
{
    private $_host;

    private $_port;

    private $_user;

    private $_password;

    private $_ssh;

    public function __construct($host, $port = 22, $user, $pwd)
    {
        $this->_host = $host;
        $this->_port = $port;
        $this->_user = $user;
        $this->_password = $pwd;

        $this->_ssh = ssh2_connect($this->_host, $this->_port);
    }

    private function _authentication()
    {
        return ssh2_auth_password($this->_ssh, $this->_user, $this->_password);
    }

    public function getDiskFreeSpace()
    {
        return disk_total_space($this->_getDirectoryPath('/'));
    }

    public function getListOfFile($filePath)
    {
        return exec('ls '.$this->_getDirectoryPath($filePath));
    }

    public function copyFiles($filePath)
    {
        $handle = $this->_getDirectoryPath($filePath);
        $filelist = [];
        while (false != ($entry = readdir($handle))){
            if ($entry != '.' && $entry != '..'){
                $filelist[] = $entry;
            }
        }

        $sftp = ssh2_sftp($this->_ssh);
        $sftp_fd = intval($sftp);
        foreach ($filelist as $file){
            echo "Copying file: $file\n";
            if (!$remote = @fopen("ssh2.sftp://{$sftp_fd}{$filePath}{$file}", 'r')){
                echo "Unable to open remote file: $file\n";
                continue;
            }

            if (!$local = @fopen($file, 'w')){
                echo "Unable to create local file: $file\n";
                continue;
            }

            $read = 0;
            $filesize = filesize("ssh2.sftp://{$sftp_fd}{$filePath}{$file}");
            while ($read < $filesize && ($buffer = fread($remote, $filesize - $read))){
                $read += strlen($buffer);
                if (fwrite($local, $buffer) === FALSE)
                {
                    echo "Unable to write to local file: $file\n";
                    break;
                }
            }
            fclose($local);
            fclose($remote);
        }
    }

    private function _getDirectoryPath($filePath)
    {
        if($this->_authentication()){
            $sftp = ssh2_sftp($this->_ssh);
            $sftp_fd = intval($sftp);
            return opendir("ssh2.sftp://".$sftp_fd.$filePath);
        }
    }

    public function restartApache()
    {
        if($this->_authentication()){
            shell_exec('service httpd restart &');
        }
    }
}