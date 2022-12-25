<?php

class User
{
    private string $userName;
    function __construct(string $userName)
    {
        $this->userName = $userName;
    }
    function getUsername(): string
    {
        return $this->userName ?? 'unknown';
    }
	public function setUserName(string $userName): self {
		$this->userName = $userName;
		return $this;
	}
}