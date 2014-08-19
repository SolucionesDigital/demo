<?php

namespace Admin\Support;

use HTML;

trait GravatarTrait {

	/**
	 * Returns the avatar image element
	 *
	 * @param int   $avatarSize
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function getAvatar($avatarSize = null, $attributes = [])
	{
		$gravatarUrl = $this->getAvatarUrl($avatarSize);

		return HTML::image($gravatarUrl, null, $attributes);
	}

	/**
	 * Returns the avatar url
	 *
	 * @param int $avatarSize
	 *
	 * @return string
	 */
	public function getAvatarUrl($avatarSize = 20)
	{
		$avatarSize = is_null($avatarSize) ? 20 : $avatarSize;

		$gravatarId = md5( strtolower( trim( $this->getAttribute('email') ) ) );

		return "//www.gravatar.com/avatar/{$gravatarId}?s={$avatarSize}&d=mm";
	}

}
