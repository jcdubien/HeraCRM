<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraint as Assert;


class Contact
{
    /*
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\length(min=2,max=100)
     */
private $firstname;

    /*
      * @var string|null
      * @Assert\NotBlank()
      * @Assert\length(min=2,max=100)
      */
private $lastname;

        /*
      * @var string|null
      * @Assert\NotBlank()
      * @Assert\Regex(
        * pattern="[0-9]{10}*")
      */
private $phone;

        /*
      * @var string|null
      * @Assert\NotBlank()
      * @Assert\Email()
      */
private $email;



/*
 *
 * @var datetime
 */
private $datemessage;

/*
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Length(min=10)
    */
private $message;

/**
 * @return mixed
 */
public function getDatemessage()
{
    return $this->datemessage;
}

/**
 * @param mixed $datemessage
 * @return Contact
 */
public function setDatemessage($datemessage)
{
    $this->datemessage = $datemessage;
    return $this;
}


/**
 * @return mixed
 */
public function getFirstname()
{
    return $this->firstname;
}

/**
 * @param mixed $firstname
 * @return Contact
 */
public function setFirstname($firstname)
{
    $this->firstname = $firstname;
    return $this;
}

/**
 * @return mixed
 */
public function getLastname()
{
    return $this->lastname;
}

/**
 * @param mixed $lastname
 * @return Contact
 */
public function setLastname($lastname)
{
    $this->lastname = $lastname;
    return $this;
}

/**
 * @return mixed
 */
public function getPhone()
{
    return $this->phone;
}

/**
 * @param mixed $phone
 * @return Contact
 */
public function setPhone($phone)
{
    $this->phone = $phone;
    return $this;
}

/**
 * @return mixed
 */
public function getEmail()
{
    return $this->email;
}

/**
 * @param mixed $email
 * @return Contact
 */
public function setEmail($email)
{
    $this->email = $email;
    return $this;
}

/**
 * @return mixed
 */
public function getMessage()
{
    return $this->message;
}

/**
 * @param mixed $message
 * @return Contact
 */
public function setMessage($message)
{
    $this->message = $message;
    return $this;
}

/**
 * @return mixed
 */



}