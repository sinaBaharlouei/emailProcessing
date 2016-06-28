<?php
namespace UserBundle\Entity\Constants;

/**
 * UserBundle\Entity\Constants\RoleConstants
 */
class RoleConstants
{
	const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
	const ROLE_ADMIN = 'ROLE_ADMIN';
	const ROLE_USER = 'ROLE_USER';
	const ROLE_PUBLISHER = 'ROLE_PUBLISHER';

	static $label = array(
		RoleConstants::ROLE_SUPER_ADMIN => 'label.role.super_admin',
		RoleConstants::ROLE_ADMIN => 'label.role.admin',
		RoleConstants::ROLE_USER => 'label.role.user',
		RoleConstants::ROLE_PUBLISHER => 'label.role.publisher',
	);
}
