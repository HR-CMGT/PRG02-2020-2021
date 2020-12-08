<?php namespace System\Utils;

/**
 * Class Image
 * @package System\Utils
 */
class Image
{
    /**
     * @param array $uploadFile
     * @return string
     * @throws \RuntimeException
     */
    public function save(array $uploadFile): string
    {
        //If this request falls under any (Undefined | Multiple Files | $_FILES Corruption Attack) of them, treat it invalid.
        if (!isset($uploadFile['error']) || is_array($uploadFile['error'])) {
            throw new \RuntimeException('Invalid parameters.');
        }

        //Check $uploadFile['error'] value.
        switch ($uploadFile['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new \RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \RuntimeException('Exceeded filesize limit.');
            default:
                throw new \RuntimeException('Unknown errors.');
        }

        //You should also check filesize here.
        if ($uploadFile['size'] > 1000000) {
            throw new \RuntimeException('Exceeded filesize limit.');
        }

        //DO NOT TRUST $uploadFile['mime'] VALUE !!, check MIME Type by yourself.
        $fInfo = new \finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $fInfo->file($uploadFile['tmp_name']),
                [
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png'
                ],
                true
            )
        ) {
            throw new \RuntimeException('Invalid file format.');
        }

        //You should name it uniquely., DO NOT USE $uploadFile['name'] WITHOUT ANY VALIDATION !!
        $fileName = sha1_file($uploadFile['tmp_name']) . '.' . $ext;
        if (!move_uploaded_file($uploadFile['tmp_name'], sprintf('./images/%s', $fileName))) {
            throw new \RuntimeException('Failed to move uploaded file.');
        }

        return $fileName;
    }

    /**
     * @param string $fileName
     * @return bool
     * @throws \RuntimeException
     */
    public function delete(string $fileName): bool
    {
        //Unlink the file from the server
        $removed = unlink('./' . $fileName);

        if ($removed == false) {
            throw new \RuntimeException("Something went wrong with removing the image");
        }

        return true;
    }
}
