<?php

require "BaseDAO.php";
require __DIR__ . "/../model/User.php";

class UserDAO extends BaseDAO
{
    public function save(string $email, string $passwordHash, string $firstname, string $lastname): void
    {
        $query = "insert into news.users (email, password_hash, first_name, last_name) values (:email, :password_hash, :first_name, :last_name)";
        $this->executePrepared(
            $query,
            [
                ':email' => $email,
                ':password_hash' => $passwordHash,
                ':first_name' => $firstname,
                ':last_name' => $lastname
            ]
        );
    }

    public function findById(string $id): ?User
    {
        $query = "select * from news.users where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);
        $result = $stmt->fetch();
        return $result ? User::fromArray($result) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $query = "select * from news.users where email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email
        ]);
        $result = $stmt->fetch();
        return $result ? User::fromArray($result) : null;
    }

    /**
     * @return User[]
     */
    public function findAll(): array
    {
        $sql = "select * from news.users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update(User $user): void
    {
        $query = "update news.users set email=:email, password_hash=:password_hash, first_name=:first_name, last_name=:last_name where id=:id";
        $this->executePrepared(
            $query,
            [
                ':email' => $user->getEmail(),
                ':password_hash' => $user->getPasswordHash(),
                ':first_name' => $user->getFirstName(),
                ':last_name' => $user->getLastName()
            ]
        );
    }

    public function deleteById(string $id): void
    {
        $query = "delete from news.users where id=:id";
        $this->executePrepared(
            $query,
            [
                ':id' => $id
            ]
        );
    }
}