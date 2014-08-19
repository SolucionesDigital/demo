<?php

namespace Admin\Support;

interface AvatarInterface {

	/**
	 * Returns the avatar image element
	 *
	 * @param int   $avatarSize
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function getAvatar($avatarSize = null, $attributes = []);

	/**
	 * Returns the avatar url
	 *
	 * @param int $avatarSize
	 *
	 * @return string
	 */
	public function getAvatarUrl($avatarSize = 20);

}
