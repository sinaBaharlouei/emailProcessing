<?php

namespace UserBundle\Entity\Constants;

/**
 * UserBundle\Entity\Constants\ImageConstants
 */
class ImageConstants
{
	const USER_PATH = 'users/pics/';

	const IMAGE_SIZE_TYPE_1 = 'type1';
	const IMAGE_SIZE_TYPE_2 = 'type2';
	const IMAGE_SIZE_TYPE_3 = 'type3';
	const IMAGE_SIZE_TYPE_4 = 'type4';

	static $imageSizes = array(
		1 => ImageConstants::IMAGE_SIZE_TYPE_1,
		2 => ImageConstants::IMAGE_SIZE_TYPE_2,
		3 => ImageConstants::IMAGE_SIZE_TYPE_3,
		4 => ImageConstants::IMAGE_SIZE_TYPE_4,
	);

}
