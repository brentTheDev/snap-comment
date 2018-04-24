<?php

class Comment {
	/**
	 * username who created comment
	 * @var float $commentUsername
	 */
	private $commentSaltiness;
	/**
	 * text that contains comment
	 * @var string $commentText
	 */
	private $commentText;
	/**
	 * username who created comment
	 * @var string $commentUsername
	 */
	private $commentUsername;
}



/**
 * constructor for Comment
 *
 * @param float $newCommentSaltiness of how salty comment is
 * @param string $newCommentText is for a new comment
 * @param string $newCommentUsername is used to identify author of new comment
 * @throws \InvalidArgumentException if data types are not valid
 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
 * @throws \TypeError if data types violate type hints
 * @throws \Exception if some other exception occurs
 **/
public function __construct(float $newCommentSaltiness, string $newCommentText, string $newCommentUsername) {
	try {
		$this->setCommentSaltiness($newCommentSaltiness);
		$this->setCommentText($newCommentText);
		$this->setCommentUsername($newCommentUsername);

	}
		//determine what exception type was thrown
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
}

/**
 * accessor method for comment saltiness
 *
 * @return float
 */
public function getCommentSaltiness(): float {
	return($this->commentSaltiness);
}

/**
 * mutator method for comment saltiness
 *
 * @param float $newCommentSaltiness
 * @throw \InvalidArgumentException if $newCommentText is not a valid object or string
 * @throw \RangeException if $newCommentSaltiness is >= 255 characters
 */
public function setCommentSaltiness(float $newCommentSaltiness) : void {
	$newCommentSaltiness = trim($newCommentSaltiness);
	$newCommentSaltiness = filter_var($newCommentSaltiness, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	// verifies that the comment is valid
	if(empty($newCommentSaltiness) === true) {
		throw(new \InvalidArgumentException("comment is not valid"));
	}
	//verifies if the comment text is less than 255 characters
	if(strlen($newCommentSaltiness) >= 255 )
		throw(new \RangeException("comment cannot fit in mySQL"));
	// store the new comment text
	$this->fanCommentSaltiness = $newCommentSaltiness;
}

/**
 * accessor method for comment text
 *
 * @return string
 */
public function getCommentText(): string {
	return($this->commentText);
}

/**
 * mutator method for comment text
 *
 * @param string $newCommentText
 * @throw \InvalidArgumentException if $newCommentText is not a valid object or string
 * @throw \RangeException if $newCommentText is >= 255 characters
 */
public function setCommentText(string $newCommentText) : void {
	$newCommentText = trim($newCommentText);
	$newCommentText = filter_var($newCommentText, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	// verifies that the comment is valid
	if(empty($newCommentText) === true) {
		throw(new \InvalidArgumentException("comment is not valid"));
	}
	//verifies if the comment text is less than 255 characters
	if(strlen($newCommentText) >= 255 )
		throw(new \RangeException("comment cannot fit in mySQL"));
	// store the new comment text
	$this->fanCommentUsername = $newCommentText;
}

	/**
	 * accessor method for comment username
	 *
	 * @return string
	 */
	public function getCommentUsername(): string {
		return($this->commentUsername);
	}

	/**
	 * mutator method for comment username
	 *
	 * @param string $newCommentUsername
	 * @throw \InvalidArgumentException if $newCommentUsername is not a valid object or string
	 * @throw \RangeException if $newCommentUsername is > 32 characters
	 */
	public function setCommentUsername(string $newCommentUsername) : void {
		$newCommentUsername = trim($newCommentUsername);
		$newCommentUsername = filter_var($newCommentUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		// verifies that the username is valid
		if(empty($newCommentUsername) === true) {
			throw(new \InvalidArgumentException("name is insecure"));
		}
		//verifies if the comment username is less than 64 characters
		if(strlen($newCommentUsername) <= 64 )
			throw(new \RangeException("name cannot fit in mySQL"));
		// store the new comment username
		$this->fanCommentUsername = $newCommentUsername;
}