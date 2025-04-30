<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\core;

class FileManager
{
    public function __construct()
    {
    }

    public function uploadFile($file, $destination)
    {
        // Check if the file was uploaded without errors
        if (isset($file) && $file['error'] == 0) {
            // Move the uploaded file to the destination directory
            move_uploaded_file($file['tmp_name'], $destination.'/'.$file['name']);

            return true;
        }

        return false;
    }

    public function deleteFile($filePath)
    {
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);

            return true;
        }

        return false;
    }

    public function downloadFile($filePath)
    {
        // Check if the file exists
        if (file_exists($filePath)) {
            // Set headers to force download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($filePath));

            // Read the file
            readfile($filePath);
            exit;
        }

        return false;
    }
}
