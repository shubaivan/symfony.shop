<?php

namespace Is\MiniShopBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 *
 * @ORM\Table(name="product_transfer")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class ProductTransfer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumn(name="from_store_id", referencedColumnName="id")
     */
    private $storeFrom;

    /**
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumn(name="to_store_id", referencedColumnName="id")
     */
    private $storeTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProductTransfer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set storeFrom
     *
     * @param \Is\MiniShopBundle\Entity\Store $storeFrom
     * @return ProductTransfer
     */
    public function setStoreFrom(\Is\MiniShopBundle\Entity\Store $storeFrom = null)
    {
        $this->storeFrom = $storeFrom;

        return $this;
    }

    /**
     * Get storeFrom
     *
     * @return \Is\MiniShopBundle\Entity\Store
     */
    public function getStoreFrom()
    {
        return $this->storeFrom;
    }

    /**
     * Set storeTo
     *
     * @param \Is\MiniShopBundle\Entity\Store $storeTo
     * @return ProductTransfer
     */
    public function setStoreTo(\Is\MiniShopBundle\Entity\Store $storeTo = null)
    {
        $this->storeTo = $storeTo;

        return $this;
    }

    /**
     * Get storeTo
     *
     * @return \Is\MiniShopBundle\Entity\Store
     */
    public function getStoreTo()
    {
        return $this->storeTo;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return ProductTransfer
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateStoresQuantity()
    {
        $this->storeFrom->setProductQuantity($this->storeFrom->getProductQuantity() - $this->quantity);
        $this->storeTo->setProductQuantity($this->storeTo->getProductQuantity() + $this->quantity);
    }
}
