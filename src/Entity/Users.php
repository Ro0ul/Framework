<?php declare(strict_types=1);

namespace Src\Entity;

use DateTime;
use Src\Core\Config;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

#[Entity]
#[Table('users')]
class Users 
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name:"username",type:Types::STRING,length:255)]
    private string $username;

	#[Column(name:"is_banned",type:Types::BOOLEAN)]
	private bool $is_banned;

    #[Column(name:"password")]
    private string $password;

    #[Column(name:"email",type:Types::STRING)]
    private string $email;

    #[Column(name:"created_at")]
    private Datetime $created_at;

    #[Column(name:"updated_at")]
    private Datetime $updated_at;

	public function getUsername() : string 
    {
		return $this->username;
	}

	public function setUsername(string $value) : self 
    {
		$this->username = $value;
        return $this;
	}

	public function getPassword() : string
    {
		return $this->password;
	}

	public function setPassword(string $value) : self
    {
		$this->password = $value;
        return $this;
	}

	public function getEmail() : string
    {
		return $this->email;
	}

	public function setEmail(string $value) : self
    {
		$this->email = $value;
        return $this;
	}

	public function getCreated_at() : Datetime 
    {
		return $this->created_at;
	}

	public function setCreated_at(Datetime $value) : self 
    {
		$this->created_at = $value;
        return $this;
	}

	public function getUpdated_at() : Datetime 
    {
		return $this->updated_at;
	}

	public function setUpdated_at(Datetime $value) : self 
    {
		$this->updated_at = $value;
        return $this;
	}

	public function getIs_banned() : bool {
		return $this->is_banned;
	}

	public function setIs_banned(bool $value) {
		$this->is_banned = $value;
	}
}