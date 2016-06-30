<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface HasAttachmentEntity {

    /*
     * for using this u have to set your favorite upload directory in the implementation of getUploadDir method
     * your entity must contains $path , $file_name , $file attributes and a $temp
    */
    /** TODO: you have to return a default upload dir
     * @return string upload dir
     */
    public function getUploadDir();

    /**
     * @return string for using in the web
     */
    public function getWebPath();

    /**
     * For Pre-Uploading
     *
     * @param string $filename
     */
    public function setFilename($filename);

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename();

    /**
     * @return UploadedFile
     */
    public function getFile();

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null);

    /**
     * @return string
     */
    public function getTemp();

	/**
	 * @param $temp
	 * @return
	 * @internal param $file
	 */
    public function setTemp($temp);
}
