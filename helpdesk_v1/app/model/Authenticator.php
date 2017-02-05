<?php

use Nette\Security,
	Nette\Utils\Strings;

class Authenticator extends Nette\Object implements Security\IAuthenticator 
{
    
	private $db;
        
	public function __construct(Nette\Database\Connection $connection)
        {
		$this->db = $connection;
	}

	public function authenticate(array $credentials)
        {
		list($username, $password) = $credentials;
		$row = $this->db->table('agent')->where('agent_username', $username)->fetch();

		if (!$row) {
			throw new Security\AuthenticationException('Neexistující uživatelské jméno.', self::IDENTITY_NOT_FOUND);
		}

		if ($row->agent_password !== $password) {
			throw new Security\AuthenticationException('Neplatné heslo.', self::INVALID_CREDENTIAL);
		}

		$arr = $row->toArray();
		unset($arr['password']);
		return new Nette\Security\Identity($row->idagent, NULL, $arr);
	}

//	public static function calculateHash($password, $salt = NULL)
//        {
//		if ($password === Strings::upper($password)) {
//			$password = Strings::lower($password);
//		}
//		return crypt($password, $salt ?: '$2a$07$' . Strings::random(22));
//	}

}
