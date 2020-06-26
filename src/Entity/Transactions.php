<?php

namespace App\Entity;

use App\Repository\TransactionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionsRepository::class)
 */
class Transactions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $transactionDate;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bankName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beneficiaryAccount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beneficiaryName;

    /**
     * @ORM\Column(type="integer")
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transactionType;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="transactions")
     */
    private $accountId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Transactions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransactionDate(): ?\DateTimeInterface
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(\DateTimeInterface $transactionDate): self
    {
        $this->transactionDate = $transactionDate;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    public function getBeneficiaryAccount(): ?string
    {
        return $this->beneficiaryAccount;
    }

    public function setBeneficiaryAccount(string $beneficiaryAccount): self
    {
        $this->beneficiaryAccount = $beneficiaryAccount;

        return $this;
    }

    public function getBeneficiaryName(): ?string
    {
        return $this->beneficiaryName;
    }

    public function setBeneficiaryName(string $beneficiaryName): self
    {
        $this->beneficiaryName = $beneficiaryName;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(string $transactionType): self
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getAccountId(): ?Account
    {
        return $this->accountId;
    }

    public function setAccountId(?Account $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getTransactions(): ?User
    {
        return $this->Transactions;
    }

    public function setTransactions(?User $Transactions): self
    {
        $this->Transactions = $Transactions;

        return $this;
    }
}
