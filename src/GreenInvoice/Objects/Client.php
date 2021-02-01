<?php


namespace GreenInvoice\Objects;


use GreenInvoice\Constants\Country;
use GreenInvoice\Interfaces\Arrayable;

class Client extends ObjectAbstract implements Arrayable
{
    private ?string $id = null;
    private ?string $name = null;
    private ?array $emails = null;
    private ?string $taxId = null;
    private ?string $address = null;
    private ?string $city = null;
    private ?string $zip = null;
    private ?string $country = null;
    private ?string $phone = null;
    private ?string $fax = null;
    private ?string $mobile = null;
    private bool $add = true;
    private bool $self = false;

    public function getId(): ?string { return $this->id; }

    /**
     * @param string|null $id Client ID
     *
     * @return Client
     */
    public function setId(?string $id): Client
    {
        $this->id = $id;
        return $this;
    }


    public function getName(): ?string { return $this->name; }

    /**
     * @param string|null $name Client name
     *
     * @return Client
     */
    public function setName(?string $name): Client
    {
        $this->name = $name;
        return $this;
    }


    public function getEmails(): ?array { return $this->emails; }

    /**
     * @param array|null $emails
     *
     * Client emails where we will send links to download the created document
     *
     * @return Client
     */
    public function setEmails(?array $emails): Client
    {
        $this->emails = $emails;
        return $this;
    }


    public function getTaxId(): ?string { return $this->taxId; }

    /**
     * @param string|null $taxId Client tax id (TZ)
     *
     * @return Client
     */
    public function setTaxId(?string $taxId): Client
    {
        $this->taxId = $taxId;
        return $this;
    }


    public function getAddress(): ?string { return $this->address; }

    /**
     * @param string|null $address Client address
     *
     * @return Client
     */
    public function setAddress(?string $address): Client
    {
        $this->address = $address;
        return $this;
    }


    public function getCity(): ?string { return $this->city; }

    /**
     * @param string|null $city Client city
     *
     * @return Client
     */
    public function setCity(?string $city): Client
    {
        $this->city = $city;
        return $this;
    }


    public function getZip(): ?string { return $this->zip; }

    /**
     * @param string|null $zip Client zip code
     *
     * @return Client
     */
    public function setZip(?string $zip): Client
    {
        $this->zip = $zip;
        return $this;
    }


    public function getCountry(): ?string { return $this->country; }

    /**
     * @param string|null $country Client 2-letter ISO country code
     *
     * @return Client
     * @see Country
     */
    public function setCountry(?string $country): Client
    {
        $this->country = $country;
        return $this;
    }


    public function getPhone(): ?string { return $this->phone; }

    /**
     * @param string|null $phone Client phone
     *
     * @return Client
     */
    public function setPhone(?string $phone): Client
    {
        $this->phone = $phone;
        return $this;
    }


    public function getFax(): ?string { return $this->fax; }

    /**
     * @param string|null $fax Client fax
     *
     * @return Client
     */
    public function setFax(?string $fax): Client
    {
        $this->fax = $fax;
        return $this;
    }


    public function getMobile(): ?string { return $this->mobile; }

    /**
     * @param string|null $mobile Client mobile
     *
     * @return Client
     */
    public function setMobile(?string $mobile): Client
    {
        $this->mobile = $mobile;
        return $this;
    }


    public function isAdd(): bool { return $this->add; }

    /**
     * @param bool $add Add a temporary client to the clients' list?
     *
     * @return Client
     */
    public function setAdd(bool $add): Client
    {
        $this->add = $add;
        return $this;
    }


    public function isSelf(): bool { return $this->self; }

    /**
     * @param bool $self Is this a self-invoice?
     *
     * @return Client
     */
    public function setSelf(bool $self): Client
    {
        $this->self = $self;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id'      => $this->getId(),
            'name'    => $this->getName(),
            'emails'  => $this->getEmails(),
            'taxId'   => $this->getTaxId(),
            'address' => $this->getAddress(),
            'city'    => $this->getCity(),
            'zip'     => $this->getZip(),
            'country' => $this->getCountry(),
            'phone'   => $this->getPhone(),
            'fax'     => $this->getFax(),
            'mobile'  => $this->getMobile(),
            'add'     => $this->isAdd(),
            'self'    => $this->isSelf(),
        ];
    }
}