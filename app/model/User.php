<?php

class User
{
    private string $id, $email, $passwordHash, $firstName, $lastName;

    /**
     * @param int $id
     * @param string $email
     * @param string $passwordHash
     * @param string $firstname
     * @param string $lastName
     */
    public function __construct(
        int $id,
        string $email,
        string $passwordHash,
        string $firstname,
        string $lastName
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->firstName = $firstname;
        $this->lastName = $lastName;
    }

    /**
     * @param array $arr
     * @return User
     */
    public static function fromArray(array $arr) : User
    {
        return new User(
            $arr["id"],
            $arr["email"],
            $arr["password_hash"],
            $arr["first_name"],
            $arr["last_name"],
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @param string $passwordHash
     */
    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

}

?>
