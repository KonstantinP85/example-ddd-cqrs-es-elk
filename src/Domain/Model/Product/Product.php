<?php

declare(strict_types=1);

namespace App\Domain\Model\Product;

use App\Shared\Domain\Model\AggregateRoot;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
 */
class Product extends AggregateRoot
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private string $title;

    /**
     * @var string
     * @ORM\Column(name="description", length=1000, type="string")
     */
    private string $description;

    /**
     * @var integer
     * @ORM\Column(name="price", type="integer")
     */
    private int $price;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(name="created_time", type="datetime_immutable")
     */
    private \DateTimeImmutable $createdTime;

    /**
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function __construct(string $title, string $description, int $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->createdTime = new \DateTimeImmutable();

        $this->append(new ProductCreatedEvent($this));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedTime(): \DateTimeImmutable
    {
        return $this->createdTime;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $title
     * @param string $description
     * @param int $price
     */
    public function update(string $title, string $description, int $price): void
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->append(new ProductUpdatedEvent($this));
    }
}