<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="contact_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contactId;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=100, nullable=false)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=50, nullable=false)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_subject", type="string", length=50, nullable=false)
     */
    private $contactSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_message", type="text", length=65535, nullable=false)
     */
    private $contactMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contact_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $contactDate = 'CURRENT_TIMESTAMP';

    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    public function getContactSubject(): ?string
    {
        return $this->contactSubject;
    }

    public function setContactSubject(string $contactSubject): self
    {
        $this->contactSubject = $contactSubject;

        return $this;
    }

    public function getContactMessage(): ?string
    {
        return $this->contactMessage;
    }

    public function setContactMessage(string $contactMessage): self
    {
        $this->contactMessage = $contactMessage;

        return $this;
    }

    public function getContactDate(): ?\DateTimeInterface
    {
        return $this->contactDate;
    }

    public function setContactDate(\DateTimeInterface $contactDate): self
    {
        $this->contactDate = $contactDate;

        return $this;
    }


}
